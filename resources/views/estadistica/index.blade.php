@extends('plantillas.admin')
@extends('plantillas.menu')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{Session::get('message')}}
</div>
@endif
@section('content')

 
  
<!--///////////////// GRAFICOS //////////////////-->

  {!!Html::script('graficas/js/highcharts.js')!!}
    {!!Html::script('graficas/js/jquery.min.js')!!}
    {!!Html::script('graficas/js/modules/exporting.js')!!}



<!--///////////////////////////////////////////////////////////////////////-->


    <!-- Contenido de la Pagina -->
    
<div class="container">



        <div class="row">
            <div class="col-lg-12">

<br>
<br>
<br>
<br>
             
<center>
    
<h3>Estadísticas del Reporte de Planta G.BIS | <?php echo $tipo1;?></h3>
    
</center>



<a href='{!!URL::to("estadistica/create")!!}' class="btn btn-info" role="button">Regresar a Consulta</a>

<center>

<div id="graf1" style="width: 1200px; height: 600px; margin: 0 auto">
  </div>

</center>



<script type="text/javascript">

Highcharts.chart('graf1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Total de Puertos por Regiones'
    },
    subtitle: {
        text: 'Source: Source: SISE | Planta G.BIS'
    },
    xAxis: {
        categories: [
          <?php
          
              foreach ($datos1 as $dat1) 

              { ?>

                '<?php echo $dat1->region_equipo; ?>',
              <?php

              }
              ?>


        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad de Puertos'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.f} puertos</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Total Instalados',
        data: [
         <?php
    
              foreach ($datos1 as $dat1) 

              { ?>

                <?php echo $dat1->total_instalados; ?>,
              <?php

              }
              ?>

        ]

    }, {
        name: 'Total Activos',
        data: [ <?php
    
              foreach ($datos1 as $dat1) 

              { ?>

                <?php echo $dat1->total_activos; ?>,
              <?php

              }
              ?>]

    }, {
        name: 'Total Cortados',
        data: [

  <?php
    
              foreach ($datos1 as $dat1) 

              { ?>

                <?php 


                  if($dat1->total_cortado == Null){

                  echo 0;

                }else{
                  
                  echo $dat1->total_cortado;
             }









                ?>,
              




              <?php

              }
              ?>




        ]

    }, {
        name: 'Total en Construccion',
        data: [

            <?php
    
              foreach ($datos1 as $dat1) 

              { ?>

                <?php echo $dat1->total_construccion; ?>,
              <?php

              }
              ?>


        ]

    },{
        name: 'Total en DISP/RSV/FAL',
        data: [

            <?php
    
              foreach ($datos1 as $dat1) 

              { ?>

                <?php echo $dat1->total_disp; ?>,
              <?php

              }
              ?>


        ]

    }


    ]
});


    </script>



<hr/>

<center>
  
<div id="graf2" style="width: 1200px; height: 600px; margin: 0 auto">
  </div>

</center>






<script type="text/javascript">

Highcharts.chart('graf2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Total de Puertos por Estados'
    },
    subtitle: {
        text: 'Source: Source: SISE | Planta G.BIS'
    },
    xAxis: {
        categories: [
          <?php
          
              foreach ($datos2 as $dat2) 

              { ?>

                '<?php echo $dat2->estado_equipo; ?>',
              <?php

              }
              ?>


        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad de Puertos'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.f} puertos</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Total Instalados',
        data: [
         <?php
    
              foreach ($datos2 as $dat2) 

              { ?>

                <?php echo $dat2->total_instalados; ?>,
              <?php

              }
              ?>

        ]

    }, {
        name: 'Total Activos',
        data: [ <?php
    
              foreach ($datos2 as $dat2) 

              { ?>

                <?php 



                      if($dat2->total_activos == Null){

                  echo 0;

                }else{
                  
                  echo $dat2->total_activos;
             } 

                ?>,
              <?php

              }
              ?>]

    }, {
        name: 'Total Cortados',
        data: [

  <?php
    
              foreach ($datos2 as $dat2) 

              { ?>

                <?php 


                  if($dat2->total_cortado == Null){

                  echo 0;

                }else{
                  
                  echo $dat2->total_cortado;
             }









                ?>,
              




              <?php

              }
              ?>




        ]

    }, {
        name: 'Total en Construccion',
        data: [

            <?php
    
              foreach ($datos2 as $dat2) 

              { ?>

                <?php 



            if($dat2->total_construccion == Null){

                  echo 0;

                }else{
                  
                  echo $dat2->total_construccion;
             }












                ?>,
              <?php

              }
              ?>


        ]

    },{
        name: 'Total en DISP/RSV/FAL',
        data: [

            <?php
    
              foreach ($datos2 as $dat2) 

              { ?>

                <?php echo $dat2->total_disp; ?>,
              <?php

              }
              ?>


        ]

    }


    ]
});


    </script>



</hr>



<center>

<div id="graf3" style="width: 1200px; height: 600px; margin: 0 auto">
  </div>

</center>

<script type="text/javascript">

Highcharts.chart('graf3', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Total de Puertos'
    },
    subtitle: {
        text: 'Source: Source: SISE | Planta G.BIS'
    },
    xAxis: {
        categories: ['Totales'],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad de Puertos'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.f} puertos</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Total Instalados',
        data: [
         <?php
    
              foreach ($datos3 as $dat3) 

              { ?>

                <?php echo $dat3->total_instalados; ?>,
              <?php

              }
              ?>

        ]

    }, {
        name: 'Total Activos',
        data: [ <?php
    
              foreach ($datos3 as $dat3) 

              { ?>

                <?php echo $dat3->total_activos; ?>,
              <?php

              }
              ?>]

    }, {
        name: 'Total Cortados',
        data: [

  <?php
    
              foreach ($datos3 as $dat3) 

              { ?>

                <?php 


                  if($dat3->total_cortados == Null){

                     echo 0;

                }else{
                  
                  echo $dat3->total_cortados;
             }









                ?>,
              




              <?php

              }
              ?>




        ]

    }, {
        name: 'Total en Construccion',
        data: [

            <?php
    
              foreach ($datos3 as $dat3) 

              { ?>

                <?php echo $dat3->total_construccion; ?>,
              <?php

              }
              ?>


        ]

    },{
        name: 'Total en DISP/RSV/FAL',
        data: [

            <?php
    
              foreach ($datos3 as $dat3) 

              { ?>

                <?php echo $dat3->total_disp; ?>,
              <?php

              }
              ?>


        ]

    }


    ]
});


    </script>


  

</body>

</html>
