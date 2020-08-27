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
            <h3 class="card-title">Edit product images</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::model($data, ['method' => 'PUT', 'enctype'=>'multipart/form-data', 'url' => 'admin/product/'.$data->id.'/step2']) }}
                {{ csrf_field() }}
                @foreach($data->colors as $color)
                    <div class="form-group">
                        <label for="exampleInputImage">Chose Image for {{ $color->name }} color</label>
                        <div class="input-group">
                            <div class="custom-file">
                                {{ Form::label('images_'.$color->id.'[]', 'Chose file', ['class' => 'custom-file-label']) }}
                                {{ Form::file('images_'.$color->id.'[]', ['multiple'=>true]) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row-cols-3">
                            @foreach($data->colorImage()->where('color_id',$color->id)->get() as $image)
                                <a href="{{ url('admin/image/'.$image->media_id.'/delete') }}"><i
                                        class="fas fa-trash"></i></a>
                                <img style="height: 100px" class="img-thumbnail"
                                     src="{{ $data->getMedia('images')->where('id',$image->media_id)->first()->getFullUrl()  }}"
                                     disabled>
                            @endforeach
                            @endforeach
                            <x-footer-button route="{{ route('products.index') }}"></x-footer-button>
                            {{ Form::close() }}
                        </div>
                    </div>
            </div>
        </div>
        @stop
        @section('js')
            <script type="text/javascript">$(document).ready(function () {
                    bsCustomFileInput.init();
                });
            </script>
@endsection
