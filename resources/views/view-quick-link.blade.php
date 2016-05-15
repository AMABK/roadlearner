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
        <object data="http://www.attorney-general.go.ke/wp-content/uploads/2015/12/Companies-Regulations.pdf" type="application/pdf" width="100%" height="100%">
            <iframe src="http://www.attorney-general.go.ke/wp-content/uploads/2015/12/Companies-Regulations.pdf" width="100%" height="100%" style="border: none;">
                This browser does not support PDFs. Please download the PDF to view it: <a href="http://www.attorney-general.go.ke/wp-content/uploads/2015/12/Companies-Regulations.pdf">Download PDF</a>
            </iframe>
        </object>
    </div>
</div>

<hr>
@stop
@section('scripts')
@parent
@if($app->environment('local'))
<script src="/uikit-2.24.3/js/components/lightbox.min.js"></script>
@else
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/lightbox.min.js"></script>
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