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
            <h3 class="card-title">Edit partnership</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::model($data, ['method' => 'PUT', 'enctype'=>'multipart/form-data', 'route' => ['partnerships.update', $data->id]]) }}
                <div class="form-group">
                    {{ Form::label('First name') }}
                    {{ Form::text('first_name', old('first_name'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Last name') }}
                    {{ Form::text('last_name', old('last_name'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Email') }}
                    {{ Form::text('email', old('email'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Company name') }}
                    {{ Form::text('company_name', old('company_name'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Country') }}
                    {{ Form::text('country', old('country'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Phone') }}
                    {{ Form::text('phone', old('phone'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('status','read') }}<br>
                    {{ Form::radio('status',0, null) }}No <br>
                    {{ Form::radio('status',1, null) }}Yes
                </div>
                <x-footer-button route="{{ route('partnerships.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
@stop
