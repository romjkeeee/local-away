{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Order product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Orders</a></li>
                    <li class="breadcrumb-item active">Orders product edit</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop
@section('content')
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <x-validation-error errors="{{ $error }}"></x-validation-error>
        @endforeach
    @endif
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Edit Order Product</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::model($data, ['method' => 'PUT', 'enctype'=>'multipart/form-data', 'route' => ['order-products.update', $data->id]]) }}
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none">{{ $data->product->name }}</h3>
                        <div class="col-12">
@php($img = $data->product->getMedia('images')->where('model_id',$data->product->id)->where('model_type','App\Product')->first())
                            <img src="{{ $img ? $img->getFullUrl() : ''}}" class="product-image" alt="Product Image">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{ $data->product->name }}</h3>
                        {{--                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>--}}

                        <hr>
                        <h4>Colors</h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <div class="form-group">
                                <div class="form-check">
                                    {{ Form::select('color_id', $colors, $data->color_id,['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-3">Size <small>Please select one</small></h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <div class="form-group">
                                <div class="form-check">
                                    {{ Form::select('size_id', $sizes, $data->size_id,['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-3">Count</h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <div class="form-group">
                                <div class="form-check">
                                    <div class="form-group">
                                        {{Form::text('count', old('count'), ['class' => 'form-control', 'placeholder' => 'Quantity', 'id' => 'sales_quantity'])}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 class="mt-3">Price</h4>
                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                ${{ $data->product->price ?? 'NOT FOUND' }}
                                {{Form::hidden('price', $data->product->price, ['class' => 'form-control', 'placeholder' => ''])}}
                            </h2>
                            {{--                            <h4 class="mt-0">--}}
                            {{--                                <small>Ex Tax: $80.00 </small>--}}
                            {{--                            </h4>--}}
                        </div>

                        <x-footer-button route="{{ route('orders.equip', $data->order_quiz_id) }}"></x-footer-button>

                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
@stop

