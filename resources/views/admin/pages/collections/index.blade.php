@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Show Room</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Show Room</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="primary">
        <p>
            <a href="{{ route('collections.create') }}" class="btn btn-success btn-lg">Create Collection</a>
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
                            <th>name</th>
                            <th>alias</th>
{{--                            <th>image</th>--}}
{{--                            <th>products</th>--}}
                            <th>gender</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td style="width: 100%">{{ $user->name }}</td>
                                <td>{{ $user->alias }}</td>
{{--                                <td><img class="img-thumbnail" src="{{ asset('storage/'.$user->image) }}"></td>--}}
{{--                                <td>--}}
{{--                                    @foreach($user->products as $product)--}}
{{--                                        {{ $product->name }},--}}
{{--                                    @endforeach--}}
{{--                                </td>--}}
                                <td>{{ $user->gender->title ?? '' }}</td>
                                <x-active-status active="{{ $user->active }}"></x-active-status>
                                <x-action-buttons show="{{ route('collections.show',[$user->id]) }}"
                                                  edit="{{ route('collections.edit',[$user->id]) }}"></x-action-buttons>
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

