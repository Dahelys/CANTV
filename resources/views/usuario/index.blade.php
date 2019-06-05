@extends('plantillas.admin')
@extends('plantillas.menu')

@section('content')





    <!-- Contenido de la Pagina -->
    <div class="container">




        <div class="row">
            <div class="col-lg-12">

<br>
<br>
<br>
<br>
             
<center>
    
    <h3>Consulta de Usuarios Activos</h3>
</center>

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{Session::get('message')}}
</div>
@endif
@include('alertas.errors')

            
<table class="table">
<thead>
<th>Usuario</th>
<th>Correo</th>
<th>Operación</th>
</thead>
@foreach($users as $user)
<td>{{$user->name}}</td>
<td>{{$user->email}}</td>
<td>

 {!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary']);!!} 



</td>
<tbody>
</tbody>
@endforeach
</table>


<div class="text-center">
        {!! $users->render() !!}
    </div>




@stop
            </div>
        </div>

   


  
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
