@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Package type</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Package type</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop
@section('content')
    <div class="primary">
        <p>
            <a href="{{ route('package-types.create') }}" class="btn btn-success btn-lg">Create package type</a>
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
                            <th>title</th>
                            <th>image</th>
                            <th>gender</th>
                            <th>active</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($package_types as $data)
                            <tr>
                                <td >{{ $data->id }}</td>
                                <td style="width: 100%">{{ $data->title }}</td>
                                <td><img class="img-thumbnail" src="{{ asset('storage/'.$data->image) }}"></td>
                                <td>{{ $data->gender->title ?? '' }}</td>
                                <x-active-status active="{{ $data->active }}"></x-active-status>
                                <x-action-buttons show="{{ route('package-types.show',[$data->id]) }}" edit="{{ route('package-types.edit',[$data->id]) }}"></x-action-buttons>
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
