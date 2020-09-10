@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Preference</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">User Preference</li>
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
                            <th>measurement</th>
                            <th>height</th>
                            <th>feet</th>
                            <th>age range</th>
                            <th>body type</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->user->first_name . $user->user->first_name ?? '' }}</td>
                                @foreach($preference['measurement'] as $data)
                                    @if($data['id'] == $user->measurement)
                                        <td style="width: 100%">{{ $data['name'] }}</td>
                                    @endif
                                @endforeach
                                <td>{{ $user->height }}</td>
                                @foreach($preference['feet'] as $data)
                                    @if($data['id'] == $user->feet)
                                        <td style="width: 100%">{{ $data['name'] }}</td>
                                    @endif
                                @endforeach
                                @foreach($preference['age'] as $data)
                                    @if($data['id'] == $user->age)
                                        <td style="width: 100%">{{ $data['name'] }}</td>
                                    @endif
                                @endforeach
                                <td>{{ $user->bodyType->title ?? '' }}</td>
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

