{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">User create</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                <form id="storeForm" action="{{ route('sizing.store') }}" method="POST">
                    {{ csrf_field() }}
                <?php
                    $form_fields = array(
                        'title',
                    );
                    ?>
                    @foreach($form_fields as $field)
                        @error($field)
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="form-group">
                            <label for="inputFor{{ $field }}">{{$field}}</label>
                            <input class="form-control" name="{{ $field }}" id="input{{ $field }}">
                        </div>
                    @endforeach
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-secondary margin-r-5">Save</button>
                        <a href="{{ route('sizing.index') }}" class="btn btn-default">Back to list</a>

                    </div>
                </form>
            </div>
        </div>
        @stop

@section('js')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>

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
                        },
                        messages: {
                            title: {
                                required: "Please enter a title",
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
            </script>
@stop
