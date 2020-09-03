@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Address</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">User Address</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>User</th>
                            <th>Address</th>
                            <th>Zip Code</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Apartment</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->user->first_name ?? '' }}</td>
                                <td style="width: 100%">{{ $user->address }}</td>
                                <td>{{ $user->zip_code }}</td>
                                <td>{{ $user->city }}</td>
                                <td>{{ $user->state }}</td>
                                <td>{{ $user->country }}</td>
                                <td>{{ $user->apartment }}</td>
                                <td>{{ $user->status }}</td>
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

