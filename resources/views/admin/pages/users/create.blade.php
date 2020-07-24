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
        <x-card-header title="Create User"></x-card-header>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::open(['route' => ['users.store'], 'file' => true, 'method' => 'POST','enctype'=>'multipart/form-data']) }}
                {{ csrf_field() }}
                <div class="form-group">
                    {{ Form::label('name') }}
                    {{ Form::text('name', old('name'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email') }}
                    {{ Form::text('email', old('email'), ['class' => 'form-control', 'maxlength' => '190']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'password')}}
                    {{ Form::password('password', ['class' => 'form-control', 'maxlength' => '190']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('role') }}
                    {{ Form::select('role', ['admin' => 'admin', 'user' => 'user'], old('role'), ['class' => 'form-control']) }}
                </div>                <x-footer-button route="{{ route('users.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
        @stop
