<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller {
    public function getTrafficSigns() {
        $sign = \App\Traffic_sign::paginate(4);
        return view('signs.index', array('signs' => $sign));
    }

    public function getdrivingVideos() {
        $filter = \Request::get('filter');
        $query = \App\Video::whereNotNull('created_at');
        //Search by name
        $name = \Request::get('name');
        if ($name && !empty($name)) {
            $query->where('video_name','LIKE', '%'.$name.'%');
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
        $video = $query->paginate(3);
        return view('videos.index', array('videos' => $video));
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
}
