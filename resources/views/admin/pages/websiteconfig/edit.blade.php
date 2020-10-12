{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <x-validation-error errors="{{ $error }}"></x-validation-error>
        @endforeach
    @endif
    @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Success!</h5>
            {{Session::get('success')}}
        </div>
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
                        @if($page->key == 'home_page_title')
                            <input class="form-control" name="{{ $page->key }}" type="text" value="{{ $page->value }}">
                        @else
                            <textarea class="form-control" name="{{ $page->key }}" id="">{{ $page->value }}</textarea>
                        @endif
                    </div>
                @endforeach
                <x-footer-button route="{{ route('home') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
@stop

