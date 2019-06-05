@extends('plantillas.admin')
@extends('plantillas.menu')
@section('content')


<!-- Page Content -->
<div class="container">
  <script src="js/sistemalaravel.js"></script>

   <script>cargarlistado(1);</script>
<br>
<br>
<br>
<br>
<center>

<h3>REPORTE PLANTA EXISTENTE</h3>

</center>

<br>
                   
                  </div >
                </div><!-- /.box-header -->
                <center>




   <center>
         
       <img src="{{URL::asset('img/icon_pdf.png')}}" alt="profile Pic" height="200px" width="200px" id="file">            

</center>      
          





                
                <div class="form-group">
                  <table class="table table-hover">
                   
                    <thead><tr>
                      <th>ID</th>
                      <th>Reporte</th>
                      <th>Ver</th>
                      <th>Descargar</th>
                    </tr></thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Reporte de Planta Existente</td>
                      <td><a href="crear_reporte_planta/1" target="_blank"><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>
                      <td><a href="crear_reporte_planta/2" target="_blank"><button class="btn btn-block btn-success btn-xs">Descargar</button></a></td>
                    
                    </tr>
                   
                  </tbody></table>
                </div><!-- /.box-body -->
              </center>
              </div><!-- /.box -->
            </div>
 </div>