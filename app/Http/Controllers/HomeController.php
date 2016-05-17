<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller {

    public function index() {
        $doc = \App\Document::where('doc_status', 1)->get();
        return view('welcome', array('docs' => $doc));
    }

    public function getTrafficSigns1() {
        $sign = \App\Traffic_sign::where('sign_category', 'traffic_signs')
                ->paginate(12);
        return view('signs.index', array('signs' => $sign));
    }

    public function getDrivingVideos() {
        $filter = \Request::get('filter');
        $query = \App\Video::whereNotNull('v_status');
        //Search by name
        $name = \Request::get('name');
        if ($name && !empty($name)) {
            $query->where('video_name', 'LIKE', '%' . $name . '%');
        }
        //Search by category
        $category = \Request::get('category');
        if ($category && !empty($category)) {
            $query->where('video_category', $category);
        }
        //Search by type
        $type = \Request::get('type');
        if ($type && !empty($type)) {
            $query->where('video_type', $type);
        }
        $video = $query->paginate(9);
        return view('videos.index', array('videos' => $video));
    }

    public function getTrafficSigns() {
        $query = \App\Traffic_sign::whereNotNull('ts_status');
        //Search by name
        $name = \Request::get('name');
        if ($name && !empty($name)) {
            $query->where('sign_name', 'LIKE', '%' . $name . '%');
        }
        //Search by category
        $category = \Request::get('category');
        if ($category && !empty($category)) {
            $query->where('sign_category', $category);
        }
        //Search by description
        $desc = \Request::get('description');
        if ($desc && !empty($desc)) {
            $query->where('sign_desc', $desc);
        }
        $sign = $query->paginate(12);

        $return = view('signs.index', array('signs' => $sign));
        if (\Request::isMethod('post')) {
            $return->with('global', '<div class="alert alert-success" align="center">Search successfully completed.</div>');
        }

        return $return;
    }

    public function carBasics() {
        return view('basics.car-basics');
    }

    public function generalTips() {
        return view('basics.general-tips');
    }

    public function cityTips() {
        return view('basics.city-tips');
    }

    public function quickLink($id) {
        $doc = \App\Document::find($id);
        return view('view-quick-link', array('doc' => $doc));
    }

}
