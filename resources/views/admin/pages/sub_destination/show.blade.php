{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sub Destination</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Sub Destination</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop
@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Show Sub Destination</h3>
        </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="panel panel-default">
        <form role="form" action="">
            <div class="card-body">
                <div class="form-group">
                    <label>Destination Story</label>
                    <input class="form-control" value="{{ $data->destinationStory->name ?? '' }}" disabled>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" value="{{ $data->name }}" disabled>
                </div>
                <div class="form-group">
                    <label>Api City</label>
                    <input class="form-control" value="{{ $data->api_city }}" disabled>
                </div>
                <div class="form-group">
                    <label>Url</label>
                    <input class="form-control" value="{{ $data->url }}" disabled>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <img class="img-thumbnail" style="height: 250px" src="{{ asset('storage/'.$data->image) }}"
                         disabled>
                </div>
                <!-- /.card-body -->
                <a href="{{ route('sub-destinations.index') }}" class="btn btn-default">Back to list</a>
            </div>
        </form>
    </div>
    </div>
@stop
