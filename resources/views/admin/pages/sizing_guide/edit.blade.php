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
            <h3 class="card-title">Edit sizing guide</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::model($data, ['method' => 'PUT', 'enctype'=>'multipart/form-data', 'route' => ['sizing-guides.update', $data->id]]) }}
                <div class="form-group">
                    {{ Form::label('Sizing category') }}<br>
                    {{ Form::select('sizing_category_id',$sizing_category, old('sizing_category_id'),['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('title') }}
                    {{ Form::text('title', old('title'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('text') }}
                    {{ Form::textarea('text', old('text'),['class' => 'form-control']) }}
                </div>
                <label for="exampleInputImage">Image</label>
                <div class="input-group">
                    <div class="custom-file">
                        {{ Form::label('image', 'Chose file', ['class' => 'custom-file-label']) }}
                        {{ Form::file('image') }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('gender') }}
                    {{ Form::select('gender',$gender, old('gender'), ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('active','active') }}<br>
                    {{ Form::radio('active',0, null) }}No <br>
                    {{ Form::radio('active',1, null) }}Yes
                </div>

                <x-footer-button route="{{ route('sizing-guides.index') }}"></x-footer-button>
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
