{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Edit body-type</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                <form action="{{ route('body-type.update', $data) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <?php
                    $form_fields = array(
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
                                <p><select class="input-group" name="role">
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
                        <a href="{{ route('body-type.index') }}" class="btn btn-default">Back to list</a>

                    </div>
                </form>
            </div>
        </div>
@stop

