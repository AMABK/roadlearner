@extends('layout.main')
@section('title')
Review Test Answers
@endsection
@section('preloader')
<style>
    .dataTables_filter {
        display: none; 
    }
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
        background: url(images/page_load/Preloader_6.gif) center no-repeat #fff;

    }
</style>
@endsection
@section('content')
<hr>
<div class="row">
    <div class="col-md-10">
        <div class="box" style="margin-left: 10%;">
            <div class="box-header with-border col-sm-8">
                <center><h3 class="box-title">Driving Test Review</h3></center>
            </div>
            <div class="box-header with-border col-sm-4">
                <center><h3 class="box-title">Important Tips for City Driving</h3></center>
            </div>
            <form action="test-results" method="post">
                {!!csrf_field()!!}
                <div class="box-body col-sm-8 border-left border-right">
                    <table class="table table-striped c-box-shadow"  id="testTable"style="width: 100%">
                        <thead class="hidden">
                            <tr><th></th><th></th></tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?> 
                            @foreach($results as $key => $result)
                            @if(is_numeric($key))
                            <?php
                            $quiz = \App\Question::find($key);
                            ?>
                            <tr>
                                <td style="
                                    font-family: 'Rokkitt', serif;
                                    font-weight: normal;
                                    font-size: 20px;
                                    color: #00000;
                                    margin-bottom: 16px;
                                    margin-top: 16px;">
                                    {{$i}}. {{$quiz->question}}
                                </td>
                                <td>   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    @foreach($quiz->answers as $answer)
                                    <?php
                                    $selected = '';
                                    $correct = '';
                                    if ($result == $answer->answer) {
                                        $selected = 'checked';
                                        $correct = 'correct';
                                    }
                                    ?>
                                    <input type="radio" disabled="" name="{{$quiz->id}}" {{$selected}} value="{{ucfirst($answer->answer)}}" > {{ucfirst($answer->answer)}}<br>
                                    @endforeach
                                    @if($correct == 'correct')
                        <c style="color: green">Correct Answer &#128077;</c>
                        @else
                        <w style="color:red">Wrong Answer &#128078;</w><br>
                        Correct Answer is: {{$result}}
                        @endif

                        </td>
                        <td style="width: 100px; border: 1px;">
                            @if($quiz->image_link != null)
                            <a href="/uploads/images/{{$quiz->image_link}}" data-uk-lightbox="{group:'my-group'}"><img src="/uploads/images/{{$quiz->image_link}}" width="400" height="400" alt=""></a>
                            @endif
                        </td>
                        </tr>
                        <?php $i++; ?>
                        @endif
                        @endforeach
                        </tbody>
                    </table>
    <!--                <input type="submit" class="btn btn-success" value="CHECK RESULTS &#187; &#187;" style="font-size: 25px;">-->
                </div>
            </form>
            <div class="box-body col-sm-4 border-left border-right">

            </div>
            <div class="box-body no-padding">
            </div>
        </div>
    </div>

</div>
<hr>
@stop
@section('scripts')
@parent
@if($app->environment('local'))
<!--Needed locally only-->
<script src="uikit-2.24.3/js/components/lightbox.min.js"></script>
<script src="js/readmore.min.js"></script>
@else
<!--Needed in production-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/lightbox.min.js"></script>
@endif
<!-- Needed both locally and in production-->
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script src="js/readmore.min.js"></script>

<script>
    $('basics').readmore({
        speed: 1500,
        collapsedHeight: 120,
        heightMargin: 16,
        lessLink: '<a href="#">Read less</a>'
    });

    $(document).ready(function () {
        $('#testTable').DataTable({
            "order": false,
            "paging": false,
            "info": false
        });
    });
</script>   
@stop