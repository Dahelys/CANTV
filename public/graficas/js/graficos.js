

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

                <?php echo $dat1->instalados; ?>,
              <?php

              }
              ?>

        ]

    }, {
        name: 'Total Activos',
        data: [ <?php
    
              foreach ($datos1 as $dat1) 

              { ?>

                <?php echo $dat1->total_activo; ?>,
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


                  if($dat1->total_cortados == Null){

                  echo 0;

                }else{
                  
                  echo $dat1->total_cortados;
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

                <?php echo $dat1->total_en_construccion; ?>,
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

                <?php echo $dat1->total_disp_rsv_falla; ?>,
              <?php

              }
              ?>


        ]

    }


    ]
});



