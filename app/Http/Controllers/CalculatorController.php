<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class CalculatorController extends Controller {

    public function calculator() {
        return view('admin.calculator.index');
    }

    public function taxCalculator() {
        //Sets session and redirect if motor type been set
        if (\Request::has('motor_type')) {
            session(['motor_type' => \Request::get('motor_type')]);
            return HomeController::calculator();
        }

        $validator = \Validator::make(\Request::all(), array(
                    'month' => 'required',
                    'year' => 'required',
                    'model' => 'required'
                        )
        );
        if ($validator->fails()) {
            return redirect()->back()
                            ->withInput()
                            ->withErrors($validator->errors());
        } else {
            //Validate date of manu...
            $time2 = strtotime(\Request::get('year') . '-' . \Request::get('month'));
            if (time() < $time2) {
                $validator->errors()->add('field', 'Manufacture date can not be later than today');
                return redirect()->back()
                                ->withInput()
                                ->withErrors($validator->errors());
            }

            $date1 = \Request::get('year') . '-' . \Request::get('month');
            $age = $this->periodCount($date1);
            $model = $this->getCrsp(\Request::get('item_type'), \Request::get('model'));
            $item_type = \Request::get('item_type');
            $extra_depreciation = 0;
            if (is_numeric(str_replace(',', '', $model->crsp))) {
                $current_price = str_replace(',', '', $model->crsp);
            } else {
                $string = $model->crsp;

                //Make curl request
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                //Remove all currency characters
                if (($string[0] == '$') || ($string[0] == 'U')) {
                    curl_setopt($ch, CURLOPT_URL, 'http://rate-exchange.herokuapp.com/fetchRate?from=USD&to=KES');                  
                } elseif (($string[0] == 'E')) {
                    curl_setopt($ch, CURLOPT_URL, 'http://rate-exchange.herokuapp.com/fetchRate?from=EUR&to=KES'); 
                } else {
                    exit('Internal error occured, please concta admin');
                }
                
                $content_array = json_decode(curl_exec($ch), true);
                $current_price = preg_replace('/\D/', '', $string) * $content_array['Rate'];
            }
            $depreciation = $this->getDepreciationForDirectImports($age);
            if ($item_type == 'motorvehicle') {
                if (\Request::get('checked') == 'bigcars') {
                    $item_type_query = \App\TaxCalculator::where('item_type', $item_type)->first();
                } else {
                    $item_type_query = \App\TaxCalculator::where('item_type', $item_type)->first();
                }
            } else {
                $item_type_query = \App\TaxCalculator::where('item_type', $item_type)->first();
            }
            if (sizeof($item_type_query) < 1) {
                dd('Unable to fetch item rates');
            }
            $custom_value = round(($current_price / 1.25) * ((100 - $depreciation) / 100) / 1.25 / 1.2 / 1.16) * ((100 - $extra_depreciation) / 100);
            $import_duty = round($custom_value * ($item_type_query['import_duty'] / 100));
            $excise_value = round($import_duty + $custom_value);
            if ($item_type == 'motorcycle') {
                $excise_duty = 10000;
            } else {
                $excise_duty = round($excise_value * ($item_type_query['excise_duty'] / 100));
            }
            $vat_value = round($excise_value + $excise_duty);
            $vat = round($vat_value * ($item_type_query['vat'] / 100));
            $rdl = round($custom_value * ($item_type_query['rdl'] / 100));
            $idf_fees = round($custom_value * ($item_type_query['idf_fees'] / 100));
            if ($idf_fees < 5000) {
                $idf_fees = 5000;
            }
            $taxes = round($idf_fees + $import_duty + $excise_duty + $vat + $rdl);
            $buying_price = round(\Request::get('buying_price'));

            $calculator = [];
            $calculator['crsp'] = $current_price;
            $calculator['depreciation'] = $depreciation;
            $calculator['depreciation_years'] = round($age, 2);
            $calculator['extra_depreciation'] = $extra_depreciation;
            $calculator['custom_value'] = $custom_value;
            $calculator['import_duty'] = $import_duty;
            $calculator['import_duty_percent'] = $item_type_query['import_duty'];
            $calculator['excise_value'] = $excise_value;
            $calculator['excise_duty'] = $excise_duty;
            $calculator['excise_duty_percent'] = $item_type_query['excise_duty'];
            $calculator['vat_value'] = $vat_value;
            $calculator['vat'] = $vat;
            $calculator['vat_percent'] = $item_type_query['vat'];
            $calculator['rdl'] = $rdl;
            $calculator['rdl_percent'] = $item_type_query['rdl'];
            $calculator['idf_fees'] = $idf_fees;
            $calculator['idf_fees_percent'] = $item_type_query['idf_fees'];
            $calculator['taxes'] = $taxes;
            $calculator['buying_price'] = intval($buying_price);
            $calculator['grand_total'] = $calculator['buying_price'] + $taxes;
            return redirect('/calculator')
                            ->with('calculators', $calculator)
                            ->with('calculator', '<div class="alert alert-success" align="center">Calculated Import Cost</div>');
        }
    }

    public function getDepreciationForDirectImports($age) {
        if ($age <= 0.5) {
            return 5;
        } elseif ($age <= 1) {
            return 10;
        } elseif ($age <= 2) {
            return 15;
        } elseif ($age <= 3) {
            return 20;
        } elseif ($age <= 4) {
            return 30;
        } elseif ($age <= 5) {
            return 40;
        } elseif ($age <= 6) {
            return 50;
        } elseif ($age <= 7) {
            return 60;
        } elseif ($age <= 8) {
            return 70;
        } else {
            exit('Internal system error occured, please contant admin');
        }
    }

    public function getDepreciationForRegisteredVehicle($age) {
        if ($age < 0.5) {
            return 5;
        } elseif ($age < 1) {
            return 10;
        } elseif ($age < 2) {
            return 15;
        } elseif ($age < 3) {
            return 20;
        } elseif ($age < 4) {
            return 30;
        } elseif ($age < 5) {
            return 40;
        } elseif ($age < 6) {
            return 50;
        } elseif ($age < 7) {
            return 60;
        } elseif ($age < 8) {
            return 70;
        } else {
            exit('Internal system error occured, please contant admin');
        }
    }

    public function getCrsp($item_type, $model) {
        switch ($item_type) {
            case 'motorvehicle':
                $result = \App\Mv_crsp::find($model);
                break;
            case 'primemover':
                $result = \App\Mv_crsp::find($model);
                break;
            case 'motorcycle':
                $result = \App\McCrsp::find($model);
                break;
            case 'trailer':
                $result = \App\TrailerCrsp::find($model);
                break;
            case 'tractor':
                $result = \App\TractorCrsp::find($model);
                break;
            default :
                dd('Internal server error');
                break;
        }

        return $result;
    }

    public function importMotorVehicleExcel() {
        dd('This functionality is disabled');
        if (\Request::hasFile('import_file')) {
            ini_set('max_execution_time', 300);
            ini_set('memory_limit', '512M');
            set_time_limit(300);
            $path = \Request::file('import_file')->getRealPath();
            $data = \Excel::load($path, function($reader) {
                        
                    })->get();
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $insert[] = [
                        'model' => $value->model,
                        'engine_capacity' => $value->enginecapacity,
                        'body_type' => $value->bodytype,
                        'drive_config' => $value->driveconfiguration,
                        'seating' => $value->seating,
                        'fuel' => $value->fuel,
                        'gvw' => $value->gvw,
                        'crsp' => $value->crsp
                    ];
                }
                //dd($insert[0]);
                if (!empty($insert)) {
                    $date = date('Y-m-d');
                    $timestamp = date('Y-m-d H:i:s');
                    foreach ($insert as $content) {
                        if (($content['model'] != null) && ($content['engine_capacity'] == null) && ($content['body_type'] == null) && ($content['drive_config'] == null)) {
                            //Check if model exists
                            $make = \App\Make::where('make_name', $content['model'])
                                    ->where('make_category', 'motorvehicle')
                                    ->first();
                            if (sizeof($make) < 1) {
                                //Insert into makes
                                $make = \App\Make::create(array(
                                            'make_name' => $content['model'],
                                            'make_category' => 'motorvehicle',
                                            'user_id' => \Auth::user()->id
                                ));
                                $content['make_id'] = $make->id;
                            } else {
                                //Assign id
                                $content['make_id'] = $make->id;
                            }
                        } elseif (($content['engine_capacity'] != null) || ($content['body_type'] != null) || ($content['drive_config'] != null)) {
                            //Insert models
                            $content['upload_date'] = $date;
                            $content['created_at'] = $timestamp;
                            $content['updated_at'] = $timestamp;
                            $content['user_id'] = \Auth::user()->id;
                            $content['make_id'] = $make->id;
                            \App\McCrsp::where('model', $content['model'])
                                    ->where('engine_capacity', $content['engine_capacity'])
                                    ->update(['status' => 0]);
                            $result = \DB::table('mv_crsps')->insert($content);
                        } else {
                            //Skip empty row
                        }
                    }
                    if ($result) {
                        dd('MV import successful');
                    } else {
                        dd('MV import failed');
                    }
                } else {
                    dd('MV import was empty, not insert done');
                }
            }
        }
        dd('No file was imported');
    }

    public function importMotorCycleExcel() {
        dd('This functionality is disabled');
        if (\Request::hasFile('import_file')) {
            set_time_limit(300);
            $path = \Request::file('import_file')->getRealPath();
            $data = \Excel::load($path, function($reader) {
                        
                    })->get();
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $insert[] = [
                        'make' => $value->make,
                        'model' => $value->model,
                        'engine_capacity' => $value->capacity,
                        'crsp' => $value->crsp
                    ];
                }
                //dd($insert[0]);
                if (!empty($insert)) {
                    $date = date('Y-m-d');
                    $timestamp = date('Y-m-d H:i:s');
                    foreach ($insert as $content) {
                        if (($content['make'] != null) && ($content['engine_capacity'] == null) && ($content['crsp'] == null)) {
                            //Check if model exists
                            $make = \App\Make::where('make_name', $content['make'])
                                    ->where('make_category', 'motorcycle')
                                    ->first();
                            if (sizeof($make) < 1) {
                                //Insert into makes
                                $make = \App\Make::create(array(
                                            'make_name' => $content['make'],
                                            'make_category' => 'motorcycle',
                                            'user_id' => \Auth::user()->id
                                ));
                                $content['make_id'] = $make->id;
                            } else {
                                //Assign id
                                $content['make_id'] = $make->id;
                            }
                        } elseif (($content['engine_capacity'] != null) || ($content['crsp'] != null)) {
                            // remove make from insert array
                            unset($content['make']);
//Insert models
                            $content['upload_date'] = $date;
                            $content['created_at'] = $timestamp;
                            $content['updated_at'] = $timestamp;
                            $content['user_id'] = \Auth::user()->id;
                            $content['make_id'] = $make->id;
                            \App\McCrsp::where('model', $content['model'])
                                    ->where('engine_capacity', $content['engine_capacity'])
                                    ->update(['status' => 0]);
                            $result = \DB::table('mc_crsps')->insert($content);
                        } else {
                            //Skip empty row
                        }
                    }
                    if ($result) {
                        dd('MC import successful');
                    } else {
                        dd('MC import failed');
                    }
                } else {
                    dd('MC import was empty, not insert done');
                }
            }
        }
        dd('No file was imported');
    }

    public function importTrailerExcel() {
        dd('This functionality is disabled');
        if (\Request::hasFile('import_file')) {
            set_time_limit(300);
            $path = \Request::file('import_file')->getRealPath();
            $data = \Excel::load($path, function($reader) {
                        
                    })->get();
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $insert[] = [
                        'make' => $value->make,
                        'hst' => $value->hst,
                        'axel_weight' => $value->axelweight,
                        'crsp' => $value->crsp
                    ];
                }
                //dd($insert[0]);
                if (!empty($insert)) {
                    $date = date('Y-m-d');
                    $timestamp = date('Y-m-d H:i:s');
                    foreach ($insert as $content) {
                        if (($content['make'] != null) && ($content['crsp'] != null)) {
                            //Check if make exists
                            $make = \App\Make::where('make_name', $content['make'])->first();
                            if (sizeof($make) < 1) {
                                //Insert into makes
                                $make = \App\Make::create(array(
                                            'make_name' => $content['make'],
                                            'make_category' => 'trailer',
                                            'user_id' => \Auth::user()->id
                                ));
                                $content['make_id'] = $make->id;
                            } else {
                                //Assign id
                                $content['make_id'] = $make->id;
                            }
                        }
                        if ($content['crsp'] != null) {
                            // remove make from insert array
                            unset($content['make']);
//Insert models
                            $content['upload_date'] = $date;
                            $content['created_at'] = $timestamp;
                            $content['updated_at'] = $timestamp;
                            $content['user_id'] = \Auth::user()->id;
                            $content['make_id'] = $make->id;
                            $result = \DB::table('trailer_crsps')->insert($content);
                        } else {
                            //Skip empty row
                        }
                    }
                    if ($result) {
                        dd('Trailer import successful');
                    } else {
                        dd('Trailer import failed');
                    }
                } else {
                    dd('Trailer import was empty, no insert done');
                }
            }
        }
        dd('No file was imported');
    }

    public function importTractorExcel() {
        dd('This functionality is disabled');
        if (\Request::hasFile('import_file')) {
            set_time_limit(300);
            $path = \Request::file('import_file')->getRealPath();
            $data = \Excel::load($path, function($reader) {
                        
                    })->get();
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $insert[] = [
                        'make' => $value->make,
                        'model' => $value->model,
                        'engine_capacity' => $value->capacity,
                        'crsp' => $value->crsp
                    ];
                }
                //dd($insert[0]);
                if (!empty($insert)) {
                    $date = date('Y-m-d');
                    $timestamp = date('Y-m-d H:i:s');
                    foreach ($insert as $content) {
                        if (($content['model'] != null) && ($content['engine_capacity'] == null) && ($content['crsp'] == null)) {
                            //Check if model exists
                            $make = \App\Make::where('make_name', $content['make'])->first();
                            if (sizeof($make) < 1) {
                                //Insert into makes
                                $make = \App\Make::create(array(
                                            'make_name' => $content['make'],
                                            'make_category' => 'motorcycle',
                                            'user_id' => \Auth::user()->id
                                ));
                                $content['make_id'] = $make->id;
                            } else {
                                //Assign id
                                $content['make_id'] = $make->id;
                            }
                        } elseif (($content['engine_capacity'] != null) || ($content['crsp'] != null)) {
                            // remove make from insert array
                            unset($content['make']);
//Insert models
                            $content['upload_date'] = $date;
                            $content['created_at'] = $timestamp;
                            $content['updated_at'] = $timestamp;
                            $content['user_id'] = \Auth::user()->id;
                            $content['make_id'] = $make->id;
                            $result = \DB::table('mc_crsps')->insert($content);
                        } else {
                            //Skip empty row
                        }
                    }
                    if ($result) {
                        dd('Tractor import successful');
                    } else {
                        dd('Trailer import failed');
                    }
                } else {
                    dd('Tractor import was empty, not insert done');
                }
            }
        }
        dd('No file was imported');
    }

    public function periodCount($date1) {
        $date2 = date('Y-m');

        $ts1 = strtotime($date1);
        $ts2 = strtotime($date2);

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
        return $diff / 12;
    }

    public function rates() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'http://rate-exchange.herokuapp.com/fetchRate?from=EUR&to=KES');
        $content_array = json_decode(curl_exec($ch), true);
        dd($content_array);
    }

}
