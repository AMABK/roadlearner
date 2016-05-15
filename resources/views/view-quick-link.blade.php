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
    <div class="col-md-12"style="height:600px">
        <object data="/uploads/documents/{{$doc->doc_link}}" type="application/pdf" width="100%" height="100%">
            <iframe src="/uploads/documents/{{$doc->doc_link}}" width="100%" height="100%" style="border: none;">
                This browser does not support PDFs. Please download the PDF to view it: <a href="/uploads/documents/{{$doc->doc_link}}">Download PDF</a>
            </iframe>
        </object>
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