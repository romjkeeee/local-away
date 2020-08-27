{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Show Document</h3>
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
                    <label>File</label><br>
                    <a href="{{ asset('storage/'.$data->file) }}"><i class="fas fa-eye"></i></a>
                </div>
            </div>
            <!-- /.card-body -->
            <a href="{{ route('documents.index') }}" class="btn btn-default">Back to list</a>
        </form>
    </div>
@stop
