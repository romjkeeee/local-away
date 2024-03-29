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
{{--                            <th>Sizing</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->user->first_name . ' ' . $user->user->last_name ?? '' }}</td>
                                @php($measurement = false)
                                @foreach($preference['measurement'] as $data)
                                    @if($data['id'] == $user->measurement)
                                        @php($measurement = true)
                                        <td style="width: 100%">{{ $data['name'] }}</td>
                                    @endif
                                @endforeach
                                @if(!$measurement)
                                    <td></td>
                                @endif
                                @if(isset($user->height))
                                    <td>
                                        @foreach($user->height as $key => $value)
                                            {{ $key }} - {{ $value }}<br>
                                        @endforeach
                                    </td>
                                @else
                                    <td></td>
                                @endif
                                @php($feet = false)
                                @foreach($preference['feet'] as $data)
                                    @if($data['id'] == $user->feet)
                                        @php($feet = true)
                                        <td style="width: 100%">{{ $data['name'] ?? 'NO DATA'}}</td>
                                    @endif
                                @endforeach
                                @if(!$feet)
                                    <td></td>
                                @endif
                                @php($age = false)
                                @foreach($preference['age'] as $data)
                                    @if($data['id'] == $user->age)
                                        @php($age = true)
                                        <td style="width: 100%">{{ $data['name'] ?? 'NO DATA' }}</td>
                                    @endif
                                @endforeach
                                @if(!$age)
                                    <td></td>
                                @endif
                                <td>{{ $user->bodyType->title ?? 'NO DATA' }}</td>
                                {{--                                <td><a href="{{ route('user-settings.show',$user->id) }}"><i class="fas fa-eye"></i></a>--}}
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

