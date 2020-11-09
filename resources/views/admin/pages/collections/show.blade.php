{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <x-card-header title="Show Collection Show Room"></x-card-header>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="">
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" value="{{ $data->name }}" disabled>
                </div>
                <div class="form-group">
                    <label>Alias</label>
                    <input class="form-control" value="{{ $data->alias }}" disabled>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <img class="img-fluid" src="{{ asset('storage/'.$data->image) }}" disabled>
                </div>
                <div class="form-group">
                    <label>Pack for</label>
                    <input class="form-control" value="{{ $data->pack_for }}" disabled>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" value="{{ $data->title }}" disabled>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" disabled>{{ $data->description }}</textarea>
                </div>
{{--                <div class="form-group">--}}
{{--                    {{ Form::label('product') }}<br>--}}
{{--                    @foreach($data->products as $product)--}}
{{--                        <span class="badge badge-primary badge-pill">{{ $product->name ?? '' }}</span>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
                <div class="form-group">
                    <label>Gender</label>
                    <input class="form-control" value="{{ $data->gender->title ?? '' }}" disabled>
                </div>
            </div>
            <!-- /.card-body -->
            <a href="{{ route('collections.index') }}" class="btn btn-default">Back to list</a>
        </form>
    </div>
@stop
