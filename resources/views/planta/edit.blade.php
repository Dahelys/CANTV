@extends('plantillas.admin') 
@extends('plantillas.menu')
@section('content')
<br><br><br>
<center>




<h3>Actualizar Nodo</h3>


<br>
</center>

    {!!Form::model($planta,['method' => 'UPDATE', 'onsubmit' => 'return confirm("¿Estas Seguro de Actualizar el Nodo?")','class'=>'form-horizontal','route'=> ['planta.update',$planta->id],'method'=>'PUT'])!!}


             @include('planta.formulario.formulario')
    

   <br>
     <div class="form-group">
         <div class="col-xs-offset-5 col-xs-10">
            
             <button type="submit" class="btn btn-primary">Actualizar Nodo</button>

         </div>
     </div>
    {!!Form::close()!!}
    @include('alertas.request')
@include('alertas.errors')
    
@stop
