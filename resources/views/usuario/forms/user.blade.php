

    {!!Form::open(['class'=>'form-horizontal','route'=>'usuario.store', 'method'=>'POST'])!!}


    	@include('usuario.formularios.usr')
    {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}


    {!!Form::close()!!}

