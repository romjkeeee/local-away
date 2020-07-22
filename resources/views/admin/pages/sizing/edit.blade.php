{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Edit size</h3>
        </div>
        <div class="panel panel-default">
            <div class="card-body">
                <form action="{{ route('sizing.update', $user) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <?php
                    $form_fields = array(
                        'title',
                    );
                    ?>
                    @foreach($form_fields as $field)
                            <div class="form-group">
                                <label for="inputFor{{ $field }}">{{ $field }}</label>
                                <input class="form-control"  style="" name="{{ $field }}"
                                       id="input{{ $field }}"
                                       placeholder="{{$field}}"
                                       value="{{$user[$field]}}" >
                            </div>
                    @endforeach

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary margin-r-5">Save</button>
                        <a href="{{ route('sizing.index') }}" class="btn btn-default">Back to list</a>
                    </div>
                </form>
            </div>
        </div>
        @stop
