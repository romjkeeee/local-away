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
            <h3 class="card-title">Edit body type</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::model($data, ['method' => 'PUT', 'enctype'=>'multipart/form-data', 'route' => ['travel-stories.update', $data->id]]) }}
                <div class="form-group">
                    {{ Form::label('name') }}
                    {{ Form::text('name', old('name'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    <label for="exampleInputImage">Preview image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            {{ Form::label('preview_image', 'Chose file', ['class' => 'custom-file-label']) }}
                            {{ Form::file('preview_image') }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputImage">Full image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            {{ Form::label('full_image_path', 'Chose file', ['class' => 'custom-file-label']) }}
                            {{ Form::file('full_image_path') }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('description') }}
                    {{ Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Products') }}<br>
                    {{ Form::select('product_ids[]',$products, $data_products, ['class' => 'js-example-basic-multiple',  'multiple'=>true]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('is_to_homepage','Home page') }}<br>
                    {{ Form::radio('is_to_homepage',0, null) }}No <br>
                    {{ Form::radio('is_to_homepage',1, null) }}Yes
                </div>
                <x-footer-button route="{{ route('travel-stories.index') }}"></x-footer-button>
                {{ Form::close() }}
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
