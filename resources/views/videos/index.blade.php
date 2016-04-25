@extends('layout.main')
@section('title')
Driving Videos
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
        background: url(images/page_load/Preloader_9.gif) center no-repeat #fff;

    }
</style>
@endsection
@section('content')
<hr>
<div class="row">
    <div class="col-md-10">
        <div class="box" style="margin-left: 10%;">
            <div class="box-header with-border">
                <center><h3 class="box-title">Driving Training Videos</h3></center>
                <div class="box-tools pull-right">
                    <a onclick="toggler('filterView');" class="btn btn-warning">Filter Videos
                    </a>
                </div>
            </div>
            <div id="filterView" style="display:none;">
                <form action="/driving-videos" method="post">
                    {!!csrf_field()!!}
                    <div>Video Name
                        <input type="text" name="name">
                        Video Category
                        <select name="filter['category']">
                            <option value="">Round About</option>
                            <option value="">Yellow Boxes</option>
                            <option value="">City Driving</option>
                        </select>
                        Video Type
                        <select name="type">
                            <option value="">Beginners</option>
                            <option value="">Experts</option>
                        </select>
                        Video Name
                        <input type="text">
                        <input type="submit" value="Search">
                    </div>
                </form>
            </div>
            @if(sizeof($videos) < 1)
            <center><div class="alert alert-warning" align="center">No video records found</div></center>
            @endif
            <div class="box-body no-padding">
                <?php $j = 0; ?>
                @foreach($videos as $video)
                @if($j%3 == 0)
                <div class="uk-grid">
                    @endif
                    <div class="uk-width-medium-1-3">
                        <div class="uk-panel uk-panel-box uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                            <a href="/uploads/videos/{{$video->video_link}}" data-uk-lightbox="{group:'my-group'}"><video width="260" height="200"> <source src="/uploads/videos/{{$video->video_link}}" type="video/mp4"></video></a>
                        </div>
                        <videos>{{$video->video_desc}}</videos>
                    </div>
                    @if($j%3 == 2)
                </div>
                @endif
                <?php $j++; ?>
                @endforeach 
            </div>               
            <div class="box-body no-padding">
                {!! $videos->links() !!}
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
<script src="uikit-2.24.3/js/components/lightbox.min.js"></script>
@else
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/lightbox.min.js"></script>
@endif
<!-- Needed both locally and in production-->
<script src="js/readmore.min.js"></script>
<script>
                        function toggler(divId) {
                            $("#" + divId).toggle(500);
                        }
                        $('videos').readmore({
                            speed: 1500,
                            collapsedHeight: 60,
                            heightMargin: 16,
                            lessLink: '<a href="#">Read less</a>'
                        });
                        $(document).ready(function () {
                            //   $('#myTable').DataTable();
                        });
</script>   
@stop