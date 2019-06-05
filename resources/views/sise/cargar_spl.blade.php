@extends('plantillas.admin')
@extends('plantillas.menu')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{Session::get('message')}}
</div>
@endif

@section('content')


<!-- Page Content -->
    

<div class="container">
<br>
<br>
<br>
<br>
<center>

@include('alertas.request')
@include('alertas.errors')

<h3>Registrar SPL Sise</h3>

<br>
<br>

   <center>
         
       <img src="{{URL::asset('img/txt.png')}}" alt="profile Pic" height="100px" width="100px" id="file"/>            

</center>
<br>
<br>
{!!Form::open(['route'=>'sise.store', 'method'=>'POST','files' => true ])!!}
		  		@include('sise.formulario.spl_form')
	
 




<img src="{{URL::asset('img/carga1.gif')}}" alt="profile Pic" height="270px" width="270px" id="preload"   style="display:none" >

</br>
</br>

<input type="submit" Class="btn btn-primary" value="Registrar" id="boton" onclick="enviar()" />


{!!Html::script('js/progreso_carga.js')!!}



<div id ="Mensaje-carga" style="display:none">
<br/>
<h4>Cargando Archivo Sise</h4>
<div>

			{!!Form::close()!!}


</center>




