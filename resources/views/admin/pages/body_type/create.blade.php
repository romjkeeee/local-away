{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Body type create</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                <form id="storeForm" action="{{ route('body-type.store') }}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                    <?php
                    $form_fields = array(
                        'title',
                        'image',
                        'gender',
                    );
                    ?>
                    @foreach($form_fields as $field)
                        @if($field == 'image')
                            <div class="form-group">
                                <label for="exampleInput{{ $field }}">{{ $field }}</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInput{{ $field }}" name="{{ $field }}">
                                        <label class="custom-file-label" for="exampleInput{{ $field }}">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        @elseif($field == 'gender')
                            <div class="form-group">
                                <label for="inputForRole">Gender</label>
                                <p><select name="gender" class="form-control">
                                        <option selected disabled>Chose gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select></p>
                            </div>
                        @else
                            <div class="form-group">
                                <label for="inputFor{{ $field }}">{{$field}}</label>
                                <input class="form-control" name="{{ $field }}" id="input{{ $field }}">
                            </div>
                        @endif
                    @endforeach
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-secondary margin-r-5">Save</button>
                        <a href="{{ route('body-type.index') }}" class="btn btn-default">Back to list</a>

                    </div>
                </form>
            </div>
        </div>
        @stop

        @section('js')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bs-custom-file-input/1.3.4/bs-custom-file-input.min.js"></script>

            <script type="text/javascript">
                $(document).ready(function () {
                    $.validator.setDefaults({
                        submitHandler: function () {
                            document.getElementById('storeForm').submit()
                        }
                    });
                    $('#storeForm').validate({
                        rules: {
                            title: {
                                required: true,
                            },
                            image: {
                                required: true,
                            },
                            gender: {
                                required: true,
                            },
                        },
                        messages: {
                            title: {
                                required: "Please enter a title",
                            },
                            image: {
                                required: "Please upload a image",
                            },
                            gender: {
                                required: "Please chose a gender",
                            },
                        },
                        errorElement: 'span',
                        errorPlacement: function (error, element) {
                            error.addClass('invalid-feedback');
                            element.closest('.form-group').append(error);
                        },
                        highlight: function (element, errorClass, validClass) {
                            $(element).addClass('is-invalid');
                        },
                        unhighlight: function (element, errorClass, validClass) {
                            $(element).removeClass('is-invalid');
                        }
                    });
                });

                $(document).ready(function () { bsCustomFileInput.init(); });
            </script>
@stop
