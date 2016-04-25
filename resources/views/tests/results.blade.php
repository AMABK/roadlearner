@extends('layout.main')
@section('title')
Test Results
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
        background: url(images/page_load/Preloader_11.gif) center no-repeat #fff;

    }
</style>
@endsection
@section('content')
<hr>
<div class="row">
    <div class="col-md-10">
        <div class="box">
            <div class="box-header with-border col-sm-8">
                <center><h3 class="box-title">Driving Test Results</h3></center>
            </div>
            <div class="box-header with-border col-sm-4">
                <center><h3 class="box-title">Important Tips for City Driving</h3></center>
            </div>
            <form action="after-results" method="post" target="_blank">
                {!!csrf_field()!!}
                <div class="box-body col-sm-8 border-left border-right c-box-shadow" style="background-color: #f1f1f1">
                    <center><h2>Percentage Score: {{sprintf('%0.2f', $results['percent'])}}&percnt;</h2></center>
                    <center><h3><i>
                        <?php
                        if ($results['percent'] < 40) {
                            echo 'You must study harder!';
                        }elseif ($results['percent'] >= 40 && $results['percent'] < 60) {
                            echo 'You are not badly off, but you need to put more effort!';
                        }elseif ($results['percent'] >= 60 && $results['percent'] <80) {
                            echo 'You hard work has paid off, your almost there!';
                        }elseif ($results['percent'] >= 80 &&$results['percent'] <90) {
                            echo 'Excellent, you did it!';
                        }else {
                            echo 'Excellent performance, you are a genius!';
                        }
                        ?>
                            </i></h3></center>
                    <center><h3>{{($results['percent']/100)*($results['quiz_num'])}} correct Answers out of {{(sizeof($results)-1)/2}} Questions</h3></center>
                    @if(\Session::has('checked'))
                    <center><h2>Topics:</h2></center>
                    @foreach(\Session::get('checked') as $topics)
                    <center><h3>{{$topics}}</h3></center>
                    @endforeach
                    @endif
                    <input type="hidden" name="results" value="{{json_encode($results)}}">
                    <input type="submit" class="btn btn-warning" name="check" value="Check your answers" style="font-size: 25px; float: left">
                    <input type="submit" class="btn btn-warning" name="try" value="Try again" style="font-size: 25px; float: right">
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
            "paging": true
        });
    });
</script>   
@stop