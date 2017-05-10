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
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th style="width: 5%">#</th><th>Name</th><th style="width: 8%">Type</th><th style="width: 8%">View</th><th style="width: 8%">Edit</th>
                                        </tr>
                                        <?php $i = 1; ?>
                                        @foreach($docs as $doc)
                                        <tr>
                                            <td>
                                                <?php
                                                echo $i;
                                                $i++;
                                                ?>
                                            </td>
                                            <td>
                                                {{strtoupper($doc->doc_name)}}
                                            </td>
                                            <td>
                                                {{strtoupper($doc->doc_type)}}
                                            </td>
                                            <td>
                                                <a href="/download/{{$doc->id}}" title="Click to view this document" target="_blank"> view doc</a>
                                            </td>
                                            <td>
                                                <a href="#" title="Click to edit this document" data-toggle="modal" data-target="#editDoc-{{$doc->id}}"> edit doc</a>
                                            </td>
                                        </tr>
                                    <!-- Modal -->
                                    <div id="editDoc-{{$doc->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit document</h4>
                                                </div>
                                                 <form action="/admin/edit-doc" method="post">
                                                    {!!csrf_field()!!}
                                                    <div class="modal-body">
                                                        <label for="">Document name</label>
                                                        <input type="hidden" name="id" value="{{$doc->id}}">
                                                        <input required="" name="name" maxlength="52" placeholder="Enter name..." class="form-control" value="{{$doc->doc_name}}"</textarea>
                                                        <label for="">Description</label> 
                                                        <textarea required="" maxlength="250" name="description" placeholder="Enter description here..." class="form-control" rows="3">{{$doc->doc_desc}}</textarea>
                                                        <label for="">Document Type</label> 
                                                        <select name="doc_type" class="form-control">
                                                            <option <?php if($doc->doc_type == 'usefullink'){ echo 'selected';} ?> value="usefullink" class="form-control">Useful Link</option>
                                                            <option <?php if($doc->doc_type == 'download'){ echo 'selected';} ?> value="download" class="form-control">Download</option>
                                                        </select>
                                                        <label for="">Document Status</label> 
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
                                    <!--End of modal -->
                                    @endforeach
                                    </tbody>
                                </table>
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