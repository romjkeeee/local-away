{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Sizing</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="">
            <div class="card-body">
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" value="{{ $user->title }}" disabled>
                </div>
            </div>
            <!-- /.card-body -->
            <a href="{{ route('sizing.index') }}" class="btn btn-default">Back to list</a>

        </form>
    </div>
@stop
