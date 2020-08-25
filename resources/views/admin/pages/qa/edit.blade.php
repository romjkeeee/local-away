{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Q&A</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Q&A</li>
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
            <h3 class="card-title">Edit q&a</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::model($data, ['method' => 'PUT', 'enctype'=>'multipart/form-data', 'route' => ['qas.update', $data->id]]) }}
                {{ csrf_field() }}
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
                    {{ Form::label('Lead Description') }}
                    {{ Form::textarea('lead_description', old('lead_description'),['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    <label for="exampleInputImage">Lead Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            {{ Form::label('Lead Image', 'Chose file', ['class' => 'custom-file-1']) }}
                            {{ Form::file('lead_image') }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputImage">Lead Lower Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            {{ Form::label('Lead Lower Image', 'Chose file', ['class' => 'custom-file-1']) }}
                            {{ Form::file('lead_lower_image') }}
                        </div>
                    </div>
                </div>
                <x-footer-button route="{{ route('qas.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
        @stop
        @section('js')
            <script type="text/javascript">
                $(document).ready(function () { bsCustomFileInput.init(); });
            </script>
@stop
