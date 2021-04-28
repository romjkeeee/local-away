@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Destination Story</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Destination Story</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="primary">
        <p>
            <a href="{{ route('destination-stories.create') }}" class="btn btn-success btn-lg">Create Destination Story</a>
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
                            <th>Destination</th>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $destinationStory)
                            <tr>
                                <td>{{ $destinationStory->id }}</td>
                                <td>{{ $destinationStory->destination->name }}</td>
                                <td style="width: 100%">{{ $destinationStory->name }}</td>
                                <td>{{ $destinationStory->url }}</td>
                                <x-active-status active="{{ $destinationStory->status }}"></x-active-status>
                                <x-action-buttons show="{{ route('destination-stories.show',[$destinationStory->id]) }}"
                                                  edit="{{ route('destination-stories.edit',[$destinationStory->id]) }}"></x-action-buttons>
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

