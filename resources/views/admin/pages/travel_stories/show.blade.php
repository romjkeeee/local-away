{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <x-card-header title="Create Body Type"></x-card-header>
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
                    <label>Preview image</label>
                    <img class="img-fluid" src="{{ asset('storage/'.$data->preview_image) }}" disabled>
                </div>
                <div class="form-group">
                    <label>Full image</label>
                    <img class="img-fluid" src="{{ asset('storage/'.$data->full_image_path) }}" disabled>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" placeholder="{{ $data->description }}" disabled=""></textarea>
                </div>
                <div class="form-group">
                    <label>Products</label>
                    <input class="form-control" value="{{ $data->product_ids }}" disabled>
                </div>
                <div class="form-group">
                    <label>Home page</label><br>
                    <td style="text-align: center">@if($data->is_to_homepage)<i class="fas fa-toggle-on fa-2x"></i>@else<i class="fa fa-toggle-off fa-2x"></i>@endif</td>

                </div>
            </div>
            <!-- /.card-body -->
            <a href="{{ route('travel-stories.index') }}" class="btn btn-default">Back to list</a>
        </form>
    </div>
@stop
