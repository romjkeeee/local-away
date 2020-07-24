@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <x-content-header title="Sizing guide"></x-content-header>
@stop

@section('content')
    <x-create-button title="Create Sizing guide" route="{{ route('sizing-guides.create') }}"></x-create-button>
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
                            <th>image</th>
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
                                <x-image-column image="{{ $user->image }}"></x-image-column>
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

