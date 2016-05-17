@extends('layouts.app')
@section('title')
Test
@endsection
@section('content')
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Test | Admin Dashboard :</b> {{\Auth::user()->first_name}} {{\Auth::user()->last_name}}[{{\Auth::user()->email}}]</div>
                <div class="panel-body">
                    @if(Session::has('global'))
                    <center><p>{!!Session::get('global')!!}</p></center>
                    @endif
                    <div class="row">
                        @include('tests.admin.navbar')
                        <div class="tab-content">
                            <div class="col-md-12">
                                <form action="/admin/view-test" method="post">
                                    {!!csrf_field()!!}
                                    <span class="col-md-3">Question
                                        <input type="text" name="question" class="form-control">
                                    </span>
                                    <span class="col-md-3">Status
                                        <select class="form-control" name="status">
                                            <option value=""></option>
                                            <option value="1">Active</option>
                                            <option value="2">In Active</option>
                                        </select>
                                    </span>
                                    <span class="col-md-3">Image
                                        <select class="form-control" name="image">
                                            <option value=""></option>
                                            <option value="imageYes">Un updated Image</option>
                                            <option value="link">With Image</option> 
                                            <option value="null">No Image</option>

                                        </select>
                                    </span>
                                    <span class="col-md-2">Action
                                        <input type="submit"  class="form-control btn-warning" value="search">
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($tests as $test)
                            <form action="/admin/edit-question" method="post" >
                                {!!csrf_field()!!}
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$test->id}}">{{$test->question}}</a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{$test->id}}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            @if($test->image_link == 'imageYes')
                                            Please select an image
                                            <input type="text" name="image" required="" id="name{{$test->id}}" placeholder="Search image/sign by name to update the current image" class="form-control">
                                            <input type="hidden" name="image_link" required="" id="image_link{{$test->id}}">
                                            @endif
                                            @if(($test->image_link != 'imageYes')&&($test->image_link != null))
                                            <img src="/uploads/images/{{$test->image_link}}" alt="{{$test->question}}" style="width:165px;height:165px;">
                                            <br>
                                            Select a different image
                                            <input type="text" name="image" id="name{{$test->id}}" placeholder="Search image/sign by name to update the current image" class="form-control">
                                            <input type="hidden" name="image_link" id="image_link{{$test->id}}">
                                            @endif
                                            @foreach($test->answers as $answer)
                                            <?php
                                            $select = '';
                                            if ($answer->ans_value == 1) {
                                                $select = 'checked';
                                            }
                                            ?>
                                            <input type="radio" {{$select}} required=""  name="ans[{{$test->id}}]" value="{{$answer->id}}" >{{$answer->answer}}<br>
                                            @endforeach
                                            <select class="form-control" name="question_status">
                                                <option value="1" class="form-control"> Active</option>
                                                <option value="0" class="form-control">In Active</option>
                                            </select>
                                            <input type="submit" value="Update" class="btn-warning">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endforeach
                            {!! $tests->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
@parent
@if($app->environment('local'))
<!-- In Dev-->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
@else
<!-- In production-->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
@endif
<script>
<?php foreach ($tests as $test) { ?>
        $(document).ready(function () {
            var image_details = {
                source: "/image-auto-complete",
                select: function (event, image) {
                    +
                            $("#name{{$test->id}}").val(image.item.name);
                    $("#image_link{{$test->id}}").val(image.item.image_link);
                },
                minLength: 1
            };
            $("#name{{$test->id}}").autocomplete(image_details);

        });
<?php } ?>
</script>   
@stop