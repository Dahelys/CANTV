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

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{Session::get('message')}}
</div>
@endif

    
<h3>Consulta de SPLS</h3>
    
</center>




            
<table class="table">
<thead>
<th>Nombre del Archivo</th>
<th>Fecha</th>
<th>Opción</th>
</thead>
@foreach($spls as $spl)

<td>{{$spl->path}}</td>
<td>{{$spl->created_at}}</td>
<td>




<a href='{!!URL::to("spls/{$spl->path}")!!}' download="{{$spl->path}}">Descargar</a>

    </td>



</td>
<tbody>
</tbody>
@endforeach
</table>


   <div class="text-center">
        {!! $spls->render() !!}
    </div>
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
