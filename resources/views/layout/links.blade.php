<?php
$post = \App\Http\Controllers\HomeController::getBlogLinks();
?>
<style>
        li {
        padding: .5em 0;
        border-bottom: 1px dotted #e6e6e6;
        list-style: decimal !important;
        list-style-position: inside !important;
        color: #999;
    }
</style>
<div class="box">
    <div class="box-header with-border">
        <center><h3 class="box-title">Popular Blog Posts</h3></center>
    </div>
    <div class="box-header with-border">
        <ul>
            @foreach($post['popular'] as $popular)
            <li>
                <a href="{{$popular->guid}}" target="_blank">{{$popular->post_title}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="box">
    <div class="box-header with-border">
        <center><h3 class="box-title">Recent Blog Posts</h3></center>
    </div>
    <div class="box-header with-border">
        <ul>
            @foreach($post['recent'] as $recent)
            <li>
                <a href="{{$recent->guid}}" target="_blank">{{$recent->post_title}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>

