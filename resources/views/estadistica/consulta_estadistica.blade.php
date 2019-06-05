@extends('plantillas.admin')
@extends('plantillas.menu')
@extends('plantillas.calendario')





@section('content')

   




    <!-- Contenido de la Pagina -->
    <div class="container">




<div class="row">
<div class="col-lg-12">

<br>
<br>
<br>
<br>
           
<center><h3>Consultar Estadísticas</h3></center>







<br>
<br>

<div class="content" id="file">
 
        <div class="panel panel-default" >
            <div class="panel-body" >
                <div class="col-md-4 col-md-offset-4">





{!!Form::open(['route'=>'estadistica.store', 'method'=>'POST'])!!}

   <center>
         
       <img src="{{URL::asset('img/statistics.png')}}" alt="profile Pic" height="200px" width="200px" id="file">            

</center>      
                       
<div class="form-group">


{!! Form::label('date', 'Fecha') !!}


<div class="input-group">



{!!Form::text('date',null,['class'=>'form-control datepicker',
'id' => 'fecha'

 ,'placeholder'=>'Fecha'])!!}












<div class="input-group-addon" onclick="campo()">
        
        <img src="{{ asset('img/glyphicons-46-calendar.png')}}" />

 </div>

</div>



  <script type="text/javascript">

      var date = new LiveValidation('date');

        date.add(Validate.Presence);

         
        
    </script>
                           

<div class="form-group" >


  {!! Form::label('conexion', 'Tipo de Conexión:') !!}


{!!

Form::select('tipo', ['ATM/FR' => 'ATM/FR', 'METRO' => 'METRO', 'TODAS' => 'TODAS'], null,  ['class'=>'form-control']);

!!}



                  



</div>




                        </div>
  <center>
     <input type="submit" Class="btn btn-primary" value="Generar Gráficos" id="boton" onclick="enviar()" />

  </center>

            


    {!!Form::close()!!}
 
                </div>
            </div>
        </div>
 
    </div>
<center>

<img src="{{URL::asset('img/carga1.gif')}}" alt="profile Pic" height="270px" width="270px" id="preload"   style="display:none" >

</br>
</br>


<div id ="Mensaje-carga" style="display:none">
<br/>
<h4>Cargando Gráficos</h4>
</div>

  {!!Html::script('js/progreso_carga.js')!!}

 {!!Html::script('js/campo.js')!!}



</center>
@include('alertas.request')
@include('alertas.errors')
</body>

</html>
