{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Edit personal style</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                <form action="{{ route('personal-style.update', $data) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <?php
                    $form_fields = array(
                        'title',
                        'sizing_category_id',
                    );
                    ?>
                    @foreach($form_fields as $field)
                        @if($field == 'sizing_category_id')
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
                        <a href="{{ route('sizing-type.index') }}" class="btn btn-default">Back to list</a>
                    </div>
                </form>
            </div>
        </div>
@stop

