@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="primary">
        <p>
            <a href="{{ route('users.create') }}" class="btn btn-success btn-lg">Create User</a>
        </p>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>email</th>
                                <th>Facebook id</th>
{{--                                <th>Avatar</th>--}}
                                <th>role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td style="width:100%">{{ $user->email }}</td>
                                <td>{{ $user->facebook_id }}</td>
{{--                                <td><img class="img-thumbnail" src="{{ asset($user->avatar) }}"></td>--}}
                            @foreach($user->roles as $role)
                                <td>{{ $role->name ?? '' }}</td>
                            @endforeach
                                <x-action-buttons show="{{ route('users.show',[$user->id]) }}" edit="{{ route('users.edit',[$user->id]) }}" id="{{ $user->id }}"></x-action-buttons>
                            </tr>
                        @endforeach

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop


