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
            <h3 class="card-title">Edit Order</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::model($data, ['method' => 'PUT', 'enctype'=>'multipart/form-data', 'route' => ['orders.update', $data->id]]) }}
                    <div class="form-group">
                        {{ Form::label('tracking_number') }}
                        {{ Form::text('tracking_number', old('tracking_number'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                    </div>
                <x-footer-button route="{{ route('orders.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
@stop

