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
            <h3 class="card-title">Create product</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::model($data, ['method' => 'PUT', 'enctype'=>'multipart/form-data', 'route' => ['products.update', $data->id]]) }}
                {{ csrf_field() }}
                <div class="form-group">
                    {{ Form::label('name') }}
                    {{ Form::text('name', old('name'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Category') }}
                    {{ Form::select('product_category_id',$category, old('product_category_id'),['class' => 'form-control',  'placeholder' => 'Choose a category...']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Sizes') }}<br>
                    <div class="form-check">
                        @foreach($sizes as $size)
                                {{ Form::checkbox('sizing_id[]', $size->id, (in_array($size->id, $data->sizes->pluck('id')->all())?true:null),['class' => 'form-check-input']) }}
                                {{ Form::label($size->title,'', ['class' => 'form-check-label']) }}<br>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Colors') }}<br>
                    <div class="form-check">
                        @foreach($colors as $color)
                                {{ Form::checkbox('color_id[]', $color->id, (in_array($color->id, $data->colors->pluck('id')->all())?true:null),['class' => 'form-check-input']) }}
                                {{ Form::label($color->name,'',['class' => 'form-check-label']) }}<br>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Gender') }}
                    {{ Form::select('gender_id',$gender, old('gender'),['class' => 'form-control',  'placeholder' => 'Choose a gender...']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('status','status') }}<br>
                    {{ Form::radio('status','active', null) }}Active <br>
                    {{ Form::radio('status','disable', null) }}Disable
                </div>
                <x-footer-button route="{{ route('products.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
        @stop
        @section('js')
            <script type="text/javascript">$(document).ready(function () {
                    bsCustomFileInput.init();
                });
            </script>
@endsection
