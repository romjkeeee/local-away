{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Orders</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Orders</a></li>
                    <li class="breadcrumb-item active">Orders Show</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop
@section('content')
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-globe"></i> LocalAway, Inc.
                    <small class="float-right">Date: {{ $data->created_at }}</small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong>{{ $data->user->first_name. ' ' . $data->user->last_name ?? '' }}</strong><br>
                    {{ $data->address->address ?? '' }}, {{ $data->address->apartment ?? '' }}<br>
                    {{\App\Country::query()->where('id',$data->address->country)->first()->name  ?? '' }},{{ $data->address->state ?? '' }},{{ \App\City::query()->where('id',$data->address->city)->first()->name ?? '' }}<br>
                    {{ $data->address->zip_code ?? '' }}<br>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Order ID:</b> {{ $data->id }}<br>
                <b>Account:</b> {{ $data->user->first_name. ' ' . $data->user->last_name ?? '' }}
            </div>
            @if($data->status->name == 'PAYED')
                <div class="col-sm-4 invoice-col">
                    <img class="img-lg" src="{{ asset('img/paid.png') }}">
                </div>
        @endif
        <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Count</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $total = 0; ?>
                    @if(count($data->quiz))
                        @php($box = \App\Box::query()->first())
                        @foreach($data->quiz as $quiz)
                        <tr>
                            <td>Travel box</td>
                            <td></td>
                            <td></td>
                            <td>1</td>
                            <td>${{ $box->price }}</td>
                            <td>${{ $box->price }}</td>
                            <td>{{ $quiz->status->name ?? '' }}</td>
                            <td>
                            @if(count($data->quiz) && $data->status_id < 4 && $data->status_id != 1)
                                <a class="btn btn-primary float-right" href="{{ route('orders.equip', $quiz->id) }}"><i
                                        class="fas fa-download"></i> Equip</a>
                            @endif
                            </td>
                        </tr>
                        <?php $total += $box->price; ?>
                        @endforeach
                    @endif
                    @foreach($product as $products)

                        <?php $total += $products->price * $products->count; ?>

                        <tr>
                            <td>{{ $products->product->name ?? ''}}</td>
                            <td>{{ $products->size->title ?? '' }}</td>
                            <td>{{ $products->color->name ?? '' }}</td>
                            <td>{{ $products->count }}</td>
                            <td>${{ $products->price ?? ''}}</td>
                            <td>${{ $products->price * $products->count ?? ''}}</td>
                            <td>{{ $products->status->name ?? ''}}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
            </div>
            <!-- /.col -->
            <div class="col-6">

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>${{$total}}</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>${{$total}}</td>
                        </tr>
                        <tr>
                            <th>Sum from customer:</th>
                            <td>${{$data->sum}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


    </div>
@stop
