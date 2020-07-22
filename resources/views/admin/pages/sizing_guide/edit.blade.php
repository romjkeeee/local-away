{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Edit Sizing guide</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                <form action="{{ route('sizing-guides.update', $data) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <?php
                    $form_fields = array(
                        'sizing_category_id',
                        'title',
                        'image',
                        'gender',
                    );

                    $gender_data = array(
                        'male',
                        'female',
                    )

                    ?>
                    @foreach($form_fields as $field)
                        @if($field == 'image')
                            <div class="form-group">
                                <label for="exampleInput{{ $field }}">{{ $field }}</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInput{{ $field }}" name="{{ $field }}">
                                        <label class="custom-file-label" for="exampleInput{{ $field }}">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        @elseif($field == 'gender')
                            <div class="form-group">
                                <label for="inputForurl">Gender</label>
                                <p><select class="form-control" name="role">
                                        <option selected disabled>Chose gender</option>
                                        @foreach($gender_data as $gender)
                                            @if($gender == $data->gender)
                                                <option value="{{ $gender }}" selected>{{ $gender }}</option>
                                            @else
                                                <option value="{{ $gender }}">{{ $gender }}</option>
                                            @endif
                                        @endforeach
                                    </select></p>
                            </div>
                        @elseif($field == 'sizing_category_id')
                            <div class="form-group">
                                <label for="inputForurl">Sizing Category</label>
                                <p><select class="form-control" name="sizing_category_id">
                                        <option selected disabled>Chose Sizing Category</option>
                                        @foreach($sizing_category as $key => $category)
                                            @if($key == $data->sizing_category_id)
                                                <option value="{{ $key }}" selected>{{ $category }}</option>
                                            @else
                                                <option value="{{ $key }}">{{ $category }}</option>
                                            @endif
                                        @endforeach
                                    </select></p>
                            </div>
                        @elseif($field == 'text')
                            <div class="form-group">
                                <label>{{ $field }}</label>
                                <textarea disabled name="{{ $field }}" class="form-control" rows="3">{{$data[$field]}}</textarea>
                            </div>
                        @else
                            <div class="form-group">
                                <label for="inputFor{{ $field }}">{{ $field }}</label>
                                <input class="form-control"  style="" name="{{ $field }}"
                                       id="input{{ $field }}"
                                       placeholder="{{$field}}"
                                       value="{{$data[$field]}}" >
                            </div>
                        @endif
                    @endforeach

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary margin-r-5">Save</button>
                        <a href="{{ route('sizing-guides.index') }}" class="btn btn-default">Back to list</a>
                    </div>
                </form>
            </div>
        </div>
@stop

