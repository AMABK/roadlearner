@extends('layouts.app')
@section('title')
Test
@endsection
@section('content')
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Test | Admin Dashboard :</b> {{\Auth::user()->first_name}} {{\Auth::user()->last_name}}[{{\Auth::user()->email}}]</div>
                <div class="panel-body">
                    @if(Session::has('global'))
                    <center><p>{!!Session::get('global')!!}</p></center>
                    @endif
                    <div class="row">
                        @include('admin.tests.navbar')
                        <div class="tab-content">
                            <div class="col-md-12">
                                <!-- Trigger the modal with a button -->
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add category</button>

                                <!-- Modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add Category</h4>
                                            </div>
                                            <form action="/admin/add-cat" method="post">
                                                {!!csrf_field()!!}
                                                <div class="modal-body">
                                                    <label for="">Category name</label>
                                                    <input required="" name="name" maxlength="22" placeholder="Enter name..." class="form-control" </textarea>
                                                    <label for="">Description</label> 
                                                    <textarea required="" name="description" maxlength="155" placeholder="Enter description here..." class="form-control" rows="3"></textarea>
                                                    <input type="submit" class="btn btn-warning" value="Save">
                                                </div>
                                            </form>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--                                End of modal-->
                                <dl style="list-style: none">
                                    @foreach($cats as $cat)
                                    <dt>
                                        &rHar;{{$cat->type_name}}
                                    </dt>
                                    <dd>
                                        {{$cat->description}}
                                        <a href="#" data-toggle="modal" data-target="#cat-{{$cat->id}}" title="click to edit this category">edit</a>
                                    </dd>
                                    <!-- Modal -->
                                    <div id="cat-{{$cat->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit Category</h4>
                                                </div>
                                                <form action="/admin/edit-cat" method="post">
                                                    {!!csrf_field()!!}
                                                    <div class="modal-body">
                                                        <label for="">Category name</label>
                                                        <input type="hidden" name="id" value="{{$cat->id}}">
                                                        <input required="" name="name" maxlength="22" placeholder="Enter name..." class="form-control" value="{{$cat->type_name}}"</textarea>
                                                        <label for="">Description</label> 
                                                        <textarea required="" maxlength="155" name="description" placeholder="Enter description here..." class="form-control" rows="3">{{$cat->description}}</textarea>
                                                        <label for="">Category Status</label> 
                                                        <select name="status" class="form-control">
                                                            <option value="1" class="form-control">Active</option>
                                                            <option value="0" class="form-control">In Active</option>
                                                        </select>
                                                        <input type="submit" class="btn btn-warning" value="Update">
                                                    </div>
                                                </form>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!--                                End of modal-->
                                    @endforeach
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
@parent
@if($app->environment('local'))
<!-- In Dev-->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
@else
<!-- In production-->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
@endif
<script>

</script>   
@stop