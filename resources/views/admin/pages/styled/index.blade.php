@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Styled</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Styled</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="primary">
        <p>
            <a href="{{ route('styled.create') }}" class="btn btn-success btn-lg">Create styled</a>
        </p>
    </div>
    <?php
    $form_fields = array(
        'id',
        'title',
        'image',
        'gender',
        'active'
    );
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            @foreach($form_fields as $fields)
                                <th>{{ $fields }}</th>
                            @endforeach
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $user)
                            <tr>
                                @foreach($form_fields as $fields)
                                    @if($fields == 'active')
                                        <td>
                                            <div class="bootstrap-switch-null bootstrap-switch-undefined bootstrap-switch-undefined bootstrap-switch-undefined bootstrap-switch-undefined bootstrap-switch-undefined bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate bootstrap-switch-off bootstrap-switch-on">
                                                <div class="bootstrap-switch-container">
                                                    <input onclick="UpdateStatus({{$user->id}})" type="checkbox" name="active" @if($user->$fields)checked=""@endif data-bootstrap-switch="" data-off-color="danger" data-on-color="success">
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        @if($fields == 'image')
                                            <td><img class="img-thumbnail" src="{{asset('storage/'.$user->image)}}"></td>
                                        @else
                                            <td @if($fields == 'title')style="width: 100%"@endif>{{ $user->$fields }}</td>
                                        @endif
                                    @endif
                                @endforeach
                                <td>
                                    <a href="{{ route('styled.show',[$user->id]) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @role('admin')
                                    <a href="{{ route('styled.edit',[$user->id]) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endrole
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@stop
@section('js')
    <script>
        $(function () {
            $("#example1").DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "scrollCollapse": true,
                "responsive": true,
                "fixedHeader.header": true,
                "scrollX": true,
            });
        });

        $(function () {
            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
        })

        function UpdateStatus(id){

//make an ajax call and get status value using the same 'id'
            var var1= document.getElementById("status").value;
            $.ajax({

                type:"GET",//or POST
                url:'http://localhost:8888/peiko/first/laravel/public/admin/travel_purposes/'+id+'/status',
                //  (or whatever your url is)
                data:{data1:var1},
                //can send multipledata like {data1:var1,data2:var2,data3:var3
                //can use dataType:'text/html' or 'json' if response type expected
                success:function(responsedata){
                    // process on data
                    alert("got response as "+"'"+responsedata+"'");

                }
            })

        }
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


@stop
