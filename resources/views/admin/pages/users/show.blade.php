{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Users</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="">
            <div class="card-body">
                <div class="form-group">
                    <label>First Name</label>
                    <input class="form-control" value="{{ $user->first_name }}" disabled>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input class="form-control" value="{{ $user->last_name }}" disabled>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" value="{{ $user->email }}" disabled>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    @foreach($user->roles as $role)
                        <input class="form-control" value="{{ $role->name ?? '' }}" disabled>
                    @endforeach
                </div>
            </div>
            <!-- /.card-body -->
            <a href="{{ route('users.index') }}" class="btn btn-default">Back to list</a>

        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
