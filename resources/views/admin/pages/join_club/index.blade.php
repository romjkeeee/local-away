@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Join Club Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Join Club Form</li>
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
                            <th>form</th>
                            <th>name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>country</th>
                            <th>zip code</th>
                            <th>created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->form }}</td>
                                <td>{{ $user->name }}</td>
                                <td style="width: 100%">{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->country }}</td>
                                <td>{{ $user->zip_code }}</td>
                                <td>{{ $user->created_at }}</td>
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

