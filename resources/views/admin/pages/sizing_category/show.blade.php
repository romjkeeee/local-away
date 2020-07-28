{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Show Sizing category</h3>
        </div>
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
                <label>Image</label>
                <img class="img-fluid" src="{{ asset('storage/'.$data->image) }}" disabled>
            </div>
                <div class="form-group">
                    <label>Gender</label>
                    <input class="form-control" value="{{ $data->gender }}" disabled>
                </div>
            <!-- /.card-body -->
            <a href="{{ route('sizing-categories.index') }}" class="btn btn-default">Back to list</a>
            </div>

        </form>
    </form>
@stop
