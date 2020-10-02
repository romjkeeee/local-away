{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Success!</h5>
                {{$error}}
            </div>
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
                @foreach($data as $page)
                    <div class="form-group">
                        <label>{{ $page->title }}</label>
                        <input name="{{ $page->key }}" type="text" value="{{ $page->value }}">
                    </div>
                @endforeach
                <x-footer-button route="{{ route('home') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
@stop

