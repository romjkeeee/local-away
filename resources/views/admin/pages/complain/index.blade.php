@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Complains</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Complains</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
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
                            <th>Complain types</th>
                            <th>Product</th>
                            <th>Collection</th>
                            <th>Message</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->user->name ?? '' }}</td>
                                <td>
                                    @php($complain_ids = str_split(str_replace(',','', $user->complain_ids)))
                                    @foreach($complain_ids as $complain)
                                        @php($data_complain = \App\ComplainType::query()->where('id',$complain)->first())
                                        <span class="badge badge-primary badge-pill">{{ $data_complain->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $user->product->name ?? '' }}</td>
                                <td>{{ $user->collection->name ?? '' }}</td>
                                <td style="width: 100%">{{ $user->message }}</td>
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

