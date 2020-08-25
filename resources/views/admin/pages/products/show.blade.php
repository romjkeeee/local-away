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
                    <label>Gender</label>
                    <input class="form-control" value="{{ $data->gender->title ?? '' }}" disabled>
                </div>
                <div class="form-group">
                    <label>Boutique</label>
                    <input class="form-control" value="{{ $data->boutique->name ?? '' }}" disabled>
                </div>
                <div class="form-group">
                    <label>Sizes</label>
                    @foreach($data->sizes as $size)
                        <span class="badge badge-primary badge-pill">{{ $size->title ?? '' }}</span>
                    @endforeach
                </div>
                <div class="form-group">
                    <label>Colors</label>
                    @foreach($data->colors as $color)
                        <div class="form-group">
                        <div class="row-cols-3">
                        <span class="badge badge-primary badge-pill">{{ $color->name ?? ''}}</span><br>
                        @foreach($data->colorImage()->where('color_id',$color->id)->get() as $image)
                            <img style="height: 100px" class="img-thumbnail"
                                 src="{{ $data->getMedia('images')->where('id',$image->media_id)->first()->getFullUrl()  }}"
                                 disabled>
                        @endforeach
                    @endforeach
                </div>
                </div>
                </div>
            </div>
            <!-- /.card-body -->
            <a href="{{ route('products.index') }}" class="btn btn-default">Back to list</a>
        </form>
    </div>
@stop
