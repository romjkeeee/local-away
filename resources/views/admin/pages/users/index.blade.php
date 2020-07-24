@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <x-content-header title="Users"></x-content-header>
@stop

@section('content')
    <x-create-button title="Create user" route="{{ route('users.create') }}"></x-create-button>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>email</th>
                                <th>role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td style="width:100%">{{ $user->email }}</td>
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


