{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Q&A</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Q&A</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop
@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Show Qa</h3>
        </div>
    </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="">
            <div class="card-body">
                <div class="form-group">
                    <label>City</label>
                    <input class="form-control" value="{{ $data->city->name ?? '' }}" disabled>
                </div>
            <div class="form-group">
                <label>Alias</label>
                <input class="form-control" value="{{ $data->alias }}" disabled>
            </div>
            <div class="form-group">
                <label>Location Image</label>
                <img class="img-thumbnail" style="height: 250px" src="{{ asset('storage/'.$data->location_image) }}" disabled>
            </div>
                <div class="form-group">
                    <label>Lead description</label>
                    <textarea class="form-control" disabled>{{ $data->lead_description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Lead Image</label>
                    <img class="img-thumbnail" style="height: 250px" src="{{ asset('storage/'.$data->lead_image) }}" disabled>
                </div>
                <div class="form-group">
                    <label>Lead Lower Image</label>
                    <img class="img-thumbnail" style="height: 250px" src="{{ asset('storage/'.$data->lead_lower_image) }}" disabled>
                </div>
            <!-- /.card-body -->
            <a href="{{ route('qas.index') }}" class="btn btn-default">Back to list</a>
            </div>

        </form>
    </form>
@stop
