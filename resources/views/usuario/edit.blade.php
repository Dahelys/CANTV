@extends('plantillas.admin') 
@extends('plantillas.menu')
@section('content')


<div   class="container" >

            <div class="row">
                <div class="col-lg-7">
                    <br>
                    <br>
                    <br>
                    <br><br>
                 
    

 

    




                    <div class=" col-md-6  col-md-offset-8">

<center> <h3>Actualizar o Eliminar Usuario</h3></center>
     

                    <br>



 {!!Form::model($user,['method' => 'UPDATE', 'onsubmit' => 'return confirm("¿Estas Seguro de Actualizar el Usuario?")', 'class'=>'form-horizontal','route'=> ['usuario.update',$user->id],'method'=>'PUT'])!!}


    	@include('usuario.formularios.usr_edit')
    	
   {!!Form::submit('Actualizar',['class'=>'btn btn-primary col-md-5 col-md-offset-0'])!!}

 {!!Form::close()!!}	
 {!!Form::open(['method' => 'DELETE', 'onsubmit' => 'return confirm("¿Estas Seguro de eliminar el usuario?")', 'class'=>'form-horizontal','route'=> ['usuario.destroy',$user->id],'method'=>'DELETE'])!!}
   
  {!!Form::submit('Eliminar',['class'=>'btn btn-danger col-md-5 col-md-offset-2'])!!}


  {!!Form::close()!!}	
 <br><br><br><br>

@include('alertas.request')
@include('alertas.errors')
@stop


<br><br>
 
 </div>
