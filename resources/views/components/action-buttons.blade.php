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
