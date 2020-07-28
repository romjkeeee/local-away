<td>
    <a href="{{ $show }}"><i class="fas fa-eye"></i></a>
    @role('admin')
    <a href="{{ $edit }}"><i class="fas fa-edit"></i></a>
    @endrole
    @if(\Route::current()->getName() == 'users.index')
        {{ Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $id]]) }}
        {{ Form::button('<i class="fas fa-trash" aria-hidden="true"></i>',
            ['class' => 'btn btn-warning btn-sm', 'type' => 'submit', 'style' => 'padding:0; background: none; border:none; color:#007bff;'] )  }}
        {{ Form::close() }}
    @endif
</td>
@section('js')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bs-custom-file-input/1.3.4/bs-custom-file-input.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () { bsCustomFileInput.init(); });
    </script>
@stop
