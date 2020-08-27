{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Show Founder</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="">
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" value="{{ $data->name }}" disabled>
                </div>
                <div class="form-group">
                    <label>Linkedin</label>
                    <input class="form-control" value="{{ $data->linkedin }}" disabled>
                </div>
                <div class="form-group">
                    <label>Facebook</label>
                    <input class="form-control" value="{{ $data->facebook }}" disabled>
                </div>
                <div class="form-group">
                    <label>Twitter</label>
                    <input class="form-control" value="{{ $data->twitter }}" disabled>
                </div>
                <div class="form-group">
                    <label>Photo</label>
                    <img class="img-thumbnail" style="height: 250px" src="{{ asset('storage/'.$data->photo) }}"
                         disabled>
                </div>
                <!-- /.card-body -->
                <a href="{{ route('founders.index') }}" class="btn btn-default">Back to list</a>
            </div>
        </form>
    </div>
@stop
