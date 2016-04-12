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
            $query->orWhere(function($or_query) use ($key) {
                $or_query->orWhere('question_type_id', $key);
            });
        }
        $question = $query->orderBy(\DB::raw('RAND()'))->limit(30)->get();
        \Session::put('checked', $checked);
        return view('tests.test', array('questions' => $question));
    }

    public function getOnlineTest() {
        //Check whether any topics have been selected
        if (\Session::has('checked')) {
            $query = \App\Question::where('question_status', 1);
            $checked = \Session::get('checked');
            foreach ($checked as $key => $value) {
                $query->orWhere(function($or_query) use ($key) {
                    $or_query->orWhere('question_type_id', $key);
                });
            }
            $question = $query->orderBy(\DB::raw('RAND()'))->limit(30)->get();
            return view('tests.test', array('questions' => $question));
        } else {
            return redirect('select-test')
                            ->with('global', '<div class="alert alert-warning" align="center">Please select at least one test topic</div>');
        }
    }

    public function testResults() {
        //get all test results
        $result = \Request::all();
        unset($result['_token'], $result['testTable_length']);
        $count = 0;
        //Calculate correct answers
        $i = 1;
        foreach ($result as $value) {
            if ($i == 1) {
                $student_answer = $value;
                $i++;
            } elseif ($i == 2) {
                $correct_answer = $value;
                $i = 1;
                //Check if the answer is correct
                if ($student_answer == $correct_answer) {
                    $count++;
                }
            }
        }
        //calculate percentage score
        if (sizeof($result) > 0) {
            $percent = ($count * 100) / (sizeof($result)/2);
        } else {
            $percent = 0;
        }
        $result['percent'] = $percent;
        return view('tests.results', array('results' => $result));
    }

    public function afterResults() {
        //Redirect to appropriate page 
        if (\Request::has('try')) {
            return redirect('online-test');
        }
        if (\Request::has('check')) {
            return view('tests.review-test', array('results' => json_decode(\Request::get('results'))));
        }
    }
}
