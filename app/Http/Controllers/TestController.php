<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller {

    public function selectTest() {
        $type = \App\Question_type::where('status', 1)->get();
        return view('tests.index', array('types' => $type));
    }

    public function onlineTest() {
        if (!\Request::has('checked')) {
            return redirect('select-test')
                            ->with('global', '<div class="alert alert-warning" align="center">Please select at least one test topic</div>');
        }
        $query = \App\Question::where('question_status', 1);
        $checked = \Request::get('checked');
        foreach ($checked as $key => $value) {
            $query = $query->orWhere('question_type_id', $key);
        }
        $question = $query->orderBy(\DB::raw('RAND()'))->get();
        \Session::put('checked', $checked);
        return view('tests.test', array('questions' => $question));
    }

    public function getOnlineTest() {
        if (\Session::has('checked')) {
            $query = \App\Question::with('answers')->where('question_status', 1);
            $checked = \Session::get('checked');
            foreach ($checked as $key => $value) {
                $query->where(function($or_query) use ($key) {
                        $or_query->orWhere('question_type_id', 1);
                    });
            }
            $question = $query->orderBy(\DB::raw('RAND()'))->limit(30)->get();
            return view('tests.test', array('questions' => $question));
        } else {
            return redirect('select-test')
                            ->with('global', '<div class="alert alert-warning" align="center">Please select at least one test topic</div>');
        }
    }

}
