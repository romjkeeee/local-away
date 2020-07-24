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
        <x-card-header title="Edit sizing type"></x-card-header>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::model($data, ['method' => 'PUT', 'enctype'=>'multipart/form-data', 'route' => ['sizing-type.update', $data->id]]) }}
                <div class="form-group">
                    {{ Form::label('Sizing category') }}<br>
                    {{ Form::select('sizing_category_id',$sizing_category, old('sizing_category_id'),['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('title') }}
                    {{ Form::text('title', old('title'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <x-footer-button route="{{ route('sizing-type.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
        @stop
