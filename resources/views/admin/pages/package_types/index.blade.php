@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <x-content-header title="Package type"></x-content-header>
@stop
@section('content')
    <x-create-button title="Create package type" route="{{ route('package-types.create') }}"></x-create-button>
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
                            <th>active</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($packageType as $data)
                            <tr>
                                <td >{{ $data->id }}</td>
                                <td style="width: 100%">{{ $data->title }}</td>
                                <x-image-column image="{{ $data->image }}"></x-image-column>
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
