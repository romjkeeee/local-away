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
            <h3 class="card-title">Home Page Settings</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::model(['method' => 'POST', 'route' => ['web-settings.update']]) }}
                {{ csrf_field() }}
            @foreach($data as $key => $value)
                        <div class="form-group">
                            <label for="{{ $key }}">{{ $key }}</label>
                            <input name="{{ $key }}" type="text" value="{{ $value }}">
                        </div>
                @endforeach
                <x-footer-button route="{{ route('home') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
@stop

