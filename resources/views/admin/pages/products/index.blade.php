@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Products</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="primary">
        <p>
            <a href="{{ route('products.create') }}" class="btn btn-success btn-lg">Create Products</a>
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
                            <th>Name</th>
                            <th>Alias</th>
                            <th>Category</th>
                            <th>Sizes</th>
                            <th>Colors</th>
                            <th>images</th>
                            <th>price</th>
                            <th>Boutique</th>
                            <th>Gender</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $user)

                            <tr>
                                <td>{{ $user->id }}</td>
                                <td style="width: 100%">{{ $user->name }}</td>
                                <td>{{ $user->alias }}</td>
                                <td>{{ $user->category->name ?? '' }}</td>
                                <td>
                                    @foreach($user->sizes as $sizes)
                                        {{ $sizes->title ?? '' }},
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($user->colors as $colors)
                                        {{ $colors->name ?? '' }},
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ url('admin/product/'.$user->id.'/images') }}">{{ count($user->getMedia('images')) }}</a>
                                </td>
                                <td>${{ $user->price }}</td>
                                <td>{{ $user->boutique->name ?? '' }}</td>
                                <td>{{ $user->gender->title ?? '' }}</td>
                                <td style="text-align: center">@if($user->status == 'active')<i class="fas fa-toggle-on fa-2x"></i>@else<i class="fa fa-toggle-off fa-2x"></i>@endif</td>
                                <x-action-buttons show="{{ route('products.show',[$user->id]) }}"
                                                  edit="{{ route('products.edit',[$user->id]) }}"></x-action-buttons>
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

