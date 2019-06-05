@extends('plantillas.admin')
@extends('plantillas.menu')

@section('content')


<br><br><br><br>

    



<!-- FIN DEL BUSCADOR -->
    <!-- Contenido de la Pagina -->
    <div class="container" style="width:100%">

<a href="{{ route('planta.create')}}"  class="btn btn-warning">Registrar Nuevo Nodo</a>

<!-- BUSCADOR-->
        {!! Form::open(['route' => 'planta.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right','role' => 'search']) !!}

  
     <div  class="form-group">
     {!! Form::text('dir_ip',null,['class' => 'form-control','placeholder' => 'Ingrese', 'onkeyup'=>'javascript:this.value=this.value.toUpperCase()']) !!}
    </div>

    <button type="submit" class="btn btn-warning">Buscar</button>


    {!! Form::close() !!}


        <div class="row">
            <div class="col-lg-12">


             
<div >

    
    <br>

<center>
<h1>Planta de Datos Existente</h1>

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{Session::get('message')}}
</div>
@endif
@include('alertas.errors')


</center>
</div>
            
<table class="table">
<thead>
<th>IP de Sistema Metro:</th>
<th>Nombre del Nodo:</th>
<th>Puerto ATM/FR:</th>
<th>Puerto Metro:</th>
<th>Marca:</th>
<th>Modelo:</th>
<th>Región:</th>
<th>Estado:</th>
<th>Central:</th>
<th>Codigo Contable:</th>
<th>Tipo:</th>
<th>Operación</th>
</thead>
    @foreach($planta as $Planta)
<td >{{$Planta->dir_ip}}</td>
<td>{{$Planta->equipo}}</td>
<td>{{$Planta->puerto_atm_fr}}</td>
<td>{{$Planta->puerto_metro}}</td>
<td>{{$Planta->marca_equipo}}</td>
<td>{{$Planta->modelo_equipo}}</td>
<td>{{$Planta->region_equipo}}</td>
<td>{{$Planta->estado_equipo}}</td>
<td>{{$Planta->central_sise}}</td>
<td>{{$Planta->codigo_contable}}</td>
<td>{{$Planta->tipo_puerto}}</td>
<td>


 {!!link_to_route('planta.edit', $title = 'Editar', $parameters = $Planta->id, $attributes = ['class'=>'btn btn-primary']);!!} 


</td>
<tbody>

            </div>
        </div>

   


  
        @endforeach
        </tbody>

    </table>

    <div class="text-center">
        {!! $planta->render() !!}
    </div>

</body>

</html>
