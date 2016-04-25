@extends('layout.main')
@section('title')
Driving Basics
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
        background: url(images/page_load/Preloader_31.gif) center no-repeat #fff;
    }
</style>
@endsection
@section('content')
<hr>
<div class="row">
    <div class="col-md-10">
        <div class="box">
            <div class="box-header with-border">
                <center> <h3 class="box-title">Select Test Topics</h3></center>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            @if(Session::has('global'))
            <center><p>{!!Session::get('global')!!}</p></center>
            @endif
            {!! Form::open(array('url' => 'online-test')) !!}
            <div class="box-body">
                <?php $i = 0; ?>
                @foreach($types as $type)
                @if($i%4 == 0)
                <div class="uk-grid">
                    @endif
                    <div class="uk-width-medium-1-4 {{$type->id}}">
                        <div class="uk-panel-box-primary" style="height: 150px; border-radius: 5px; padding: 5px; box-shadow: 5px 5px 5px #888888; cursor: pointer">
                            <b>{{$type->type_name}}</b><br>
                            {{$type->description}}
                            <br>
                            <input name="checked[{{$type->id}}]" value="{{$type->type_name}}" type="checkbox"/>
                        </div>
                    </div>
                    @if($i%4 == 3)
                </div>
                @endif
                <?php $i++; ?>
                @endforeach
            </div><br>
            <input type="submit" class="btn btn-warning" value="PROCEED TO TEST &#187; &#187;" style="font-size: 25px;">
            {!! Form::close() !!}
            <div class="box-body no-padding">
            </div>
        </div>
    </div>

</div>
<!--<div class="row">
    <div class="col-sm-8">
        <h2>What We Do</h2>
        <p>Introduce the visitor to the business using clear, informative text. Use well-targeted keywords within your sentences to make sure search engines can find the business.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et molestiae similique eligendi reiciendis sunt distinctio odit? Quia, neque, ipsa, adipisci quisquam ullam deserunt accusantium illo iste exercitationem nemo voluptates asperiores.</p>
        <p>
            <a class="btn btn-default btn-lg" href="#">Call to Action &raquo;</a>
        </p>
    </div>
    <div class="col-sm-4">
        <h2>Contact Us</h2>
        <address>
            <strong>Start Bootstrap</strong>
            <br>3481 Melrose Place
            <br>Beverly Hills, CA 90210
            <br>
        </address>
        <address>
            <abbr title="Phone">P:</abbr>(123) 456-7890
            <br>
            <abbr title="Email">E:</abbr> <a href="mailto:#">name@example.com</a>
        </address>
    </div>
</div>
 /.row 

<hr>

<div class="row">
    <div class="col-sm-4">
        <img class="img-circle img-responsive img-center" src="http://placehold.it/300x300" alt="">
        <h2>Marketing Box #1</h2>
        <p>These marketing boxes are a great place to put some information. These can contain summaries of what the company does, promotional information, or anything else that is relevant to the company. These will usually be below-the-fold.</p>
    </div>
    <div class="col-sm-4">
        <img class="img-circle img-responsive img-center" src="http://placehold.it/300x300" alt="">
        <h2>Marketing Box #2</h2>
        <p>The images are set to be circular and responsive. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
    </div>
    <div class="col-sm-4">
        <img class="img-circle img-responsive img-center" src="http://placehold.it/300x300" alt="">
        <h2>Marketing Box #3</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
    </div>
</div>
 /.row -->

<hr>
@stop
@section('scripts')
@parent
@if($app->environment('local'))
<!--Need locally only-->
<script src="uikit-2.24.3/js/components/grid.min.js"></script>
<script src="uikit-2.26.2/js/components/grid-parallax.min.js"></script>
<script src="js/readmore.min.js"></script>
@else
<!--Need in production-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/grid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.26.2/js/components/grid-parallax.min.js"></script>
@endif
<!-- Needed both locally and i  production-->
<script src="js/readmore.min.js"></script>

<script>
<?php foreach ($types as $type) { ?>
        $(".{{$type->id}}").click(function () {
            var $checks = $(this).find('input:checkbox[name=checked\\[{{$type->id}}\\]]');

            $checks.prop("checked", !$checks.is(":checked"));
            //
            //  alert($checks.is(":checked"));
        });
<?php } ?>
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