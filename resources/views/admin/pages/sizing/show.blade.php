{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <x-card-header title="Show sizing"></x-card-header>

        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="">
            <div class="card-body">
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" value="{{ $data->title }}" disabled>
                </div>
            </div>
            <!-- /.card-body -->
            <a href="{{ route('sizing.index') }}" class="btn btn-default">Back to list</a>

        </form>
    </div>
@stop
