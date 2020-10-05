{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Show feet</h3>
        </div>        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="">
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" value="{{ $data->name }}" disabled>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Measurement</label>
                    <input class="form-control" value="{{ $data->measurement->name ?? '' }}" disabled>
                </div>
            </div>
            <!-- /.card-body -->
            <a href="{{ route('feets.index') }}" class="btn btn-default">Back to list</a>

        </form>
    </div>
@stop
