@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <x-content-header title="Sizing type"></x-content-header>
@stop

@section('content')
    <x-create-button title="Create Sizing type" route="{{ route('sizing-type.create') }}"></x-create-button>
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
                            <th>sizing category</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td style="width: 100%">{{ $user->title }}</td>
                                <td>{{ $user->sizing_category->title ?? '' }}</td>
                                <x-action-buttons show="{{ route('sizing-type.show',[$user->id]) }}"
                                                  edit="{{ route('sizing-type.edit',[$user->id]) }}"></x-action-buttons>
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


