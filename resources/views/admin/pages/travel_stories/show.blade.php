{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <x-card-header title="Show travel stories"></x-card-header>
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
                    <img style="height: 100px" class="img-thumbnail" src="{{ asset('storage/'.$data->preview_image) }}"
                         disabled>
                </div>
                <div class="form-group">
                    <label>Full image</label>
                    <img style="height: 100px" class="img-thumbnail"
                         src="{{ asset('storage/'.$data->full_image_path) }}" disabled>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" placeholder="{{ $data->description }}"
                              disabled=""></textarea>
                </div>
                <div class="form-group">
                    <label>Products</label>
                    @if($data->product_ids)
                        @php($products_ids = explode(",",$data->product_ids))
                        @foreach($products_ids as $product)
                            @php($data_products = \App\Product::query()->where('id',$product)->first())
                            <span class="badge badge-primary badge-pill">{{ $data_products->name ?? 'NO NAME' }}</span>
                        @endforeach
                        <br>
                        @foreach($products_ids as $product)
                            @php($data_products = \App\Product::query()->where('id',$product)->first())
                        @if(count($data_products->getMedia('images')))
                            <div class="col-md-2">
                                    <img alt="travel" style="height: 100px" class="img-thumbnail"
                                         src="{{ $data_products->getMedia('images')->first()->getFullUrl()  }}"
                                         disabled>
                                    <div class="col-sm-6">
                                        <p class="" style="width: 10ch;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">{{ $data_products->name }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label>Home page</label><br>
                    <td style="text-align: center">@if($data->is_to_homepage)<i class="fas fa-toggle-on fa-2x"></i>@else
                            <i class="fa fa-toggle-off fa-2x"></i>@endif</td>

                </div>
            </div>
            <!-- /.card-body -->
            <a href="{{ route('travel-stories.index') }}" class="btn btn-default">Back to list</a>
        </form>
    </div>
@stop
