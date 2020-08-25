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
                    <li class="breadcrumb-item"><a href="{{ route('orders.show', $data->id) }}">Orders Show</a></li>
                    <li class="breadcrumb-item active">Orders Equip</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    @if($data->quiz)
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quiz Settings</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="inputName">Package type</label>
                    <input type="text" id="inputName" class="form-control" value="AdminLTE">
                </div>
                <div class="form-group">
                    <label for="inputName">Travel purposes</label>
                    <input type="text" id="inputName" class="form-control" value="AdminLTE">
                </div>
                <div class="form-group">
                    <label for="inputName">Personal style</label>
                    <input type="text" id="inputName" class="form-control" value="AdminLTE">
                </div>
                <div class="form-group">
                    <label for="inputName">Styled</label>
                    <input type="text" id="inputName" class="form-control" value="AdminLTE">
                </div>
                <div class="form-group">
                    <label for="inputName">Preferences</label>
                    <input type="text" id="inputName" class="form-control" value="AdminLTE">
                </div>
                <div class="form-group">
                    <label for="inputName">Sizing info</label>
                    <input type="text" id="inputName" class="form-control" value="AdminLTE">
                </div>
                <div class="form-group">
                    <label for="inputName">Costs</label>
                    <input type="text" id="inputName" class="form-control" value="AdminLTE">
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    @endif
    <div class="col-md-6">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Add products</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                {{ Form::open(['route' => ['orders.equip.store', $data->id], 'file' => true, 'method' => 'POST','enctype'=>'multipart/form-data']) }}
                {{ csrf_field() }}
                <div class="form-group">
                    {{ Form::label('Products') }}<br>
                    {{ Form::select('product_ids[]',$products, old('product_ids'), ['class' => 'js-example-basic-multiple',  'multiple'=>true]) }}
                </div>
                <x-footer-button route="{{ route('orders.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Products</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Count</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data->order_products as $products)
                    <tr>
                        <td>{{ $products->product->name }}</td>
                        <td>{{ $products->size->title ?? '' }}</td>
                        <td>{{ $products->color->name ?? '' }}</td>
                        <td>{{ $products->count }}</td>
                        <td>${{ $products->price }}</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('order-products.edit', $products->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
{{--                                <a href="{{ route('order-products.destroy', $products->id, ['method' => 'DELETE']) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>--}}
                                {{ Form::open(['method' => 'DELETE', 'route' => ['order-products.destroy', $products->id]]) }}
                                {{ Form::button('<i class="fas fa-trash"></i>',
                                    ['class' => 'btn btn-danger', 'type' => 'submit'] )  }}
                                {{ Form::close() }}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@stop
@section('js')
    <script type="text/javascript">

        $(document).ready(function () {
            $('.js-example-basic-multiple').select2({ width: '100%' });
            bsCustomFileInput.init();

        })

    </script>

@endsection()
