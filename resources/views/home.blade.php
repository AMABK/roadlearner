@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Admin Dashboard :</b> {{\Auth::user()->first_name}} {{\Auth::user()->last_name}}[{{\Auth::user()->email}}]</div>

                <div class="panel-body">
                    @if(Session::has('global'))
                    <center><p>{!!Session::get('global')!!}</p></center>
                    @endif
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="/add-sign" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label for="">Select a sign image</label>                                
                                    <input type="file" required="" name="sign" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="">Sign Type</label>
                                    <select type="text" required="" name="sign_type" class="form-control" id="exampleInputPassword1" placeholder="Sign name">
                                        <option value="">Please select</option>
                                        <option value="mandatory">Mandatory Sign</option>
                                        <option value="warning">Warning Sign</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Sign Name</label>
                                    <input type="text" required="" name="sign_name" class="form-control" id="exampleInputPassword1" placeholder="Sign name">
                                </div>
                                <label for="">Sign Description</label>                                
                                <textarea required="" name="sign_desc" placeholder="Sign description..." class="form-control" rows="3"></textarea>
                                <div class="form-group">
                                    <input type="submit" value="Upload Image" class="form-control btn-success" id="exampleInputPassword1" placeholder="Sign Description">
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <form action="/add-video" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label for="">Select a video </label>                                
                                    <input type="file" required="" name="video" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="">Video Type</label>
                                    <select type="text" required="" name="video_type" class="form-control" id="exampleInputPassword1" placeholder="Video type">
                                        <option value="">Please select</option>
                                        <option value="mandatory">Mandatory Sign</option>
                                        <option value="warning">Warning Sign</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Video Name</label>
                                    <input type="text" required="" name="video_name" class="form-control" id="exampleInputPassword1" placeholder="Video name">
                                </div>
                                <label for="">Video Description</label>                                
                                <textarea required="" name="video_desc" placeholder="Video description..." class="form-control" rows="3"></textarea>
                                <div class="form-group">
                                    <input type="submit" value="Upload Video" class="form-control btn-success" id="exampleInputPassword2" placeholder="Video name">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection