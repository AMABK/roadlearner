@extends('layout.main')
@section('title')
Contact us 
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
        background: url(images/page_load/Preloader_8.gif) center no-repeat #fff;

    }
</style>
@endsection
@section('content')
<?php
$x = rand(10,80);
$y = rand(1,20);
$ans = $x+$y;
?>
<hr>
<div class="row">
    <div class="col-md-10">
        <div class="container">
            <div class="section_header">
                <h3>Get in touch</h3>
            </div>
            <div class="row contact">
                <p>
                    We’d love to hear from you. Fill out the form below and hit our inbox. We will get back to you as soon as we can.</p>

                <form>
                    <div class="row form">
                        <div class="col-sm-6 row-col">
                            <div class="box">
                                <label>Name</label>
                                <input class="name form-control" required="" name="name" type="text" placeholder="Name">
                                 <label>Email</label>
                                 <input class="mail form-control" required="" type="email" placeholder="Email">
                                 <label>Phone</label>
                                 <input  class="phone form-control" name="phone" type="tel" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <textarea required="" name="message" placeholder="Type a message here..." class="form-control" rows="8"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row submit">
                        <div class="col-md-5 box">
                            <label class="checkbox">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="newsletter" value="on"> Sign up for roadlearner newsletter
                            </label>
                        </div>
                        <div class="col-md-5 box">
                            <label class="checkbox">
                                <input type="hidden" name="ans" value="{{$ans}}">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>CAPTCHA: {{$x}} + {{$y}}&nbsp;&nbsp;&nbsp;&nbsp; = </label><input style="float: right; margin-right: 75%" type="text" class="col-md-1" name="captcha" required="enter sum">
                            </label>
                        </div>
                        <div class="col-md-3 right">
                            <input type="submit" class="btn btn-success" value="Send your message">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<hr>
@stop
@section('scripts')
@parent
@if($app->environment('local'))
<!--Need locally only-->
<script src="uikit-2.24.3/js/components/lightbox.min.js"></script>
<script src="js/readmore.min.js"></script>
@else
<!--Need in production-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/lightbox.min.js"></script>
@endif
<!-- Needed both locally and i  production-->
<script src="js/readmore.min.js"></script>

<script>
    $('basics').readmore({
        speed: 1500,
        collapsedHeight: 120,
        heightMargin: 16,
        lessLink: '<a href="#">Read less</a>'
    });

    $(document).ready(function () {
        //   $('#myTable').DataTable();
    });
</script>   
@stop