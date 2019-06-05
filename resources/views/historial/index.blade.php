@extends('plantillas.admin')
@extends('plantillas.menu')
@extends('plantillas.calendario')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{Session::get('message')}}
</div>
@endif
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
    
<h3>Consulta de Actividades</h3>
    
</center>

<div>
{!! Form::open(['route' => 'Historial.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right','role' => 'search']) !!}

  
     <div  class="form-group">
     {!! Form::text('nick',null,['class' => 'form-control','placeholder' => 'Ingrese nombre de usuario']) !!}
     {!! Form::text('fechaInicial',null,['class' => 'form-control datepicker','placeholder' => 'Ingrese fecha Inicial']) !!}
     {!! Form::text('fechaFinal',null,['class' => 'form-control datepicker','placeholder' => 'Ingrese fecha Final']) !!}
    </div>

    <button type="submit" class="btn btn-warning">Buscar</button>    


</div>

            
<table class="table">
<thead>
<th>Nombre del Usuario</th>
<th>Actividad</th>
<th>Fecha y Hora</th>
</thead>
@foreach($Actividades as $actividad)
<td>{{$actividad->name}}</td>
<td>{{$actividad->actividad}}</td>
<td>{{$actividad->created_at}}</td>

<tbody>
</tbody>
@endforeach
</table>




   <div class="text-center">
        {!! $Actividades->render() !!}
    </div>






            </div>
        </div>

   



</body>

</html>
