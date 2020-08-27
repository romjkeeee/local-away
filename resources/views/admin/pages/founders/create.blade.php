{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Founders</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Founders</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop
@section('content')
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <x-validation-error errors="{{ $error }}"></x-validation-error>
        @endforeach
    @endif
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Create founder</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::open(['route' => ['founders.store'], 'file' => true, 'method' => 'POST','enctype'=>'multipart/form-data']) }}
                {{ csrf_field() }}
                <div class="form-group">
                    {{ Form::label('name') }}
                    {{ Form::text('name', old('name'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('linkedin') }}
                    {{ Form::text('linkedin', old('linkedin'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('facebook') }}
                    {{ Form::text('facebook', old('facebook'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('twitter') }}
                    {{ Form::text('twitter', old('twitter'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    <label for="exampleInputImage">Photo</label>
                    <div class="input-group">
                        <div class="custom-file">
                            {{ Form::label('photo', 'Chose file', ['class' => 'custom-file-label']) }}
                            {{ Form::file('photo') }}
                        </div>
                    </div>
                </div>
                <x-footer-button route="{{ route('founders.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
@stop
@section('js')
            <script type="text/javascript">

                $(document).ready(function () {
                    $('.js-example-basic-multiple').select2({width: '100%'});
                    bsCustomFileInput.init();

                })
            </script>
@endsection()
