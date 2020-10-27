{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Show Size</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="">
            <div class="card-body">
                <div class="form-group">
                    <label for="inputName">Sizing info</label><br>
                    @if($data->sizing)
                        @foreach($data->sizing as $key => $value)
                            <label for="inputName">Sizing category
                                - {{ \App\SizingCategory::query()->where('id', $value['sizing_category_id'])->first()->title ?? 'no name'}}</label>
                            <br>
                            <label for="inputName">Sizing Type
                                - {{ \App\SizingType::query()->where('id',$value['sizing_types'])->first()->title ?? 'no name'}}</label>
                            <input type="text" id="inputName" class="form-control"
                                   value="{{ \App\Sizing::query()->where('id',$value['id'])->first()->title ?? 'no name'}}"
                                   disabled>
                            <hr>
                        @endforeach
                </div>
                @else
                    Nothing to show
                @endif
            </div>
            <!-- /.card-body -->
            <a href="{{ route('user-settings.index') }}" class="btn btn-default">Back to list</a>

        </form>
    </div>
@stop
