@extends('layouts.app')
@section('title')
Administrator
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Imports | Admin Dashboard :</b> {{\Auth::user()->first_name}} {{\Auth::user()->last_name}}[{{\Auth::user()->email}}]</div>

                <div class="panel-body">
                    @if(Session::has('global'))
                    <center><p>{!!Session::get('global')!!}</p></center>
                    @endif
                    @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" ><li>{{ $error }}</li></div>
                        @endforeach
                    </ul>
                    @endif
                    <div class="row">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Import MV</a></li>
                            <li><a data-toggle="tab" href="#motorcycle">Import MC</a></li>
                            <li><a data-toggle="tab" href="#trailer">Import Trailer</a></li>
                            <li><a data-toggle="tab" href="#tractor">Import Tractor</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <div class="col-lg-6">
                                    <form action="/admin/import-mv-doc" method="post" enctype="multipart/form-data">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label for="usr">Select file:</label>
                                            <input type="file" name="import_file" required="" class="form-control" id="usr">
                                        </div>
                                        <!--                                        <div class="form-group">
                                                                                    <label for="usr">Name:</label>
                                                                                    <input type="text" class="form-control" id="usr">
                                                                                </div>-->
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn-success" id="pwd">
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
                            <div id="motorcycle" class="tab-pane fade">
                                <div class="col-lg-6">
                                    <form action="/admin/import-mc-doc" method="post" enctype="multipart/form-data">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label for="usr">Select file:</label>
                                            <input type="file" name="import_file" required="" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn-success" id="pwd">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="trailer" class="tab-pane fade">
                                <div class="col-lg-6">
                                    <form action="/admin/import-trailer-doc" method="post" enctype="multipart/form-data">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label for="usr">Select file:</label>
                                            <input type="file" name="import_file" required="" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn-success" id="pwd">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="tractor" class="tab-pane fade">
                                <div class="col-lg-6">
                                    <form action="/admin/import-mc-doc" method="post" enctype="multipart/form-data">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label for="usr">Select file:</label>
                                            <input type="file" name="import_file" required="" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn-success" id="pwd">
                                        </div>
                                    </form>
                                </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.11.4/jquery-ui.min.js"></script>
<script src="http://formvalidation.io/vendor/formvalidation/js/formValidation.min.js"></script>
<script src="http://formvalidation.io/vendor/formvalidation/js/framework/bootstrap.min.js">
    < script src = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js" ></script>
@else
<!-- In production-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
@endif
<script>
    $(document).ready(function () {
        var user_details = {
            source: "/image-auto-complete",
            select: function (event, users) {
                +
                        $("#email").val(users.item.group_name);
                $("#first_name").val(users.item.first_name);
                $("#last_name").val(users.item.last_name);
                $("#id").val(users.item.id);


            },
            minLength: 2
        };
        $("#email").autocomplete(user_details);

    });
    //ge
    $(document).ready(function () {
        var titleValidators = {
            row: '.col-xs-4', // The title is placed inside a <div class="col-xs-4"> element
            validators: {
                notEmpty: {
                    message: 'The title is required'
                }
            }
        },
        isbnValidators = {
            row: '.col-xs-4',
            validators: {
                notEmpty: {
                    message: 'The ISBN is required'
                },
                isbn: {
                    message: 'The ISBN is not valid'
                }
            }
        },
        priceValidators = {
            row: '.col-xs-2',
            validators: {
                notEmpty: {
                    message: 'The price is required'
                },
                numeric: {
                    message: 'The price must be a numeric number'
                }
            }
        },
        bookIndex = 0;

        $('#bookForm')
                .formValidation({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        'test[0].quiz': titleValidators,
                        'test[0].ans1': isbnValidators,
                        'test[0].ans2': priceValidators,
                        'test[0].ans3': priceValidators,
                        'test[0].ans4': priceValidators
                    }
                })

                // Add button click handler
                .on('click', '.addButton', function () {
                    bookIndex++;
                    var $template = $('#bookTemplate'),
                            $clone = $template
                            .clone()
                            .removeClass('hide')
                            .removeAttr('id')
                            .attr('data-book-index', bookIndex)
                            .insertBefore($template);

                    // Update the name attributes
                    $clone
                            .find('[name="quiz"]').attr('name', 'test[' + bookIndex + '].quiz').end()
                            .find('[name="ans1"]').attr('name', 'test[' + bookIndex + '].ans1').end()
                            .find('[name="ans2"]').attr('name', 'test[' + bookIndex + '].ans2').end()
                            .find('[name="ans3"]').attr('name', 'test[' + bookIndex + '].ans3').end()
                            .find('[name="ans4"]').attr('name', 'test[' + bookIndex + '].ans4').end();

                    // Add new fields
                    // Note that we also pass the validator rules for new field as the third parameter
                    $('#bookForm')
                            .formValidation('addField', 'test[' + bookIndex + '].quiz', titleValidators)
                            .formValidation('addField', 'test[' + bookIndex + '].ans1', isbnValidators)
                            .formValidation('addField', 'test[' + bookIndex + '].ans2', priceValidators)
                            .formValidation('addField', 'test[' + bookIndex + '].ans3', priceValidators)
                            .formValidation('addField', 'test[' + bookIndex + '].ans4', priceValidators);
                })

                // Remove button click handler
                .on('click', '.removeButton', function () {
                    var $row = $(this).parents('.form-group'),
                            index = $row.attr('data-book-index');

                    // Remove fields
                    $('#bookForm')
                            .formValidation('removeField', $row.find('[name="test[' + index + '].quiz"]'))
                            .formValidation('removeField', $row.find('[name="test[' + index + '].ans1"]'))
                            .formValidation('removeField', $row.find('[name="test[' + index + '].ans2"]'))
                            .formValidation('removeField', $row.find('[name="test[' + index + '].ans3"]'))
                            .formValidation('removeField', $row.find('[name="test[' + index + '].ans4"]'));

                    // Remove element containing the fields
                    $row.remove();
                });
    });
</script>   
@stop