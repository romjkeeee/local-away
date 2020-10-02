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
            <h3 class="card-title">travel-stories images</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                {{ Form::open(['url' => 'admin/travel-stories/'.$data->id.'/step2', 'file' => true, 'method' => 'PUT','enctype'=>'multipart/form-data']) }}
                {{ csrf_field() }}
                @foreach($genders as $gender)
                    <div class="form-group">
                        <label for="exampleInputImage">Chose Image for {{ $gender->title }}</label>
                        <div class="input-group">
                            <div class="custom-file">
                                {{ Form::label('image_gender_'.$gender->id, 'Chose file', ['class' => 'custom-file-label']) }}
                                {{ Form::file('image_gender_'.$gender->id) }}
                            </div>
                        </div>
                    </div>
                @if(count($data->travel_story_image_gender))
                        @foreach($data->travel_story_image_gender()->where('gender_id', $gender->id)->get(['image']) as $image)
                    <a href="{{ url('travel-stories/'.$image->id.'/delete') }}"><i
                            class="fas fa-trash"></i></a>
                    <img style="height: 100px" class="img-thumbnail"
                         src="{{ asset('storage/'.$image->image) }}"
                         disabled>
                        @endforeach
                    @endif
                @endforeach
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
