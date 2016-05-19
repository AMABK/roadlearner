@extends('layout.main')
@section('title')
Traffic Signs
@endsection
@section('preloader')
<style>
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
        background: url(/images/page_load/Preloader_9.gif) center no-repeat #fff;

    }
</style>
@endsection
@section('content')
<hr>
<div class="row">
    <div class="col-md-9">
        <div class="box">
            <div class="box-header with-border">
                <center><h3 class="box-title">Road Learner Downloads</h3></center>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <?php $i=1;?>
                    @foreach($downloads as $download)
                    <tr>
                        <td style="width: 5%">
                            <?php
                            echo $i;
                            $i++;
                            ?>
                        </td>
                        <td>
                            <i class="icon-link"></i><a href="/download/{{$download->id}}" title="Click to download this document" target="_blank"> {{strtoupper($download->doc_name)}}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-3">
        <div class="box">
            <div class="box-header with-border">
                <center><h3 class="box-title">Useful Links</h3></center>

            </div>
        </div>
    </div>
</div>

<hr>
@stop
@section('scripts')
@parent
@if($app->environment('local'))
@else
@endif
<script>
    function toggler(divId) {
        $("#" + divId).toggle(500);
    }
    $('signs').readmore({
        speed: 1500,
        collapsedHeight: 10,
        heightMargin: 0,
        lessLink: '<a href="#">Read less</a>'
    });
    $(document).ready(function () {
        //   $('#myTable').DataTable();
    });
</script>   
@stop