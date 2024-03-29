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
                {{ Form::open(['route' => ['products.store'], 'files' => true, 'method' => 'POST','enctype'=>'multipart/form-data']) }}
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
                            {{ Form::checkbox('sizing_id[]', $size->id, false,['class' => 'form-check-input']) }}
                            {{ Form::label($size->title,'', ['class' => 'form-check-label']) }}<br>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Colors') }}<br>
                    <div class="form-check">
                        @foreach($colors as $color)
                            {{ Form::checkbox('color_id[]', $color->id, false,['class' => 'form-check-input']) }}
                            {{ Form::label($color->name,'', ['class' => 'form-check-label']) }}<br>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Price') }}
                    {{ Form::text('price', old('price'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Gender') }}
                    {{ Form::select('gender_id',$gender, old('gender'),['class' => 'form-control',  'placeholder' => 'Choose a gender...']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Boutique') }}<br>
                    {{ Form::select('boutiques_id',$boutiques, old('boutiques_id'), ['class' => 'js-example-basic-multiple', 'placeholder' => 'Choose ..']) }}
                </div>
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-secondary margin-r-5">Next step</button>
                    <a href="{{ route('products.index') }}" class="btn btn-default">Back to list</a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
        @stop
        @section('js')
            <script type="text/javascript">
                $(document).ready(function () {
                    $('.js-example-basic-multiple').select2({ width: '100%' });
                    bsCustomFileInput.init();
                });
            </script>
@endsection
