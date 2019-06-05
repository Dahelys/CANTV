<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

<div id='cssmenu'>

 

  <ul>

<!-- Espaciado-->




<!-- //////////////////////////////////////////////////////-->



</li>

<li ><a href="{!!URL::to('/logout')!!}" >Cerrar Sesión</a></li>
<li ><a  >
 {!!Auth::user()->name!!}







</a></li>



		
<?php 

if(Auth::user()->id != 1){




echo "<li><a href='#' >REPORTE RED DE DATOS</a>";



}

?>






<ul>

	<li class='has-sub '><a href='{!!URL::to("generar_reporte")!!}'>Generar Reporte</a></li>
	
	<li class='has-sub '><a href='{!!URL::to("consulta")!!}'>Consultar Reporte</a></li>
	
	<li class='has-sub '><a href='{!!URL::to("/estadistica/create")!!}'>Estadísticas Reporte</a></li>

</ul>

</li>

   
		
<?php 

if(Auth::user()->id != 1){




echo "<li ><a >NODOS DE PLANTA</a>";



}

?>





<ul>
<li class='has-sub '><a href='{!!URL::to("planta")!!}'>Gestionar Nodos</a></li>
<li class='has-sub '><a href= '{!!URL::to("reporteplanta")!!}' >Reporte de Planta Existente</a></li>





</ul>
</li>

		
	    


<?php 

if(Auth::user()->id != 1){




echo "<li ><a href='#' >CARGAR SISE</a>";



}

?>











<ul>
<li class='has-sub '><a href="{!!URL::to('/sise/create')!!}">Registrar SISE</a></li>
<li class='has-sub '><a href="{!!URL::to('/sise/')!!}">Consultar SISE</a></li>
</ul>
</li>


<?php 

if(Auth::user()->id == 1){




echo "<li ><a href='#' >Auditoria</a>";



}

?>





<ul>
<li class='has-sub '><a href='{!!URL::to("Historial")!!}'>Consultar Actividades</a></li>
</ul>
</li>




<?php 

if(Auth::user()->id == 1){

echo "<li >";


echo "<a href='#' >Usuarios</a>";



}



?>



<ul>
<li class='has-sub '><a href='{!!URL::to("/usuario/create")!!}'>Crear Usuarios</a></li>
<li class='has-sub '><a href='{!!URL::to("/usuario")!!}'>Consultar Usuarios Activos</a></li>
<li class='has-sub '><a href='{!!URL::to("/inactivos")!!}'>Consultar Usuarios Inactivos</a></li>
</ul>
</li>


<li><a href='{!!URL::to("/panel")!!}' >Inicio</a>

</li>



<img src="{{URL::asset('img/cantv _Black_and_White.png')}}" alt="profile Pic" height="7%" width="8%">


 </div>

</nav>