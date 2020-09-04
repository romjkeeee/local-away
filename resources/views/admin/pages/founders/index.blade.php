@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Founders</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Founders</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="primary">
        <p>
            <a href="{{ route('founders.create') }}" class="btn btn-success btn-lg">Create Founder</a>
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
                            <th>Name</th>
                            <th>Linkedin</th>
                            <th>Facebook</th>
                            <th>Twitter</th>
                            <th>Photo</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td style="width: 100%">{{ $user->name }}</td>
                                <td>{{ $user->linkedin }}</td>
                                <td>{{ $user->facebook }}</td>
                                <td>{{ $user->twitter }}</td>
                                <td><img class="img-thumbnail" src="{{ asset('storage/'.$user->photo) }}"></td>
                                <td style="text-align: center">@if($user->status == 'active')<i class="fas fa-toggle-on fa-2x"></i>@else<i class="fa fa-toggle-off fa-2x"></i>@endif</td>
                                <x-action-buttons show="{{ route('founders.show',[$user->id]) }}"
                                                  edit="{{ route('founders.edit',[$user->id]) }}"></x-action-buttons>
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

