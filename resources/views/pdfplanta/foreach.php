<?php foreach($data as $pais){ ?>
                 
                    <tr>
                      <td style="width: 10px" ><?= $pais->dir_ip; ?></td>
                 
                      <td style="width: 10px"><?=  $pais->equipo; ?></td>
                     
                      <td style="width: 10px"><?= $pais->puerto_atm_fr; ?></td>
                      <td style="width: 10px"><?= $pais->puerto_metro; ?></td>
                      <td style="width: 10px"><?= $pais->marca_equipo; ?></td>
                      <td style="width: 10px" ><?= $pais->modelo_equipo; ?></td>
                 
                      <td style="width: 10px"><?=  $pais->region_equipo; ?></td>
                     <td style="width: 10px"><?=  $pais->estado_equipo; ?></td>

                     
                      <td style="width: 10px"><?= $pais->central_sise; ?></td>
                      <td style="width: 10px"><?= $pais->codigo_contable; ?></td>
                      <td style="width: 10px"><?= $pais->tipo_puerto; ?></td>
                    
                      

                      



                    </tr>
                    
                    <?php  } ?>
                    