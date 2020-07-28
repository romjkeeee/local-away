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
        <x-card-header title="Create styled"></x-card-header>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::open(['route' => ['styled.store'], 'file' => true, 'method' => 'POST','enctype'=>'multipart/form-data']) }}
                {{ csrf_field() }}
                <div class="form-group">
                    {{ Form::label('title') }}
                    {{ Form::text('title', old('title'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    <label for="exampleInputImage">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            {{ Form::label('image', 'Chose file', ['class' => 'custom-file-label']) }}
                            {{ Form::file('image') }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('gender') }}
                    {{ Form::select('gender',['male' => 'male', 'female' => 'female'], old('gender'), ['class' => 'form-control', 'placeholder' => 'Choose a gender...']) }}
                </div>
                <x-footer-button route="{{ route('styled.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
@stop
