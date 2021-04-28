{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Destination Story</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Destination Story</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop
@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Show Destination Story</h3>
        </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="panel panel-default">
        <form role="form" action="">
            <div class="card-body">
                <div class="form-group">
                    <label>Destination</label>
                    <input class="form-control" value="{{ $data->destination->name ?? '' }}" disabled>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" value="{{ $data->name }}" disabled>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" disabled>{{ $data->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>URL</label>
                    <input class="form-control" value="{{ $data->url }}" disabled>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <img class="img-thumbnail" style="height: 250px" src="{{ asset('storage/'.$data->image) }}"
                         disabled>
                </div>
                <!-- /.card-body -->
                <a href="{{ route('destination-stories.index') }}" class="btn btn-default">Back to list</a>
            </div>
        </form>
    </div>
    </div>
@stop
