<td>
    <a href="{{ $show }}"><i class="fas fa-eye"></i></a>
    @role('admin')
    <a href="{{ $edit }}"><i class="fas fa-edit"></i></a>
    @endrole
    @if(\Route::current()->getName() == 'users.index')
        @if(auth()->id() != $id)
            {{ Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $id], 'onsubmit' => 'return confirm("are you sure ?")']) }}
            {{ Form::button('<i class="fas fa-trash" aria-hidden="true"></i>',
                ['class' => 'btn btn-warning btn-sm', 'type' => 'submit', 'style' => 'padding:0; background: none; border:none; color:#007bff;'] )  }}
            {{ Form::close() }}
        @endif
    @endif
</td>
