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
        <x-card-header title="Create Travel purpose"></x-card-header>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::open(['route' => ['costs.store'], 'file' => true, 'method' => 'POST','enctype'=>'multipart/form-data']) }}
                {{ csrf_field() }}
                <x-title-input-create></x-title-input-create>
                <div class="form-group">
                    {{ Form::label('cost_from') }}
                    {{ Form::text('cost_from', old('cost_from'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('cost_to') }}
                    {{ Form::text('cost_to', old('cost_to'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <x-footer-button route="{{ route('costs.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
        @stop
