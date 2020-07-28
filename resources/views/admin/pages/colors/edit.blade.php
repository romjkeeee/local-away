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
        <x-card-header title="Edit Body Type"></x-card-header>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::model($data, ['method' => 'PUT', 'enctype'=>'multipart/form-data', 'route' => ['colors.update', $data->id]]) }}
                    <div class="form-group">
                        {{ Form::label('name') }}
                        {{ Form::text('name', old('name'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                    </div>
                <label for="exampleInputImage">Image</label>
                <div class="input-group">
                    <div class="custom-file">
                        {{ Form::label('image', 'Chose file', ['class' => 'custom-file-label']) }}
                        {{ Form::file('image') }}
                    </div>
                </div>
            <div class="form-group">
                        {{ Form::label('status','active') }}<br>
                        {{ Form::radio('status',0, null) }}No <br>
                        {{ Form::radio('status',1, null) }}Yes
            </div>
                <x-footer-button route="{{ route('colors.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
@stop

