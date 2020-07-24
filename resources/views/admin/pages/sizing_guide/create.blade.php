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
        <x-card-header title="Create Sizing Guide"></x-card-header>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::open(['route' => ['sizing-guides.store'], 'file' => true, 'method' => 'POST','enctype'=>'multipart/form-data']) }}
                 {{ csrf_field() }}
                    <x-title-input-create/>
                    <x-image-input-create/>
                    <x-gender-input-create/>
                    <x-text-area-input-store/>
                    <x-sizing-category-select-store/>
                    <x-footer-button route="{{ route('sizing-guides.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
        @stop
