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
        <x-card-header title="Create Personal style"></x-card-header>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::open(['route' => ['personal-style.store'], 'file' => true, 'method' => 'POST','enctype'=>'multipart/form-data']) }}
                {{ csrf_field() }}
                <x-title-input-create></x-title-input-create>
                <x-image-input-create></x-image-input-create>
                <x-gender-input-create></x-gender-input-create>
                <x-footer-button route="{{ route('personal-style.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
        @stop

        @section('js')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bs-custom-file-input/1.3.4/bs-custom-file-input.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function () { bsCustomFileInput.init(); });
            </script>
@stop
