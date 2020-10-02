@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sizing guide</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Sizing guide</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="primary">
        <p>
            <a href="{{ route('sizing-guides.create') }}" class="btn btn-success btn-lg">Create Sizing guide</a>
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
                            <th>sizing category</th>
                            <th>title</th>
                            <th>text</th>
{{--                            <th>image</th>--}}
                            <th>gender</th>
                            <th>active</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->sizing_category->title ?? '' }}</td>
                                <td>{{ $user->title }}</td>
                                <td style="width: 100%">{{ $user->text }}</td>
{{--                                <td><img class="img-thumbnail" src="{{ asset('storage/'.$user->image) }}"></td>--}}
                                <td>{{ $user->gender }}</td>
                                <x-active-status active="{{ $user->active }}"></x-active-status>
                                <x-action-buttons show="{{ route('sizing-guides.show',[$user->id]) }}"
                                                  edit="{{ route('sizing-guides.edit',[$user->id]) }}"></x-action-buttons>
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

