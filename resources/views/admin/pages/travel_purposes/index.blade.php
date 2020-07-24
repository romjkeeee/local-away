@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <x-content-header title="Travel purpose"></x-content-header>
@stop

@section('content')
    <x-create-button title="Create travel purposes" route="{{ route('travel-purposes.create') }}"></x-create-button>
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
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td style="width: 100%">{{ $user->title }}</td>
                                <x-image-column image="{{ $user->image }}"></x-image-column>
                                <x-active-status active="{{ $user->active }}"></x-active-status>
                                <x-action-buttons show="{{ route('travel-purposes.show',[$user->id]) }}"
                                                  edit="{{ route('travel-purposes.edit',[$user->id]) }}"></x-action-buttons>
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

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@stop

