@extends('layout.main')
@section('title')
Test
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
        <div class="box">
            <div class="box-header with-border col-sm-8">
                <center><h3 class="box-title">Welcome to your driving test</h3></center>
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
                        <input type="hidden" name="checked" value="{{\Session::get('checked')">
                        <?php $i = 1; ?>
                        @foreach($questions as $question)

                        <tr>
                            <td style="
                                font-family: 'Rokkitt', serif;
                                font-weight: normal;
                                font-size: 20px;
                                color: #00000;
                                margin-bottom: 16px;
                                margin-top: 16px;">
                                {{$i}}. {{$question->question}}
                            </td>
                            <td>   
                            </td>
                        </tr>
                        <tr>
                            <td>{{$question->id}}
                                <input type="hidden" name="{{$question->id}}" value="off">
                                @foreach($question->answers as $answer)
                                @if($answer->answer != "") 
                                <input type="radio" name="{{$question->id}}" value="{{ucfirst($answer->answer)}}"> {{ucfirst($answer->answer)}}<br>
                                @if($answer->ans_value == 1)
                                <input type="hidden" name="ans{{$question->id}}" value="{{ucfirst($answer->answer)}}">
                                @endif
                                @endif
                                @endforeach
                            </td>
                            <td style="width: 100px; border: 1px;">
                                @if($question->image_link != 'imageNo')
                                <a href="/uploads/images/{{$question->image_link}}" data-uk-lightbox="{group:'my-group'}"><img src="/uploads/images/{{$question->image_link}}" width="400" height="400" alt=""></a>
                                @endif
                            </td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                        </tbody>
                    </table>
                    <input type="submit" class="btn btn-success" value="CHECK RESULTS &#187; &#187;" style="font-size: 25px;">
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

//    $(document).ready(function () {
//        $('#testTable').DataTable({
//            "order": false,
//            "lengthMenu": [[20, 40, -1], [10, 20, "All"]],
//            "paging": true,
//            "info": false
//        });
//    });
</script>   
@stop