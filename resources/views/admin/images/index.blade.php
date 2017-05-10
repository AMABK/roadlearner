@extends('layouts.app')
@section('title')
Test
@endsection
@section('content')
<link rel="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Documents | Admin Dashboard :</b> {{\Auth::user()->first_name}} {{\Auth::user()->last_name}}[{{\Auth::user()->email}}]</div>

                <div class="panel-body">
                    @if(Session::has('global'))
                    <center><p>{!!Session::get('global')!!}</p></center>
                    @endif
                    @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            <li>{{ $error }}</li>
                        </div>
                        @endforeach
                    </ul>
                    @endif
                    <div class="row">
                        @include('admin.images.navbar')
                        <div class="tab-content">
                            <div class="col-lg-12">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">#</th><th>Name</th><th style="width: 8%">Type</th><th style="width: 8%">View</th><th style="width: 8%">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($images as $image)
                                        <tr>
                                            <td>
                                                <?php
                                                echo $i;
                                                $i++;
                                                ?>
                                            </td>
                                            <td>
                                                {{strtoupper($image->sign_name)}}
                                            </td>
                                            <td>
                                                {{strtoupper($image->sign_type)}}
                                            </td>
                                            <td>
                                                <a href="/uploads/images/{{$image->sign_link}}" title="Click to view this image" target="_blank"> view image</a>
                                            </td>
                                            <td>
                                                <a href="#" title="Click to edit this image" data-toggle="modal" data-target="#editImage-{{$image->id}}"> edit image</a>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                    <div id="editImage-{{$image->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit image</h4>
                                                </div>
                                                <form action="/admin/edit-image" method="post" enctype="multipart/form-data">
                                                    {!!csrf_field()!!}
                                                    <div class="modal-body">
                                                        <label for="">Sign name</label>
                                                        <input type="hidden" name="id" value="{{$image->id}}">
                                                        <input type="hidden" name="details" value="update">
                                                        <input required="" name="sign_name" maxlength="52" placeholder="Enter name..." class="form-control" value="{{$image->sign_name}}"</textarea>
                                                        <label for="">Description</label> 
                                                        <textarea required="" maxlength="500" name="sign_desc" placeholder="Enter description here..." class="form-control" rows="3">{{$image->sign_desc}}</textarea>
                                                        <label for="">Sign Type</label> 
                                                        <select name="sign_type" class="form-control">
                                                            <option <?php
                                                            if ($image->sign_type == 'mandatory') {
                                                                echo 'selected';
                                                            }
                                                            ?> value="mandatory" class="form-control">Mandatory</option>
                                                            <option <?php
                                                            if ($image->sign_type == 'warning') {
                                                                echo 'selected';
                                                            }
                                                            ?> value="warning" class="form-control">Warning</option>
                                                            <option <?php
                                                            if ($image->sign_type == 'informational') {
                                                                echo 'selected';
                                                            }
                                                            ?> value="informational" class="form-control">Informational</option>
                                                        </select>
                                                        <label for="">Sign Status</label> 
                                                        <select name="status" class="form-control">
                                                            <option value="1" class="form-control">Active</option>
                                                            <option value="0" class="form-control">In Active</option>
                                                        </select>
                                                        <label for="">Select an image(Optional)</label>
                                                        <input type="file" name="sign" class="form-control" >
                                                        <input type="submit" class="btn btn-warning" value="Update">
                                                    </div>
                                                </form>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!--End of modal -->
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $images->links() !!}
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

    @else
    <!-- In production-->
    @endif
    <script src="//code.jquery.com/jquery-1.12.3.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>   
    @stop