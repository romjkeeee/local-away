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
            <h3 class="card-title">Create sizing type</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::open(['route' => ['sizing-type.store'], 'file' => true, 'method' => 'POST','enctype'=>'multipart/form-data']) }}
                {{ csrf_field() }}
                <div class="form-group">
                    {{ Form::label('title') }}
                    {{ Form::text('title', old('title'), ['class' => 'form-control', 'maxlength' => '190', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Sizing Category') }}
                    {{ Form::select('sizing_category_id',$sizing_category, old('sizing_category_id'),['class' => 'form-control',  'placeholder' => 'Choose a category...']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Sizes') }}<br>
                    <div class="form-check">
                        @foreach($sizes as $size)
                            {{ Form::checkbox('sizing_id[]', $size->id, false,['class' => 'form-check-input']) }}
                            {{ Form::label($size->title,'', ['class' => 'form-check-label']) }}({{ \App\Measurement::find($size->measurement_id)->name ?? '' }})<br>
                        @endforeach
                    </div>
                </div>
                <x-footer-button route="{{ route('sizing-type.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
        @stop
        @section('js')
            <script type="text/javascript">
                $(document).ready(function () {
                    bsCustomFileInput.init();
                });
            </script>
@endsection
