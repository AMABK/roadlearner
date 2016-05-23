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
                <center><h3 class="box-title">Learning about all traffic signs</h3></center>
                <div class="box-tools pull-right">
                    <a onclick="toggler('filterView');" class="btn btn-warning">Filter Signs
                    </a>
                </div>
            </div>
            @if(Session::has('global'))
            <center><p>{!!Session::get('global')!!}</p></center>
            @endif
            <div id="filterView" style="display:none;">
                <form action="/traffic-signs" method="post">
                    {!!csrf_field()!!}
                    Sign Name
                    <input type="text" name="name" class="form-control">
                        Sign category
                        <select name="category" class="form-control">
                            <option value="">Select</option>
                            <option value="mandatory">Mandatory signs</option>
                            <option value="warning">Warning signs</option>
                            <option value="informational">Informational signs</option>
                        </select>
                        Sign description
                        <input type="text" class="form-control">
                        <input type="submit" value="Search" class="btn btn-success">
                </form>
            </div>
            @if(sizeof($signs) < 1)
            <center>
                <div class="alert alert-warning" align="center">
                    No sign records found
                </div>
            </center>
            @endif
            <div class="box-body no-padding">
                <?php $j = 0; ?>
                @foreach($signs as $sign)
                @if($j%4 == 0)
                <div class="uk-grid">
                    @endif
                    <div class="uk-width-medium-1-4">
                        <div class="uk-panel uk-panel-box uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
                            <a href="/uploads/images/{{$sign->sign_link}}" data-uk-lightbox="{group:'my-group'}"><img src="/uploads/images/{{$sign->sign_link}}" width="400" height="400" alt=""></a>
                        </div>
                        <center><signs>{{$sign->sign_desc}}</signs></center>
                    </div>
                    @if($j%4 == 3)
                </div>
                @endif
                <?php $j++; ?>
                @endforeach            
            </div>
            <div class="box-body no-padding">
                {!! $signs->links() !!}
            </div>
        </div>
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