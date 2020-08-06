{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <x-validation-error errors="{{ $error }}"></x-validation-error>
        @endforeach
    @endif
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Create product step 2</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::open(['url' => 'admin/product/'.$product->id.'/step2', 'file' => true, 'method' => 'POST','enctype'=>'multipart/form-data']) }}
                {{ csrf_field() }}
                @foreach($product->colors as $color)
                <div class="form-group">
                    <label for="exampleInputImage">Chose Image for {{ $color->name }} color</label>
                    <div class="input-group">
                        <div class="custom-file">
                            {{ Form::label('images_'.$color->id.'[]', 'Chose file', ['class' => 'custom-file-label']) }}
                            {{ Form::file('images_'.$color->id.'[]', ['multiple'=>true]) }}
                        </div>
                    </div>
                </div>
                @endforeach
                <x-footer-button route="{{ route('products.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
@stop
