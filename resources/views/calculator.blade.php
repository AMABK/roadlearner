@extends('layout.main')
@section('title')
Tax Calculator
@endsection
@section('preloader')
<link rel="stylesheet" href="/chosen_v1.6.1/chosen.css">
<style>
    /* Paste this css to your style sheet file or under head tag */
    /* This only works with JavaScript, 
    if it's not present, don't show loader */
    .no-js #loader { display: none;  }
    .js #loader { display: block; position: absolute; left: 100px; top: 0; }
    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url(/images/page_load/Preloader_9.gif) center no-repeat #fff;
    }
    div.item-type{
        display:none;
    }
</style>
@endsection
@section('content')
<hr>
<div class="row">
    <div class="col-md-9">
        <div class="box">
            <div class="box-header with-border">
                <center><h3 class="box-title">Direct Imports Valuation Calculator(KRA-Kenya)</h3></center>
                <div class="box-tools pull-right">

                </div>
            </div>
            @if(Session::has('global'))
            <center><p>{!!Session::get('global')!!}</p></center>
            @endif
            @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                <div class="alert alert-warning">{{ $error }}</div><br>
                @endforeach
            </ul>
            @endif
            <?php
            $motorvehicle = $motorcycle = $trailer = $tractor = $primemover = '';
            if (session()->get('motor_type') == 'motorvehicle') {
                $motorvehicle = 'selected';
            }
            if (session()->get('motor_type') == 'primemover') {
                $primemover = 'selected';
            }
            if (session()->get('motor_type') == 'motorcycle') {
                $motorcycle = 'selected';
            }
            if (session()->get('motor_type') == 'trailer') {
                $trailer = 'selected';
            }
            if (session()->get('motor_type') == 'tractor') {
                $tractor = 'selected';
            }
            ?>
            <form action="/calculator" method="post">
                {!! csrf_field() !!}               
                <div class="form-group">
                    <label>Select Category of Import</label>
                    <select required="" name="motor_type" class="form-control" onchange="this.form.submit()">
                        <option {{$motorvehicle}} value="motorvehicle">Motor Vehicle</option>
                        <option {{$motorcycle}} value="motorcycle">Motor Cycle</option>
                        <option {{$trailer}} value="trailer">Trailers</option>
                        <option {{$primemover}} value="primemover">Prime Movers</option>
                    </select>
                </div> 
                <noscript><input type="submit" value="Submit"></noscript>
            </form>
            <form action="/calculator" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <!--                Sets the item type-->
                <input type="hidden" required="" name="item_type" value="{{session()->get('motor_type')}}">
                @if(session()->get('motor_type') == 'motorvehicle')
                <div class="form-group">
                    <label>Check Appropriate</label><br>
                    <input type="radio" required="" name="checked" value="smallcars" > NORMAL VEHICLES &nbsp;&nbsp;&nbsp;                 
                    <input type="radio" required="" name="checked" value="bigcars" > PICK-UPS, LORRIES & BUSES ABOVE 28 SEATER                      
                </div>
                @endif
                @if((session()->get('motor_type') == 'motorvehicle')||(session()->get('motor_type') == 'primemover'))
                <div class="form-group">
                    <label>Select Vehicle Make/Model</label>
                    <select required="" name="model" data-placeholder="Search your car make /model" class="form-control chosen-select" tabindex="5">
                        <option value=""></option>
                        @foreach($makes as $make)
                        <optgroup label="{{$make->make_name}}">
                            @foreach($make->mvCrsps as $model)
                            <option value="{{$model->id}}">{{$model->model}} - [Engine Capacity: {{$model->engine_capacity}}, Body Type: {{$model->body_type}}, Drive Config: {{$model->drive_config}}]</option>
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>
                </div>
                @elseif(session()->get('motor_type') == 'motorcycle')
                <div class="form-group">
                    <label>Select Motocycle Make/Model</label>
                    <select required="" name="model" data-placeholder="Search your motorcylce make /model" class="form-control chosen-select" tabindex="5">
                        <option value=""></option>
                        @foreach($makes as $make)
                        <optgroup label="{{$make->make_name}}">
                            @foreach($make->mcCrsps as $model)
                            <option value="{{$model->id}}">{{$model->model}} - [Engine Capacity: {{$model->engine_capacity}}]</option>
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>
                </div>
                @elseif(session()->get('motor_type') == 'trailer')
                <div class="form-group">
                    <label>Select Trailer Make/Model</label>
                    <select required="" name="model" data-placeholder="Search your trailer make /model" class="form-control chosen-select" tabindex="5">
                        <option value=""></option>
                        @foreach($makes as $make)
                        <optgroup label="{{$make->make_name}}">
                            @foreach($make->trailerCrsps as $model)
                            <option value="{{$model->id}}">{{$model->hst}} - [Axel Weight: {{$model->axel_weight or 'N/A'}}]</option>
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>
                </div>
                @elseif(session()->get('motor_type') == 'tractor')
                <div class="form-group">
                    <label>Select Tractor Make/Model</label>
                    <select required="" name="model" data-placeholder="Search your tractor make /model" class="form-control chosen-select" tabindex="5">
                        <option value=""></option>
                        @foreach($makes as $make)
                        <optgroup label="{{$make->make_name}}">
                            @foreach($make->mvCrsps as $model)
                            <option value="{{$model->id}}">{{$model->model}} - [Engine Capacity: {{$model->engine_capacity}}]</option>
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>
                </div>
                @else
                {{dd('Internal error occured')}}
                @endif
                <?php
                $current_yr = date('Y');

                $earliest_yr = date('Y') - 8;
                ?>
                <div style="overflow:hidden;">
                    <div class="form-group col-md-6" style="padding-left: 0px;">
                        <label for="month">Month of Manufacture</label>
                        <select type="text" required="" name="month" class="form-control" id="month">
                            <option value="">MM</option>
                            @for($i=1;$i<13;$i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group col-md-6" style="padding:0px;">
                        <label for="year">Year of Manufacture</label>
                        <select type="text" required="" name="year" class="form-control" id="year">
                            @foreach(range($current_yr, $earliest_yr) as $year)
                            <option value="{{$year}}">{{$year}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="buying">Actual Buying Price:</label>
                    <input type="number" min="0" minlength="1" pattern=".{1,10}" name="buying_price" value="{{old('buying_price') or 0 }}" placeholder="Optional" class="form-control" id="buying">
                </div>
                <div class="form-group">
                    <input type="submit" value="CALCULATE" class="form-control btn-primary" id="pwd">
                </div>
            </form>
            @if(Session::has('calculator'))
            <?php
            $import = Session::get('calculators');
            $serialize_import  = serialize($import);
            ?>
            @if(Session::has('calculator'))
            <center><h2>{!!Session::get('calculator')!!}</h2></center>
            @endif
            <table class="table table-striped table-responsive table-bordered with-border table-condensed" style="background-color: buttonface">
                <thead>
                    <tr>
                        <th>Item</th><th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>CRSP</td><td>{{$import['crsp']}}</td>
                    </tr>
                    <tr>
                        <td>Depreciation({{$import['depreciation_years']}} years)</td><td>{{$import['depreciation']}}&percnt;</td>
                    </tr>
                    <tr>
                        <td>Extra Depreciation</td><td>{{$import['extra_depreciation']}}&percnt;</td>
                    </tr>
                    <tr>
                        <td>Custom Value</td><td>{{$import['custom_value']}}</td>
                    </tr>
                    <tr>
                        <td>Import Duty({{$import['import_duty_percent']}}&percnt; of the Custom Value)</td><td><b>&plus;</b> {{$import['import_duty']}}</td>
                    </tr>
                    <tr>
                        <td>Excise Value</td><td>{{$import['excise_value']}}</td>
                    </tr>
                    <tr>
                        <td>Excise Duty({{$import['excise_duty_percent']}}&percnt; of the Excise Value)</td><td><b>&plus;</b> {{$import['excise_duty']}}</td>
                    </tr>
                    <tr>
                        <td>VAT Value</td><td>{{$import['vat_value']}}</td>
                    </tr>
                    <tr>
                        <td>VAT({{$import['vat_percent']}}&percnt; of the VAT Value)</td><td><b>&plus;</b> {{$import['vat']}}</td>
                    </tr>
                    <tr>
                        <td>RDL({{$import['rdl_percent']}}&percnt; of the Custom Value)</td><td><b>&plus;</b> {{$import['rdl']}}</td>
                    </tr>
                    <tr>
                        <td>IDF Fees({{$import['idf_fees_percent']}}&percnt; of the Custom Value)</td><td><b>&plus;</b> {{$import['idf_fees']}}</td>
                    </tr>
                    <?php
                    $total = $import['taxes'];
                    setlocale(LC_MONETARY, 'en_KE');
                    $formatted_total = number_format(money_format('%!i', $total), 2);
                    ?>
                    <tr>
                        <td><b>Total Taxes</b></td><td> <b>&equals;</b> <b> KES {{$formatted_total}}</b></td>
                    </tr>
                    <?php
                    $buying_price = $import['buying_price'];
                    setlocale(LC_MONETARY, 'en_KE');
                    $price = number_format(money_format('%!i', $buying_price), 2);
                    ?>
                    <tr>
                        <td><b>Car Price</b></td><td> <b>&equals;</b> <b> KES {{$price}}</b></td>
                    </tr>
                     <?php
                    $grand_total = $import['grand_total'];
                    setlocale(LC_MONETARY, 'en_KE');
                    $combined_total = number_format(money_format('%!i', $grand_total), 2);
                    ?>
                    <tr>
                        <td><b>Grand Total</b></td><td> <b>&equals;</b> <b> KES {{$combined_total}}</b></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <form action="/send-invoice" method="post">
                {!!csrf_field()!!}
                <input type="hidden" name="import" value="{{$serialize_import}}">
                <div class="form-group col-md-4" style="margin-left: -15px">
                    <input type="text" name="name" class="form-control" placeholder="enter your name" required="">
                </div>
                <div class="form-group col-md-4">
                    <input type="email" name="email" class="form-control" placeholder="enter your email" required="">
                </div>
                <div class="form-group col-md-3">
                    <input type="submit" class="btn btn-danger " value="GET THIS QUOTATION FOR FREE">
                </div>
            </form>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        @include('layout.links')
    </div>
</div>
@stop
@section('scripts')
@parent
@if($app->environment('local'))
@else
@endif
<script src="/chosen_v1.6.1/chosen.jquery.js" type="text/javascript"></script>
<script src="/chosen_v1.6.1/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script>
                        $(document).ready(function () {
                            $(".dropdown-menu li a").on("click", function () {
                                var iddiv = $(this).attr("id");
                                $(".item-type").hide();
                                $("." + iddiv).show();
                            });
                        });
                        //Choose
                        var config = {
                            '.chosen-select': {},
                            '.chosen-select-deselect': {allow_single_deselect: true},
                            '.chosen-select-no-single': {disable_search_threshold: 10},
                            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
                            '.chosen-select-width': {width: "95%"}
                        }
                        for (var selector in config) {
                            $(selector).chosen(config[selector]);
                        }
</script>   
@stop