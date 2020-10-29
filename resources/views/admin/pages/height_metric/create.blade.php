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
            <h3 class="card-title">Create Height Metrics</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::open(['route' => ['height-metrics.store'], 'file' => true, 'method' => 'POST','enctype'=>'multipart/form-data']) }}
                {{ csrf_field() }}
                <div class="form-group">
                    {{ Form::label('name') }}
                    {{ Form::text('name', old('name'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('height') }}
                    {{ Form::select('height_id',$heights, old('height_id'), ['class' => 'form-control', 'placeholder' => 'Choose a height...']) }}
                </div>
                <x-footer-button route="{{ route('height-metrics.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
@stop
