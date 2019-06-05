@extends('plantillas.admin')
@extends('plantillas.menu')
@section('content')


<!-- Page Content -->
    

<div class="container">
<br>
<br>
<br>
<br>
<center>


<h3>Registrar Nodo</h3>

</center>

<br>

             @include('planta.formulario.formulario')

     



    
    <br>
     <div class="form-group">
         <div class="col-xs-offset-5 col-xs-10">
             <button type="submit" class="btn btn-primary">Registrar Nodo</button>
         </div>
     </div>
{!!Form::close()!!}
@include('alertas.request')
@include('alertas.errors')


