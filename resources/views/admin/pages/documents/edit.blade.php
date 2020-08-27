{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <x-validation-error errors="{{ $error }}"></x-validation-error>
        @endforeach
    @endif
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Edit document</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::model($data, ['method' => 'PUT', 'enctype'=>'multipart/form-data', 'route' => ['genders.update', $data->id]]) }}
                <div class="form-group">
                    {{ Form::label('name') }}
                    {{ Form::text('name', old('name'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    <label for="exampleInputImage">File</label>
                    <div class="input-group">
                        <div class="custom-file">
                            {{ Form::label('file', 'Chose file', ['class' => 'custom-file-label']) }}
                            {{ Form::file('file') }}
                        </div>
                    </div>
                </div>
                <x-footer-button route="{{ route('documents.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
@stop

