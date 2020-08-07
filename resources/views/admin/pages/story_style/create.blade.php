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
            <h3 class="card-title">Create Story Style</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::open(['route' => ['story-styles.store'], 'file' => true, 'method' => 'POST','enctype'=>'multipart/form-data']) }}
                    {{ csrf_field() }}
                <div class="form-group">
                    {{ Form::label('Travel Stories') }}
                    {{ Form::select('travel_stories_id',$travel_stories, old('travel_stories_id'),['class' => 'form-control',  'placeholder' => 'Choose a travel stories...']) }}
                </div>
                <label for="exampleInputImage">Image</label>
                <div class="input-group">
                    <div class="custom-file">
                        {{ Form::label('image', 'Chose file', ['class' => 'custom-file-label']) }}
                        {{ Form::file('image') }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Gender') }}
                    {{ Form::select('gender_id',$gender, old('gender'),['class' => 'form-control',  'placeholder' => 'Choose a gender...']) }}
                </div>
                    <x-footer-button route="{{ route('story-styles.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
        @stop


