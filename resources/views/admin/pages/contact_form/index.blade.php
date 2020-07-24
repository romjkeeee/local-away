@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <x-content-header title="Contact Form"></x-content-header>
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
                            <th>id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>message</th>
                            <th>read</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td style="width: 100%">{{ $user->message }}</td>
                                <td>@if($user->read)<i class="fas fa fa-check"></i>@else<i class="fas fa fa-times"></i>@endif</td>
                                <x-action-buttons show="{{ route('contact-form.show',[$user->id]) }}"
                                                  edit="{{ route('contact-form.edit',[$user->id]) }}"></x-action-buttons>
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

