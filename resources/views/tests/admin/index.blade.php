@extends('layouts.app')
@section('title')
Test
@endsection
@section('content')
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
                        @include('tests.admin.navbar')
                        <div class="tab-content">
                                <div class="col-lg-12">
                                    <form id="bookForm" method="post" action="/admin/add-questions" class="form-horizontal">
                                        {!!csrf_field()!!}
                                        <div class="col-xs-12"><label class="col-xs-4 control-label">Select a topic for all questions</label>
                                            <select class="form-control" required="" name="topic">
                                                <option value="">Please select a topic</option>
                                                @foreach($topics as $topic)
                                                <option value="{{$topic->id}}">{{$topic->type_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <h4>Enter questions for the selected topics</h4>
                                        <div class="form-group" style="border: solid #48484C 1px; border-radius: 5px">
                                            <label class="col-xs-2 control-label">Question</label>
                                            <div class="col-xs-12">
                                                <textarea class="form-control" name="quiz[]" required="" placeholder="Question"></textarea>
                                            </div><label class="col-xs-2 control-label">Option One</label>
                                            <div class="col-xs-12">
                                                <input type="text" class="form-control" name="ans1[]" placeholder="Option 1" />
                                            </div><label class="col-xs-2 control-label">Option Two</label>
                                            <div class="col-xs-12">
                                                <input type="text" class="form-control" name="ans2[]" placeholder="Option 2" />
                                            </div><label class="col-xs-2 control-label">Option Three</label>
                                            <div class="col-xs-12">
                                                <input type="text" class="form-control" name="ans3[]" placeholder="Option 3" />
                                            </div><label class="col-xs-2 control-label">Option Four</label>
                                            <div class="col-xs-12">
                                                <input type="text" class="form-control" name="ans4[]" placeholder="Option 4" />
                                            </div><label class="col-xs-3 control-label">Select Correct Answer</label>
                                            <div class="col-xs-12">
                                                <select class="form-control" required="" name="correct_ans[]">
                                                    <option value=""></option>
                                                    <option value="1">Option One</option>
                                                    <option value="2">Option Two</option>
                                                    <option value="3">Option Three</option>
                                                    <option value="4">Option Four</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12"><label class="col-xs-2 control-label">Is image needed?</label>
                                                <select class="form-control" required="" name="image_needed[]">
                                                    <option value="imageNo">No image</option>
                                                    <option value="imageYes">Image needed</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12">
                                                <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>

                                        <!-- The template for adding new field -->
                                        <div class="form-group hide" id="bookTemplate" style="border: solid #48484C 1px;border-radius: 5px">
                                            <div class="col-xs-12 "><label class="col-xs-2 control-label">Question</label>
                                                <textarea class="form-control" name="quiz[]" required="" placeholder="Question"></textarea>
                                            </div><label class="col-xs-2 control-label">Option One</label>
                                            <div class="col-xs-12">
                                                <input type="text" class="form-control" name="ans1[]" placeholder="Option 1" />
                                            </div><label class="col-xs-2 control-label">Option Two</label>
                                            <div class="col-xs-12">
                                                <input type="text" class="form-control" name="ans2[]" placeholder="Option 2" />
                                            </div><label class="col-xs-2 control-label">Option Three</label>
                                            <div class="col-xs-12">
                                                <input type="text" class="form-control" name="ans3[]" placeholder="Option 3" />
                                            </div><label class="col-xs-2 control-label">Option Four</label>
                                            <div class="col-xs-12">
                                                <input type="text" class="form-control" name="ans4[]" placeholder="Option 4" />
                                            </div><label class="col-xs-3 control-label">Select Correct Answer</label>
                                            <div class="col-xs-12">
                                                <select class="form-control" required="" name="correct_ans[]">
                                                    <option value=""></option>
                                                    <option value="1">Option One</option>
                                                    <option value="2">Option Two</option>
                                                    <option value="3">Option Three</option>
                                                    <option value="4">Option Four</option>
                                                </select>
                                            </div><label class="col-xs-2 control-label">Is image needed?</label>
                                            <div class="col-xs-12">
                                                <select class="form-control" required="" name="image_needed[]">
                                                    <option value="imageNo">No image</option>
                                                    <option value="imageYes">Image needed</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12">
                                                <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-5 col-xs-offset-1">
                                                <button type="submit" class="btn btn-default">Submit</button>
                                            </div>
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