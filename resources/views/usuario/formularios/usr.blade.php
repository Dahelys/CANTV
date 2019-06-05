
<div class="form-group">
{!!Form::label('Nombre:')!!}
{!!Form::text('user_name', null,['class'=>'form-control', 'placeholder'=>'Ingrese su Nombre'])!!}

</div>
<div class="form-group">
{!!Form::label('Apellido:')!!}
{!!Form::text('apellido', null,['class'=>'form-control', 'placeholder'=>'Ingrese su Apellido'])!!}

</div>
<div class="form-group">
{!!Form::label('Nick:')!!}
{!!Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Ingrese su nick'])!!}

</div>
<div class="form-group">
{!!Form::label('Correo:')!!} 
{!!Form::text('email', null,['class'=>'form-control', 'placeholder'=>'Ingrese Correo Electronico'])!!}

</div>
<div class="form-group">
{!!Form::label('Password:')!!}
{!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingrese Contrasena'])!!}
</div>

