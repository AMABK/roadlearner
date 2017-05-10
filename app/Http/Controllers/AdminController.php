<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class AdminController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }

    public function addImage() {
        return view('admin.images.add-image');
    }

    public function postAddImage() {
        $validator = \Validator::make(\Request::all(), array(
                    'sign' => 'required|image',
                    'sign_type' => 'required',
                    'sign_name' => 'required',
                    'sign_desc' => 'required'
                        )
        );

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator->errors());
        } else {
            //store activity record
            $sign = \App\Traffic_sign::create(array(
                        'sign_type' => \Request::get('sign_type'),
                        'sign_name' => \Request::get('sign_name'),
                        'sign_desc' => \Request::get('sign_desc'),
                        'sign_link' => \Request::get('sign_name')
            ));

            //File upload
            if ((\Input::hasFile('sign'))) {
                // getting all of the post data
                $file = array('file' => \Input::file('sign'));
                // setting up rules
                $rules = array('file' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
                // doing the validation, passing post data, rules and the messages
                $validator = \Validator::make($file, $rules);
                if ($validator->fails()) {
                    // send back to the page with the input data and errors
                    return redirect()->back()
                                    ->withInput()
                                    ->withErrors($validator);
                } else {
                    // checking file is valid.
                    if (\Input::file('sign')->isValid()) {
                        $destinationPath = 'uploads/images'; // upload path
                        $extension = \Input::file('sign')->getClientOriginalExtension(); // getting image extension
                        $fileName = \Request::get('sign_name') . '-' . $sign->id . '.' . $extension; // renameing image
                        \Input::file('sign')->move($destinationPath, $fileName); // uploading file to given path
                        // sending back with message
                        //Update support doc on db
                        \App\Traffic_sign::where('id', $sign->id)
                                ->update(
                                        array(
                                            'sign_link' => $fileName
                        ));
                        return redirect()->back()
                                        ->with('global', '<div class="alert alert-success" align="center">Sign successfully uploaded.</div>');
                    } else {
                        // sending back with error message.
                        return redirect()->back()
                                        ->with('global', '<div class="alert alert-warning" align="center">Upload failed, please edit entry to re-upload the sign image</div>');
                    }
                }
            }
        }
    }

    public function postUpdateSign() {
        $validator = \Validator::make(\Request::all(), array(
                    'sign_type' => 'required',
                    'sign_name' => 'required',
                    'sign_desc' => 'required',
                    'status' => 'required'
                        )
        );

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator->errors());
        } else {
            //update record
            if (\Request::get('details') == 'update') {
                $update = \App\Traffic_sign::find(\Request::get('id'))
                        ->update(array(
                    'sign_type' => \Request::get('sign_type'),
                    'sign_name' => \Request::get('sign_name'),
                    'sign_desc' => \Request::get('sign_desc'),
                    'ts_status' => \Request::get('status')
                ));
            }

            //File upload
            if ((\Input::hasFile('sign'))) {
                $file = array('file' => \Input::file('sign'));
                //dd(\Request::get('sign'));
                //get all file info
                $sign = \App\Traffic_sign::find(\Request::get('id'));
                // getting all of the post data
                $file = array('file' => \Input::file('sign'));
                // setting up rules
                $rules = array('file' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
                // doing the validation, passing post data, rules and the messages
                $validator = \Validator::make($file, $rules);
                if ($validator->fails()) {
                    // send back to the page with the input data and errors
                    return redirect('home')->withInput()->withErrors($validator);
                } else {
                    // checking file is valid.
                    if (\Input::file('sign')->isValid()) {
                        $destinationPath = 'uploads/images'; // upload path
                        $fileName = $sign->sign_link; // renaming image
                        //delete if exists
                        $file_link = $destinationPath . $fileName;
                        if (file_exists(public_path() . $file_link)) {
                            \Storage::delete($file_link);
                        }
                        \Input::file('sign')->move($destinationPath, $fileName); // uploading file to given path
                        // sending back with message
                        return redirect()->back()
                                        ->with('global', '<div class="alert alert-success" align="center">Sign successfully updated.</div>');
                    } else {
                        // sending back with error message.
                        return redirect()->back()
                                        ->with('global', '<div class="alert alert-warning" align="center">Upload failed, please edit entry to re-upload the sign image</div>');
                    }
                }
            }
            if ($update) {
                return redirect()->back()
                                ->with('global', '<div class="alert alert-success" align="center">Sign successfully updated.</div>');
            } else {
                return redirect()->back()
                                ->with('global', '<div class="alert alert-warning" align="center">Sign update failed, please try again.</div>');
            }
        }
    }

    public function postAddDoc() {
        $validator = \Validator::make(\Request::all(), array(
                    'document' => 'required|mimes:pdf,doc,docx,xlsx',
                    'document_type' => 'required',
                    'document_name' => 'required',
                    'document_description' => 'required'
                        )
        );

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator->errors());
        } else {
            //store activity record
            $doc = \App\Document::create(array(
                        'doc_type' => \Request::get('document_type'),
                        'doc_name' => \Request::get('document_name'),
                        'doc_desc' => \Request::get('document_description'),
            ));

            //File upload
            if ((\Input::hasFile('document'))) {
                // getting all of the post data
                $file = array('file' => \Input::file('document'));
                // setting up rules
                $rules = array('file' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
                // doing the validation, passing post data, rules and the messages
                $validator = \Validator::make($file, $rules);
                if ($validator->fails()) {
                    // send back to the page with the input data and errors
                    return redirect('home')->withInput()->withErrors($validator);
                } else {
                    // checking file is valid.
                    if (\Input::file('document')->isValid()) {
                        $destinationPath = 'uploads/documents'; // upload path
                        $extension = \Input::file('document')->getClientOriginalExtension(); // getting image extension
                        $fileName = \Request::get('document_name') . '-' . $doc->id . '.' . $extension; // renameing image
                        \Input::file('document')->move($destinationPath, $fileName); // uploading file to given path
                        // sending back with message
                        //Update support doc on db
                        \App\Document::where('id', $doc->id)
                                ->update(
                                        array(
                                            'doc_link' => $fileName
                        ));
                        return redirect()->back()
                                        ->with('global', '<div class="alert alert-success" align="center">Document successfully uploaded.</div>');
                    } else {
                        // sending back with error message.
                        return redirect()->back()
                                        ->with('global', '<div class="alert alert-warning" align="center">Upload failed, please edit entry to re-upload the sign image</div>');
                    }
                }
            }
        }
    }

    public function postAddVideo() {
        $validator = \Validator::make(\Request::all(), array(
                    'video' => 'required',
                    'video_type' => 'required',
                    'video_name' => 'required',
                    'video_desc' => 'required'
                        )
        );

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator->errors());
        } else {
            //store activity record
            $video = \App\Video::create(array(
                        'video_type' => \Request::get('video_type'),
                        'video_name' => \Request::get('video_name'),
                        'video_desc' => \Request::get('video_desc'),
                        'video_link' => \Request::get('video_name')
            ));

            //File upload
            if ((\Input::hasFile('video'))) {
                // getting all of the post data
                $file = array('file' => \Input::file('video'));
                // setting up rules
                $rules = array('file' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
                // doing the validation, passing post data, rules and the messages
                $validator = \Validator::make($file, $rules);
                if ($validator->fails()) {
                    // send back to the page with the input data and errors
                    return redirect('home')->withInput()->withErrors($validator);
                } else {
                    // checking file is valid.
                    if (\Input::file('video')->isValid()) {
                        $destinationPath = 'uploads/videos/'; // upload path
                        $extension = \Input::file('video')->getClientOriginalExtension(); // getting image extension
                        $fileName = \Request::get('video_name') . '-' . $video->id . '.' . $extension; // renameing image
                        \Input::file('video')->move($destinationPath, $fileName); // uploading file to given path
                        // sending back with message
                        //Update support doc on db
                        \App\Video::where('id', $video->id)
                                ->update(
                                        array(
                                            'video_link' => $fileName
                        ));
                        return redirect('/home')
                                        ->with('global', '<div class="alert alert-success" align="center">Video successfully uploaded.</div>');
                    } else {
                        // sending back with error message.
                        return redirect('/home')
                                        ->with('global', '<div class="alert alert-warning" align="center">Upload failed, please edit entry to re-upload the video</div>');
                    }
                }
            }
        }
    }

    public function documents() {
        $doc = \App\Document::where('doc_status', 1)->get();
        return view('admin.documents.index', array('docs' => $doc));
    }

    public function addDoc() {
        return view('admin.documents.add-doc');
    }

    public function postEditDoc() {
        $edit = \App\Document::find(\Request::get('id'))
                ->update(array(
            'doc_name' => \Request::get('name'),
            'doc_desc' => \Request::get('description'),
            'doc_status' => \Request::get('status'),
            'doc_type' => \Request::get('doc_type')
                )
        );
        if ($edit) {
            return redirect()->back()
                            ->with('global', '<div class="alert alert-success" align="center">Document updated </div>');
        } else {
            return redirect()->back()
                            ->with('global', '<div class="alert alert-warning" align="center">Failed, please try again </div>');
        }
    }

    public function images() {
        $image = \App\Traffic_sign::where('ts_status', 1)->paginate(100);
        return view('admin.images.index', array('images' => $image));
    }

}
