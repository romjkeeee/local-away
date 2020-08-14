{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <x-validation-error errors="{{ $error }}"/>
        @endforeach
    @endif
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Create Sizing category</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::open(['route' => ['sizing-categories.store'], 'file' => true, 'method' => 'POST','enctype'=>'multipart/form-data']) }}
                {{ csrf_field() }}
                <div class="form-group">
                    {{ Form::label('title') }}
                    {{ Form::text('title', old('title'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    <label for="exampleInputImage">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            {{ Form::label('image', 'Chose file', ['class' => 'custom-file-label']) }}
                            {{ Form::file('image') }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('gender') }}
                    {{ Form::select('gender',['male' => 'male', 'female' => 'female'], old('gender'), ['class' => 'form-control', 'placeholder' => 'Choose a gender...']) }}
                </div>
                <div class="form-group">
                    <div class="adddd" id="popopo">
                        {{ Form::label('title') }}
                        {{ Form::text('title', old('title'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}

                        {{ Form::label('Sizes') }}<br>
                        {{ Form::select('sizing_id[]',$sizes, old('sizing_id'), ['class' => 'js-example-basic-multiple',  'multiple'=>true]) }}
                    </div>
                    <div class="adddd" id="popopo1">
                    </div>
                    <button class="btn-default" type="button" id="addDom">Add more category</button>
                </div>
                <x-footer-button route="{{ route('sizing-categories.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
@stop
@section('js')
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#addDom").click(function(){
                        $("#popopo").clone().appendTo("#popopo1");
                    });

                    $('.js-example-basic-multiple').select2({ width: '100%' });
                    bsCustomFileInput.init();
                });

            </script>
    @stop
