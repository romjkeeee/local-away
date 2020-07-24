{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <x-card-header title="Contact Form"></x-card-header>

        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="">
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" value="{{ $data->name }}" disabled>
                </div>
                <div class="form-group">
                    <label>email</label>
                    <input class="form-control" value="{{ $data->email }}" disabled>
                </div>
                <div class="form-group">
                    <label>message</label>
                    <textarea class="form-control" disabled>{{ $data->message }}</textarea>
                </div>
            </div>
            <!-- /.card-body -->
            <a href="{{ route('contact-form.index') }}" class="btn btn-default">Back to list</a>

        </form>
    </div>
@stop
