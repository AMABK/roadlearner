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

    public function postAddSign() {
        $validator = \Validator::make(\Request::all(), array(
                    'sign' => 'required',
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
                    return redirect('home')->withInput()->withErrors($validator);
                } else {
                    // checking file is valid.
                    if (\Input::file('sign')->isValid()) {
                        $destinationPath = 'uploads/images'; // upload path
                        $extension = \Input::file('sign')->getClientOriginalExtension(); // getting image extension
                        $fileName = ucfirst(\Request::get('sign_name') . '-' . $sign->id . '.' . $extension); // renameing image
                        \Input::file('sign')->move($destinationPath, $fileName); // uploading file to given path
                        // sending back with message
                        //Update support doc on db
                        \App\Traffic_sign::where('id', $sign->id)
                                ->update(
                                        array(
                                            'sign_link' => $fileName
                        ));
                        return redirect('/home')
                                        ->with('global', '<div class="alert alert-success" align="center">Sign successfully uploaded.</div>');
                    } else {
                        // sending back with error message.
                        return redirect('/home')
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

}
