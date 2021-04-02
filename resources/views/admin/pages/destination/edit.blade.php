{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Destination</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Destination</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop
@section('content')
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <x-validation-error errors="{{ $error }}"/>
        @endforeach
    @endif
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Edit Destination</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::model($data, ['method' => 'PUT', 'enctype'=>'multipart/form-data', 'route' => ['destinations.update', $data->id]]) }}
                {{ csrf_field() }}
                <div class="form-group">
                    {{ Form::label('name') }}
                    {{ Form::text('name', old('name'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('City') }}
                    {{ Form::select('city_id',$city, old('city_id'), ['class' => 'form-control', 'placeholder' => 'Choose a city...']) }}
                </div>
                <div class="form-group">
                    <label for="exampleInputImage">Location Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            {{ Form::label('location_image', 'Chose file', ['class' => 'custom-file-label']) }}
                            {{ Form::file('location_image') }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row-cols-3">
                        @if($data->location_image)
                            {{--                            <a href="{{ url('travel-stories/'.$data->id.'/delete') }}"><i--}}
                            {{--                                    class="fas fa-trash"></i></a>--}}
                            <img style="height: 100px" class="img-thumbnail"
                                 src="{{ asset('storage/'.$data->location_image) }}"
                                 disabled>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('status','active') }}<br>
                    {{ Form::radio('status',0, null) }}No <br>
                    {{ Form::radio('status',1, null) }}Yes
                </div>
                <x-footer-button route="{{ route('destinations.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
        @stop
        @section('js')
            <script type="text/javascript">
                $(document).ready(function () { bsCustomFileInput.init(); });
            </script>
@stop
