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
                    <label>Travel story</label>
                    <input class="form-control" value="{{ $data->travelStory->name ?? '' }}" disabled>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <img class="img-fluid" src="{{ asset('storage/'.$data->image) }}" disabled>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <input class="form-control" value="{{ $data->gender->title ?? '' }}" disabled>
                </div>
            </div>
            <!-- /.card-body -->
            <a href="{{ route('story-styles.index') }}" class="btn btn-default">Back to list</a>

        </form>
    </div>
@stop
