{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <x-card-header title="Show Show Room Product"></x-card-header>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="">
            <div class="card-body">
                <div class="form-group">
                    <label>Collection</label>
                    <input class="form-control" value="{{ $data->collection->name }}" disabled>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <img class="img-fluid" src="{{ asset('storage/'.$data->image) }}" disabled>
                </div>
            </div>
            <!-- /.card-body -->
            <a href="{{ route('show-room-products.index') }}" class="btn btn-default">Back to list</a>
        </form>
    </div>
@stop
