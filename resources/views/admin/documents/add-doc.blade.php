@extends('layouts.app')
@section('title')
Test
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Documents | Admin Dashboard :</b> {{\Auth::user()->first_name}} {{\Auth::user()->last_name}}[{{\Auth::user()->email}}]</div>

                <div class="panel-body">
                    @if(Session::has('global'))
                    <center><p>{!!Session::get('global')!!}</p></center>
                    @endif
                    <div class="row">
                        @include('admin.documents.navbar')
                        <div class="tab-content">
                            <div class="col-lg-12">
                                <h3>Documents</h3>
                                <div class="col-lg-6">
                                    <form action="/admin/add-doc" method="post" enctype="multipart/form-data">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label for="">Select a document </label>                                
                                            <input type="file" required="" name="document" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Document Type</label>
                                            <select type="text" required="" name="document_type" class="form-control" id="exampleInputPassword1" placeholder="Document type">
                                                <option value="">Please select</option>
                                                <option value="usefullink">Useful Link</option>
                                                <option value="download">Download</option>
                                                <option value="all">All</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Document Name</label>
                                            <input type="text" required="" name="document_name" class="form-control" id="exampleInputPassword1" placeholder="Document name">
                                        </div>
                                        <label for="">Document Description</label>                                
                                        <textarea required="" name="document_description" placeholder="Document description..." class="form-control" rows="3"></textarea>
                                        <div class="form-group">
                                            <input type="submit" value="Upload document" class="form-control btn-success" id="exampleInputPassword2" placeholder="Video name">
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
    @endsection
    @section('scripts')
    @parent
    @if($app->environment('local'))

    @else
    <!-- In production-->
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