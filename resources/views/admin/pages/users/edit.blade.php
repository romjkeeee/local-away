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
            <h3 class="card-title">Edit user</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::model($user, ['method' => 'PUT', 'route' => ['users.update', $user->id]]) }}
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                <div class="form-group">
                    {{ Form::label('first_name') }}
                    {{ Form::text('first_name', old('name'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('last_name') }}
                    {{ Form::text('last_name', old('last_name'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
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
                </div>
                <x-footer-button route="{{ route('users.index') }}"></x-footer-button>
                {{ Form::close() }}
                </form>
            </div>
        </div>
        @stop

