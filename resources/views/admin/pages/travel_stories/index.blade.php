@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Travel Stories</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Travel Stories</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="primary">
        <p>
            <a href="{{ route('travel-stories.create') }}" class="btn btn-success btn-lg">Create Travel Stories</a>
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
                            <th>preview image</th>
                            <th>full image</th>
                            <th>description</th>
                            <th>products</th>
{{--                            <th>Gender image</th>--}}
                            <th>is homepage</th>
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
                                <td><img class="img-thumbnail" src="{{ asset('storage/'.$user->preview_image) }}"></td>
                                <td><img class="img-thumbnail" src="{{ asset('storage/'.$user->full_image_path) }}"></td>
                                <td>{{ $user->description }}</td>
                                <td>
                                    @php($products_ids = str_split(str_replace(',','', $user->product_ids)))
                                    @foreach($products_ids as $product)
                                        @php($data_products = \App\Product::query()->where('id',$product)->first())
                                        {{ $data_products->name ?? 'NO NAME' }},
                                    @endforeach
                                </td>
{{--                                <td>--}}
{{--                                    <a href="{{ url('admin/travel-stories/'.$user->id.'/step2') }}">{{ count($user->travel_story_image_gender) }}</a>--}}
{{--                                </td>--}}
                                <x-active-status active="{{ $user->is_to_homepage }}"></x-active-status>
                                <x-active-status active="{{ $user->active }}"></x-active-status>
                                <x-action-buttons show="{{ route('travel-stories.show',[$user->id]) }}"
                                                  edit="{{ route('travel-stories.edit',[$user->id]) }}"></x-action-buttons>
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

