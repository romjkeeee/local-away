{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <x-validation-error errors="{{ $error }}"/>
        @endforeach
    @endif
    <div class="card card-secondary">
        <x-card-header title="Create Sizing type"></x-card-header>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::open(['route' => ['sizing-type.store'], 'file' => true, 'method' => 'POST','enctype'=>'multipart/form-data']) }}
                {{ csrf_field() }}
                <x-title-input-create/>
                <x-sizing-category-select-store/>
                <x-footer-button route="{{ route('sizing-type.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
        @stop
