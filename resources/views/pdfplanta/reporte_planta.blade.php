<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte Planta Existente</title>




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
     <img src="./img/cabezal_bolivariano_mppeuct_Zamora_2017.jpg" width="100%" height="10%" />






                <div class="box-header with-border">

<center>
  <h3 class="box-title">
    Reporte Planta existente | <?=  $date; ?> |  Autor: 
    <?=  Auth::user()->user_name;?> 
    <?=  Auth::user()->apellido;?>
  </h3>

</center>
        
                </div><!-- /.box-header -->
                <div class="box-body">




                  <table class="table table-bordered" >
             <thead>
                     <tr>
                      <th style="width: 20px">Dirección IP</th>
                      <th style="width: 20px">Nombre del Nodo</th>
                      <th style="width: 20px">Puerto ATM/FR</th>
                     <th style="width: 20px">Puerto Metro</th>
                      <th style="width: 20px">Marca</th>
                      <th style="width: 20px">Modelo</th>
                      <th style="width: 20px">Región</th>
                      <th style="width: 20px">Estado</th>
                     <th style="width: 20px">Central</th>
                      <th style="width: 20px">Codigo Contable</th>
                     <th style="width: 20px">Tipo</th>

                     


                    


                    </tr>
                  </thead>
                    <tbody>
                      <?php foreach($data as $pais){ ?>
                 
                    <tr>
                      <td style="width: 20px" ><?= $pais->dir_ip; ?></td>
                 
                      <td style="width: 20px"><?=  $pais->equipo; ?></td>
                     
                      <td style="width: 20px"><?= $pais->puerto_atm_fr; ?></td>
                      <td style="width: 20px"><?= $pais->puerto_metro; ?></td>
                      <td style="width: 20px"><?= $pais->marca_equipo; ?></td>
                      <td style="width: 20px" ><?= $pais->modelo_equipo; ?></td>
                 
                      <td style="width: 20px"><?=  $pais->region_equipo; ?></td>
                     <td style="width: 20px"><?=  $pais->estado_equipo; ?></td>

                     
                      <td style="width: 20px"><?= $pais->central_sise; ?></td>
                      <td style="width: 20px"><?= $pais->codigo_contable; ?></td>
                      <td style="width: 20px"><?= $pais->tipo_puerto; ?></td>
                    
                      

                      



                    </tr>
                    
                    <?php  } ?>
                    
                 
                  </tbody>

                  </table>
                </div><!-- /.box-body -->

                
                <div class="box-footer clearfix">
                 
<center>
  
 Copyleft | Compañía Anónima Nacional Teléfonos de Venezuela 

</center>
                 
                </div>
              </div><!-- /.box -->

              
            </div>


	
</body>
</html>


