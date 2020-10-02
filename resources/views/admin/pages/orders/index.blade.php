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
                    <li class="breadcrumb-item active">Orders</li>
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
    <div class="primary">
        <p>
            <a href="{{ route('orders.index') }}" class="btn btn-default btn-sm">ALL ({{ \App\Order::query()->count() }})</a>
            <a href="{{ route('orders.index', ['id' => 1]) }}" class="btn btn-default btn-sm">PENDING_PAYMENT ({{ \App\Order::query()->where('status_id', 1)->count() }})</a>
            <a href="{{ route('orders.index', ['id' => 2]) }}" class="btn btn-default btn-sm">PAYED ({{ \App\Order::query()->where('status_id', 2)->count() }})</a>
            <a href="{{ route('orders.index', ['id' => 3]) }}" class="btn btn-default btn-sm">BOX_LOADING ({{ \App\Order::query()->where('status_id', 3)->count() }})</a>
            <a href="{{ route('orders.index', ['id' => 4]) }}" class="btn btn-default btn-sm">SEND_TO_CUSTOMER ({{ \App\Order::query()->where('status_id', 4)->count() }})</a>
            <a href="{{ route('orders.index', ['id' => 5]) }}" class="btn btn-default btn-sm">DELIVERED ({{ \App\Order::query()->where('status_id', 5)->count() }})</a>
            <a href="{{ route('orders.index', ['id' => 6]) }}" class="btn btn-default btn-sm">PRODUCT_REFUND ({{ \App\Order::query()->where('status_id', 6)->count() }})</a>
            <a href="{{ route('orders.index', ['id' => 7]) }}" class="btn btn-default btn-sm">REFUNDED ({{ \App\Order::query()->where('status_id', 7)->count() }})</a>
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
                            <th>User</th>
                            <th>Sum</th>
                            <th>Tracking number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td style="width: 100%">{{ $user->user->first_name ?? '' .''.$user->user->last_name ?? '' }}</td>
                                <td>${{ $user->sum }}</td>
                                <td>@if($user->tracking_number){{ $user->tracking_number }}<a href="{{ route('orders.edit',[$user->id]) }}"><i class="fas fa-edit"></i></a>@else <a href="{{ route('orders.edit',[$user->id]) }}"><i class="fas fa-plus"></i></a> @endif</td>
                                <td>{{ $user->status->name ?? ''}}</td>
                                <td>
                                <a href="{{ route('orders.show',[$user->id]) }}"><i class="fas fa-eye"></i></a>
                                </td>
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

