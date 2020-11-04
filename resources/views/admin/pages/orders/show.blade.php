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
                    @if(isset($data->address->country))
                        {{$data->address->country}}
                    @endif
                    @if(isset($data->address->city))
                            {{$data->address->city}}
                    @endif
                    <strong>{{ $data->user->first_name. ' ' . $data->user->last_name ?? '' }}</strong><br>
                    {{ $data->address->address ?? '' }}, {{ $data->address->apartment ?? '' }}<br>
                    {{ isset($data->address->country) ? $data->address->country  : 'no data' }}, {{ isset($data->address->city) ? $data->address->city : 'no data' }}
                    <br>
                    {{ $data->address->zip_code ?? '' }}<br>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Order ID:</b> {{ $data->id }}<br>
                <b>Account:</b> {{ $data->user->first_name. ' ' . $data->user->last_name ?? '' }}<br>
                {{ $data->user->email ?? '' }}
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
                        <th>Gift</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $total = 0; ?>
                    @php($total_cost = 0)

                    @if(count($data->quiz))
                        @php($box = \App\Box::query()->first())
                        @php($total_cost = 0)
                        @php($cost_box = 0)
                        @foreach($data->quiz as $quiz)
                            @php($cost = json_decode($quiz->costs, true))
                            @php($total_cost += $cost['all_cost_to'])
                            @php($cost_box += $cost['all_cost_to'])
                            <tr>
                                <td>Travel box</td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td>${{ $quiz->price }}</td>
                                <td>${{ $quiz->price }}</td>
                                <td>{{ $quiz->as_gift ? 'Yes' : 'No' }}</td>
                                <td>{{ $quiz->status->name ?? '' }}</td>
                                <td>
                                    @if(count($data->quiz) && $data->status_id <= 5 && $data->status_id != 1)
                                        <a class="btn btn-primary float-right"
                                           href="{{ route('orders.equip', $quiz->id) }}"><i
                                                class="fas fa-download"></i> Equip</a>
                                    @endif
                                </td>
                            </tr>
                            <?php $total += $box->price; ?>
                        @endforeach
                    @endif
                    @foreach($product as $products)
                        @if($products->status_id != 11)
                            <?php $total += $products->price * $products->count; ?>
                        @endif
                        <tr>
                            <td>{{ $products->product->name ?? ''}}</td>
                            <td>{{ $products->size->title ?? '' }}</td>
                            <td>{{ $products->color->name ?? '' }}</td>
                            <td>{{ $products->count }}</td>
                            <td>${{ $products->price ?? ''}}</td>
                            <td>${{ $products->price * $products->count ?? ''}}</td>
                            <td></td>
                            <td>{{ $products->status->name ?? ''}}</td>
                            <td>{{ $products->product->status == 'disable' && $data->status_id == 2? 'Attention this product is disable' : '' }}
                                @if($products->status_id == 10)
                                    <a class="btn btn-primary float-right"
                                       href="{{ route('product.refund', $products->id) }}">Refund</a>
                                @endif
                            </td>
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
                        {{--                        <tr>--}}
                        {{--                            <th style="width:50%">Subtotal:</th>--}}
                        {{--                            <td>${{$total}}</td>--}}
                        {{--                        </tr>--}}
                        @if(count($data->quiz))
                            <tr>
                                <th>Commission:</th>
                                <td>${{$quiz->price * count($data->quiz)}}</td>
                            </tr>
                            <tr>
                                @php($total_cost_prod = 0)
                                @foreach($data->quiz_products()->where('status_id','!=', 11)->get() as $quiz_prod)
                                    @php($total_cost_prod += $quiz_prod->price * $quiz_prod->count)
                                @endforeach
                                @if(count($data->quiz_products()->get()))
                                    @if($data->status_id >= 5)
                                        <th>Box product cost:</th>
                                        <td>${{ $total_cost_prod }}</td>
                                    @endif
                                @endif
                            </tr>
                        @endif
                        <tr>
                            <th>Total:</th>
                            <td>${{$total}}</td>
                        </tr>
                        {{--                        @if($data->status_id >= 6)--}}

                        {{--                            <tr>--}}
                        {{--                                @if(count($data->quiz_products()->get()))--}}
                        {{--                                    @php($total_cost_prod = 0)--}}
                        {{--                                    @foreach($data->quiz_products()->get() as $quiz_prod)--}}
                        {{--                                        @php($total_cost_prod += $quiz_prod->price * $quiz_prod->count)--}}
                        {{--                                    @endforeach--}}
                        {{--                                    <th>Cost to return:</th>--}}
                        {{--                                    <td>${{ abs($total_cost - $total_cost_prod) }}</td>--}}
                        {{--                                @endif--}}
                        {{--                            </tr>--}}
                        {{--                        @endif--}}
                        @if(count($data->quiz()->get()))
                            <tr>
                                <th>Approximate box price:</th>
                                <td>${{$cost_box}}</td>
                            </tr>
                        @endif
                        @if(count($data->quiz()->get()))
                            @if($data->status_id >= 7 && $data->status_id != 9 && $data->status_id != 12)
                                {{ Form::model($data, ['method' => 'POST', 'enctype'=>'multipart/form-data', 'route' => ['orders.payment', $data->id]]) }}

                                <tr>
                                    <th>Withdraw funds</th>
                                    {{--                            <td>${{ $total_cost_prod }}</td>--}}
                                    <td>{{ Form::text('amount', $total_cost_prod, ['class' => 'form-control', 'placeholder' => 'Sum', 'id' => 'sales_quantity']) }}</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <button type="submit" class="btn btn-success "><i
                                                class="far fa-credit-card"></i> Submit
                                            Payment
                                        </button>
                                    </td>
                                </tr>
                                {{ Form::close() }}

                            @endif
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


    </div>
@stop
