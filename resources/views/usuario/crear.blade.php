@extends('plantillas.admin')
@extends('plantillas.menu')
@section('content')

<div class="container">

            <div class="row">
                <div class="col-lg-7">
                    <br>
                    <br>
                    <br>
                    <br><br>
                 
    

    

    




                    <div class=" col-md-6  col-md-offset-8">

<center>
    
<h3>Crear Usuario</h3>
    
</center>
     

                    <br>






{!!Form::open(['class'=>'form-horizontal','route'=>'usuario.store', 'method'=>'POST'])!!}


        @include('usuario.formularios.usr')

        {!!Form::submit('Crear',['class'=>'btn btn-primary'])!!}


{!!Form::close()!!}

@include('alertas.request')


  