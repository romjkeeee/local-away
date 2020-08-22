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
                    {{ $data->address->address ?? '' }}<br>
                    {{ $data->address->state ?? '' }},{{ $data->address->city ?? '' }}, {{ $data->address->zip_code ?? '' }}<br>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Invoice #007612</b><br>
                <br>
                <b>Order ID:</b> 4F3S8J<br>
                <b>Payment Due:</b> 2/22/2014<br>
                <b>Account:</b> 968-34567
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
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Serial #</th>
                        <th>Description</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Travel box</td>
                        <td>455-981-221</td>
                        <td></td>
                        <td>$50.00</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Ochki</td>
                        <td>247-925-726</td>
                        <td>krutiye ochki</td>
                        <td>$150.00</td>
                    </tr>
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
                <p class="lead">Amount Due 2/22/2014</p>

                <div class="table-responsive">
                    <table class="table">
                        <tbody><tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>$200.00</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>$200.00</td>
                        </tr>
                        </tbody></table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
                @if($data->quiz)
                    <a class="btn btn-primary float-right" href="{{ route('orders.equip', $data->id) }}"><i class="fas fa-download"></i> Equip</a>
                @endif
            </div>
        </div>
    </div>
@stop
