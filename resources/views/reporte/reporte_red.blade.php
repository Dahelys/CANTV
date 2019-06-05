<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte de Red de Datos de Cantv</title>




<style>
 




  




 .col-md-12 {
    width: 100%;
} 

.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 0px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    background-color: #ffffff;
}

.box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
}

.box-header.with-border {
    border-bottom: 1px solid #f4f4f4;
}


.box-header .box-title {
    display: inline-block;
    font-size: 18px;
    margin: 0;
    line-height: 1;
}

.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;
    font-size: small;
}


.box-footer {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #f4f4f4;
    padding: 10px;
    background-color: #fff;
}


.table-bordered {
    border: 1px solid #f4f4f4;
}


.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}

table {
    background-color: transparent;
}

.table-bordered {
  border: 1px solid #ddd;
}
.table-bordered > thead > tr > th,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > tbody > tr > td,
.table-bordered > tfoot > tr > td {
  border: 1px solid #ddd;
}
.table-bordered > thead > tr > th,
.table-bordered > thead > tr > td {
  border-bottom-width: 2px;
}

.badge {
    display: inline-block;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #777;
    border-radius: 10px;
}

.bg-red {
    background-color: #dd4b39 !important;
}






</style>
	  
</head>
<body>


<div class="col-md-12">


              <div class="box">
     <img src="./img/cantv.png" width="15%" height="10%" />
<h4>
  GERENCIA OPERACIONES ÚLTIMA MILLA
 </h4> 
 <h4>
  PROVISIÓN SERVICIOS REDES DE TELECOMUNICACIONES
 </h4> 



                <div class="box-header with-border">

<center>
  <h3 class="box-title">

  
    

    ESTADO DE PUERTOS POR CENTRAL | <?= $date;  ?> |  Autor: 

    <?=  Auth::user()->user_name;?> 
    <?=  Auth::user()->apellido;?>
      
    </h3>
<br>
<h5>Tipo de Conexión: <?= $tipo;  ?> </h5>

</center>
        
                </div><!-- /.box-header -->
                <div class="box-body">




                  <table class="table table-bordered" >
                  <thead>
                     <tr>
          <th style="width: 10px">Región</th>
          <th style="width: 10px">Estado</th>          
          <th style="width: 10px">Central</th>
          <th style="width: 5px">Código Contable</th>          
          <th style="width: 25px">Datos</th>

                    


                    </tr>
                  </thead>
                    <tbody>
                      <?php foreach($data as $resul){ ?>
                 
                    <tr>
              <td style="width: 10px" >
              <?= $resul->region_equipo; ?></td>
              <td style="width: 10px" >
              <?= $resul->estado_equipo; ?></td>
              <td style="width: 10px" >
              <?= $resul->central_sise; ?></td>
              <td style="width: 5px" >
              <?= $resul->codigo_contable; ?></td>
              <td style="width: 25px" >
                   <table >
            <tr>
         <td>
               Suma de INSTALADOS: <?= $resul->total_instalados; ?>
              </td>       
            </tr>
             <tr>
              <td>Suma de ACTIVOS: 

                  <?php


                      if($resul->total_activos > $resul->total_instalados){

            $resul_neg = $resul->total_activos - $resul->total_instalados;
        echo  $resul->total_activos = $resul->total_activos - $resul_neg; 



    
    }else{


if($resul->total_disp < 0){


$sub = $resul->total_instalados - $resul->total_activos - $resul->total_cortado - $resul->total_construccion;

echo $resul->total_activos = $resul->total_activos + $sub;




}else{

echo $resul->total_activos; 

}

}



        ?>


              </td>       
            </tr>
             <tr>
              <td>
                Suma de CORTADOS: 

                    <?php

                            if($resul->total_cortado == 0){

                                echo $resul->total_cortado = 0; 

                            }else{

                              echo $resul->total_cortado;


                            }





                    ?>







                
              </td>       
            </tr>
            <tr>
              <td>
                Suma de EN CONSTRUCCION: 



                    <?php

                            if($resul->total_construccion == 0){

                                echo $resul->total_construccion = 0; 

                            }else{

                              echo $resul->total_construccion;


                            }





                    ?>


               
              </td>       
            </tr>
            <tr>
              <td>
                Suma de DISP/RSV/FALLA :

                  <?php 

     if($resul->total_disp < 0){


$sub = $resul->total_instalados - $resul->total_activos - $resul->total_cortado - $resul->total_construccion;

$sub2 = $resul->total_activos + $sub;


echo $resul->total_disp = $resul->total_instalados - $sub2 - $resul->total_cortado - $resul->total_construccion;


}else{

echo $resul->total_disp;

}


                  ?>


              </td>       
            </tr>
          </table>
              </td>

                 
                      

                      



                    </tr>
                    
                    <?php  } ?>
                    




                  </tbody>

                  </table>
<BR/>

           <table class="table table-bordered" >
                  <thead>
       
                  </thead>
                    <tbody>
                      <?php foreach($data2 as $resul2){ ?>
                 
                    <tr>


      <td style="width: 10px" > Total suma de INSTALADOS </td>    
      <td style="width: 10px" > <?= $resul2->total_instalados; ?>  </td>

                    
                                    

                  </tr>
                    

       <tr>


      
      <td style="width: 10px" >  Total suma de ACTIVOS </td>      
      <td style="width: 10px" > <?= $resul2->total_activos; ?>  </td>

                    
                                    

                  </tr>

       <tr>


      
      <td style="width: 10px" >  Total suma de CORTADOS </td>      
      <td style="width: 10px" > <?= $resul2->total_cortados; ?>  </td>

                    
                                    

                  </tr>

                         <tr>


      
      <td style="width: 10px" > Total suma de EN CONSTRUCCION  </td>       
      <td style="width: 10px" > <?= $resul2->total_construccion; ?>  </td>

                    
                                    

                  </tr>


                         <tr>


      
      <td style="width: 10px" >  Total suma de DISP/RSV/FALLA </td>       
      <td style="width: 10px" > <?= $resul2->total_disp; ?>  </td>

                    
                                    

                  </tr>

                    <?php  } ?>
                    




                  </tbody>

                  </table>














                </div><!-- /.box-body -->

                
                <div class="box-footer clearfix">


                  <h5><b>

IMPORTANTE: La Información reflejada en este reporte es netamente adminitrativa y refenrencial,siempre debe ser verificada contra el gestor. Esto se debe a que, de momento, no hay forma de detectar las reservas realizadas directamente sobre el gestor (proyecto SIMA por ejemplo) o los puertos con etiqueta de falla. Tampoco se puede saber si existe disponibilidad de varios puertos consecutivos para dar velocidades superiores a los 4 MB.
                  </b></h5>
                 
<center>
  
 Copyleft | Compañía Anónima Nacional Teléfonos de Venezuela 

</center>
                 
                </div>
              </div><!-- /.box -->

              
            </div>


	
</body>
</html>


