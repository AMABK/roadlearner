<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller {

    public function index() {
        $doc = \DB::table('documents')
                ->where('doc_status', 1)
                ->where(function ($query) {
                    $query->orWhere('doc_type', 'usefullink')
                    ->orWhere('doc_type', 'all');
                })
                ->get();
        return view('welcome', array('docs' => $doc));
    }

    public function getTrafficSigns1() {
        $sign = \App\Traffic_sign::where('sign_category', 'traffic_signs')
                ->paginate(12);
        return view('signs.index', array('signs' => $sign));
    }

    public function getDrivingVideos() {
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
        $sign = $query->orderByRaw("RAND()")->paginate(12);

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

    public function viewDownloads() {
        $download = \DB::table('documents')
                ->where('doc_status', 1)
                ->where(function ($query) {
                    $query->orWhere('doc_type', 'download')
                    ->orWhere('doc_type', 'all');
                })
                ->get();
        return view('view-downloads', array('downloads' => $download));
    }

    public function download($id) {
        $doc = \App\Document::find($id);
        return view('download', array('doc' => $doc));
    }

    public function contact() {
        return view('contact');
    }

    //Access blog database
    public static function getBlogLinks() {
        $popular_sql = 'SELECT p.guid, p.post_title FROM blog_popularpostsdata AS pp LEFT JOIN blog_posts AS p ON pp.postid=p.id WHERE p.post_status="publish" ORDER BY pp.pageviews DESC LIMIT 5';
        $recent_sql = 'SELECT guid,post_title FROM blog_posts WHERE post_status="publish" ORDER BY post_date DESC LIMIT 5';
        $popular_posts = \DB::connection('mysql_blog')->select($popular_sql);
        $recent_posts = \DB::connection('mysql_blog')->select($recent_sql);
        $post['popular'] = $popular_posts;
        $post['recent'] = $recent_posts;
        return $post;
    }

}
