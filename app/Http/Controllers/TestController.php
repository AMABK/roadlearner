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
        $query = \App\Question::where('question_status', 1)->where('image_link', 'NOT LIKE', '%imageYes%');
        $checked = \Request::get('checked');
        $query->where(function($or_query) use ($checked) {
            foreach ($checked as $key => $value) {
                $or_query->orWhere('question_type_id', $key);
            }
        });
        $question = $query->orderBy(\DB::raw('RAND()'))->limit(30)->get();
        \Session::put('checked', $checked);
        return view('tests.test', array('questions' => $question));
    }

    public function getOnlineTest() {
        //Check whether any topics have been selected
        if (\Session::has('checked')) {
            $query = \App\Question::where('question_status', 1)->where('image_link', 'NOT LIKE', '%imageYes%');
            $checked = \Request::get('checked');
            $query->where(function($or_query) use ($checked) {
                foreach ($checked as $key => $value) {
                    $or_query->orWhere('question_type_id', $key);
                }
            });
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
        $quiz_num = 0;
        foreach ($result as $key => $value) {
            if (is_numeric($key)) {
                $quiz_num++;

                $correctAns = 'ans' . $key;
                $studentAns = $value;
                //Check if the answer is correct
                if ($studentAns == $result[$correctAns]) {
                    $count++;
                }
            }
        }
        //calculate percentage score
        if (sizeof($result) > 2) {
            $percent = ($count * 100) / ($quiz_num);
        } else {
            $percent = 0;
        }
        $result['percent'] = $percent;
        $result['quiz_num'] = $quiz_num;
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

    public function getImageDetails() {
        $name = trim(strip_tags($_GET['term']));
        //$name = 'arno';
        $user_data = \App\Traffic_sign::orWhere('sign_name', 'like', '%' . $name . '%')
                ->orWhere('sign_desc', 'like', '%' . $name . '%')
                ->get(['sign_link', 'sign_name', 'sign_desc']);
//Declare an empty array
        $matches = [];
        foreach ($user_data as $data) {
            $det['name'] = $data->sign_name;
            $det['image_link'] = $data->sign_link;
            $det['value'] = $data->sign_name;
            $det['label'] = "{$data->sign_name} [{$data->sign_desc}]";
            $matches[] = $det;
        }
        if (sizeof($matches) < 1) {
            $matches['label'] = 'NO MATCHES FOUND';
        }
        print json_encode($matches);
    }

    public function adminTest() {
        $topic = \App\Question_type::where('status', 1)->get();
        return view('admin.tests.index', array('topics' => $topic));
    }

    public function addQuestions() {
        $num = 1;
        foreach (\Request::get('quiz') as $key => $value) {
            if ($value != "") {
                $add_test = \App\Question::create(array(
                            'question_type_id' => \Request::get('topic'),
                            'question' => $value,
                            'answer_desc' => 'N/A',
                            'question_status' => 1,
                            'image_link' => \Request::get('image_needed')[$key]
                ));

                //Add answer options
                for ($i = 1; $i < 5; $i++) {
                    //Check for correct answer
                    if (\Request::get('correct_ans')[$key] == $i) {
                        $ans_value = 1;
                    } else {
                        $ans_value = 0;
                    }
                    \App\Answer::create(
                            array(
                                'answer' => \Request::get('ans' . $i)[$key],
                                'question_id' => $add_test->id,
                                'ans_status' => 1,
                                'ans_value' => $ans_value
                            )
                    );
                }
            }
        }
        return redirect()->back()
                        ->with('global', '<div class="alert alert-success" align="center">Questions added to Tests</div>');
    }

    public function editQuestions() {
        foreach (\Request::get('ans') as $key => $value) {
            if (\Request::get('image_link') != '') {
                \App\Question::find($key)
                        ->update(['image_link' => \Request::get('image_link')]);
            }
            \App\Question::find($key)
                    ->update(['question_status' => \Request::get('question_status')]);
            \App\Answer::where('question_id', $key)
                    ->update(['ans_value' => 0]);
            \App\Answer::find($value)
                    ->update(['ans_value' => 1]);
        }
        return redirect()->back()
                        ->with('global', '<div class="alert alert-success" align="center">Question successfully updated</div>');
    }

    public function viewAdminTest() {
        $query = \App\Question::whereNotNull('created_at');
        //Search by question
        $question = \Request::get('question');
        if ($question && !empty($question)) {
            $query->where('question', 'LIKE', '%' . $question . '%');
        }
        //Search by status
        $status = \Request::get('status');
        if ($status && !empty($status)) {
            if ($status == 2) {
                $status = 0;
            }
            $query->where('question_status', $status);
        } else {
            $query->where('question_status', 1);
        }
        //Search by image status
        $image = \Request::get('image');
        if ($image && !empty($image)) {
            if ($image == 'link') {
                $query->whereNotNull('image_link')
                        ->whereNotIn('image_link', ['imageYes']);
            } else {
                if ($image == 'null') {
                    $image = NULL;
                }
                $query->where('image_link', $image);
            }
        }
        $test = $query->paginate(20);
        return view('admin.tests.view-test', array('tests' => $test));
    }

    public function category() {
        $cat = \App\Question_type::where('status', 1)->get();
        return view('admin.tests.category', array('cats' => $cat));
    }

    public function addCategory() {
        $add = \App\Question_type::create(array(
                    'type_name' => \Request::get('name'),
                    'description' => \Request::get('description'),
                    'user_id' => \Auth::user()->id
                        )
        );
        if ($add) {
            return redirect()->back()
                            ->with('global', '<div class="alert alert-success" align="center">Category added </div>');
        } else {
            return redirect()->back()
                            ->with('global', '<div class="alert alert-warning" align="center">Failed, please try again </div>');
        }
    }

    public function editCategory() {
        $edit = \App\Question_type::find(\Request::get('id'))
                ->update(array(
            'type_name' => \Request::get('name'),
            'description' => \Request::get('description'),
            'status' => \Request::get('status'),
            'user_id' => \Auth::user()->id
                )
        );
        if ($edit) {
            return redirect()->back()
                            ->with('global', '<div class="alert alert-success" align="center">Category updated </div>');
        } else {
            return redirect()->back()
                            ->with('global', '<div class="alert alert-warning" align="center">Failed, please try again </div>');
        }
    }

}
