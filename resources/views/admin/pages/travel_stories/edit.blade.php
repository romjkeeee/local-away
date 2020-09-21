{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')
<link rel="stylesheet" href="{{ asset('redactor/redactor.css') }}" />
<link rel="stylesheet" href="{{ asset('editor-md/css/editormd.min.css') }}" />

@section('title', 'Dashboard')

@section('content')
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <x-validation-error errors="{{ $error }}"></x-validation-error>
        @endforeach
    @endif
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Edit Travel Stories</h3>
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
                    <div class="row-cols-3">
                        @if($data->preview_image)
                            {{--                            <a href="{{ url('travel-stories/'.$data->id.'/delete') }}"><i--}}
                            {{--                                    class="fas fa-trash"></i></a>--}}
                            <img style="height: 100px" class="img-thumbnail"
                                 src="{{ asset('storage/'.$data->preview_image) }}"
                                 disabled>
                        @endif
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
                    <div class="row-cols-3">
                        @if($data->full_image_path)
                            {{--                            <a href="{{ url('travel-stories/'.$data->id.'/delete') }}"><i--}}
                            {{--                                    class="fas fa-trash"></i></a>--}}
                            <img style="height: 100px" class="img-thumbnail"
                                 src="{{ asset('storage/'.$data->full_image_path) }}"
                                 disabled>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <div id="editor">
                        <!-- Tips: Editor.md can auto append a `<textarea>` tag -->
                        <textarea name="description">{{$data->description}}</textarea>
                    </div>

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
                <div class="form-group">
                    {{ Form::label('active','active') }}<br>
                    {{ Form::radio('active',0, null) }}No <br>
                    {{ Form::radio('active',1, null) }}Yes
                </div>
                <x-footer-button route="{{ route('travel-stories.index') }}"></x-footer-button>
                {{ Form::close() }}
            </div>
        </div>
@stop

        @section('js')
            <script src="{{ asset('/editor-md/editormd.js') }}"></script>
            <script src="{{ asset('/editor-md/languages/en.js') }}"></script>
            <script type="text/javascript">
                $(function() {
                    var editor = editormd("editor", {
                        width: "100%",
                        height: "100%",
                        toolbarIcons: "simple",
                        path : "{{ asset('editor-md/lib/') }}/",  // Autoload modules mode, codemirror, marked... dependents libs path

                    });
                });
            </script>
            <script type="text/javascript">

                $(document).ready(function () {
                    $('.js-example-basic-multiple').select2({
                        width: '100%',
                        // templateResult: formatState,
                        // templateSelection: formatState
                    });
                    bsCustomFileInput.init();

                    $('.summernote').summernote({
                        airMode: true
                    });

                    // function formatState (state) {
                    //     if (!state.id) { return state.text; }
                    //     var $url = httpGet('http://localhost:8888/peiko/first/laravel/public/admin/image/'+ state.id);
                    //     var $state = $(
                    //         '<span >' + $url + state.text + '</span>'
                    //     );
                    //     return $state;
                    // }
                    //
                    // function httpGet(theUrl)
                    // {
                    //     if (window.XMLHttpRequest)
                    //     {// code for IE7+, Firefox, Chrome, Opera, Safari
                    //         xmlhttp=new XMLHttpRequest();
                    //     }
                    //     else
                    //     {// code for IE6, IE5
                    //         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                    //     }
                    //     xmlhttp.onreadystatechange=function()
                    //     {
                    //         if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    //         {
                    //             return xmlhttp.responseText;
                    //         }
                    //     }
                    //     xmlhttp.open("GET", theUrl, false );
                    //     xmlhttp.send();
                    //     return xmlhttp.response;
                    //
                    // }

                })

            </script>


@endsection()
