{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Show cost</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="">
            <div class="card-body">
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" value="{{ $data->title }}" disabled>
                </div>
                <div class="form-group">
                    <label>Cost from</label>
                    <input class="form-control" value="{{ $data->cost_from }}" disabled>
                </div>
                <div class="form-group">
                    <label>Cost To</label>
                    <input class="form-control" value="{{ $data->cost_to }}" disabled>
                </div>
            </div>
            <!-- /.card-body -->
            <a href="{{ route('costs.index') }}" class="btn btn-default">Back to list</a>

        </form>
    </div>
@stop
