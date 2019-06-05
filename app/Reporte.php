<?php

namespace reporte_red_datos_cantv;

use Illuminate\Database\Eloquent\Model;
use DB;

class Reporte extends Model
{
    


public static function verificar_migraciones(){

   $f = Reporte::consul_fe_spl();

if($f == 4){

    return true;

}

$fecha2 = "SELECT fecha_spl FROM orden WHERE fecha_spl=? limit 1";
$fecha_2 = DB::select($fecha2 , array($f));

   if($fecha_2){

      return true;

   }else{


      return false;

        
   }




   


 






}//Cierre de la funcion





//---------------------------------------------
// Migracion de Clientes 

public static function migracion_automatica_cliente(){

//reinicio de tabla para actualizar datos
DB::table("cliente")->truncate();


$sql = "SELECT distinct cliente FROM spl_sise WHERE cliente IS NOT NULL ORDER BY cliente ASC";


$clientes = DB::select($sql);

foreach ($clientes as $cliente) {
    
    $cliente = $cliente->cliente;

     DB::insert('insert into cliente (cliente) values (?)', 
    
    [$cliente]);


}//fin del ciclo


}// Fin de la funcion



//-----------------------------------------------------------

public static function migracion_automatica_servicio(){

//reinicio de tabla para actualizar datos
DB::table("servicio")->truncate();


$sql = "SELECT distinct tipo_servicio_metro FROM spl_sise ORDER BY tipo_servicio_metro ASC";


$servicios = DB::select($sql);

foreach ($servicios as $servicio) {
    
    $servicio = $servicio->tipo_servicio_metro;

     DB::insert('insert into servicio (servicio) values (?)', 
    
    [$servicio]);


}//fin del ciclo


}// Fin de la funcion

//--------------------------------------------------------


public static function migracion_automatica_plan(){

//reinicio de tabla para actualizar datos
DB::table("plan")->truncate();


$sql = "SELECT distinct tipo_plan_metro FROM spl_sise ORDER BY tipo_plan_metro ASC;";


$planes = DB::select($sql);

foreach ($planes as $plan) {
    
    $plan = $plan->tipo_plan_metro;

     DB::insert('insert into plan (plan) values (?)', 
    
    [$plan]);


}//fin del ciclo


}// Fin de la funcion



//---------------------------------------------------------



public static function migracion_automatica_velocidad(){

//reinicio de tabla para actualizar datos
DB::table("velocidad")->truncate();


$sql = "SELECT distinct velocidad_metro FROM spl_sise ORDER BY velocidad_metro DESC";


$velocidades = DB::select($sql);

foreach ($velocidades as $velocidad) {
    
    $velocidad = $velocidad->velocidad_metro;

     DB::insert('insert into velocidad (velocidad) values (?)', 
    
    [$velocidad]);


}//fin del ciclo


}// Fin de la funcion

//--------------------------------------------------------


public static function migracion_automatica_status(){

//reinicio de tabla para actualizar datos
DB::table("estado_instalacion")->truncate();


$sql = "SELECT distinct status_instalacion FROM spl_sise ORDER BY status_instalacion ASC";


$estados = DB::select($sql);

foreach ($estados as $estado) {
    
    $estado = $estado->status_instalacion;

     DB::insert('insert into estado_instalacion (estado_ins) values (?)', 
    
    [$estado]);


}//fin del ciclo


}// Fin de la funcion

//---------------------------------------------------------



public static function migracion_automatica_tipo_nodo(){

//reinicio de tabla para actualizar datos
DB::table("tipo_nodo")->truncate();


$sql = "SELECT distinct tipo_nodo FROM spl_sise ORDER BY tipo_nodo ASC";





$tipo_nodos = DB::select($sql);

foreach ($tipo_nodos as $nodo) {
    
   $tipo = $nodo->tipo_nodo;

     DB::insert('insert into tipo_nodo (tipo_nodo_sise) values (?)', 
    
    [$tipo]);


}//fin del ciclo


}// Fin de la funcion


//-----------------------------------------------------------

public static function migracion_automatica_tipo_tarjeta(){

//reinicio de tabla para actualizar datos
DB::table("tipo_tarjeta")->truncate();


$sql = "SELECT distinct tipo_tarjeta FROM spl_sise ORDER BY tipo_tarjeta ASC";


$tipo_tarjetas = DB::select($sql);

foreach ($tipo_tarjetas as $tarjeta) {
    
   $tipo_tarjeta = $tarjeta->tipo_tarjeta;

     DB::insert('insert into tipo_tarjeta (tipo_tarjeta) values (?)', 
    
    [$tipo_tarjeta]);


}//fin del ciclo


}// Fin de la funcion

//-----------------------------------------------------------


public static function migracion_automatica_central(){

//reinicio de tabla para actualizar datos
DB::table("central")->truncate();


$sql = "SELECT distinct central, nombre_central FROM spl_sise ORDER BY central ASC;";


$centrales = DB::select($sql);

foreach ($centrales as $central) {
    
   $cen = $central->central;
   $nomcentral = $central->nombre_central;


     DB::insert('insert into central (central, nombre_central) values (?, ?)', 
    
    [$cen, $nomcentral]);


}//fin del ciclo


}// Fin de la funcion

public static function consul_fe_spl(){

$consul_spl = "SELECT fecha_spl FROM spl_sise LIMIT 1";

$spls = DB::select($consul_spl);

foreach ($spls as $spl) {
  

    $fe = $spl->fecha_spl;


}//foreach



if(isset($fe)){
    return $fe;
}else{
    return 4;
}

    







}











//---------------------------------------------------------

/*
|   FUNCION PARA MIGRAR NODOS
*/


public static function migracion_automatica_nodos(){

$fe = Reporte::consul_fe_spl();


$sql = "SELECT distinct equipo FROM plantas";


$nodos = DB::select($sql);

foreach ($nodos as $nodo) {
    
   $nod = $nodo->equipo;
   


     DB::insert('insert into nodos_sise (nombre, fecha_spl) values (?, ?)', 
    
    [$nod, $fe]);


}//fin del ciclo


}// Fin de la funcion

//---------------------------------------------------------

/*
|   FUNCION PARA MIGRAR ORDENES
*/

public static function migracion_automatica_ordenes(){


$sql = "
SELECT distinct s.registro, s.orden_servicio , c.id_cliente, s.fecha_spl FROM cliente as c 
INNER JOIN spl_sise as s on c.cliente = s.cliente ORDER BY s.registro ASC;

";


$ordenes = DB::select($sql);

foreach ($ordenes as $orden) {
    
   $registro = $orden->registro;
   $or = $orden->orden_servicio;
   $cliente = $orden->id_cliente;
   $fe = $orden->fecha_spl;


     DB::insert('insert into orden (registro, orden_servicio, id_cliente, fecha_spl)  values (?, ?, ?, ?)', 
    
    [$registro, $or, $cliente, $fe]);


}//fin del ciclo


}// Fin de la funcion

//-------------------------------------------------------

/*
|   FUNCION PARA MIGRAR DETALLES DE LA ORDEN
*/

public static function migracion_automatica_detalle_orden(){


$fecha = "SELECT fecha_spl FROM spl_sise limit 1";

$fechas = DB::select($fecha);

foreach ($fechas as $fecha) {
    
   $f = $fecha->fecha_spl;

   $sql = "
SELECT o.id_order, ser.id_servicio, plan.id_plan, velo.id_velocidad, cen.central, nd.id_nodo, status.id_estado, tp.id_tipo_nodo, tar.id_tipo_tarjeta, s.nombre_tarjeta, s.slot, s.puerto, s.cantidad_puertos FROM reporte_red_datos_cantv.spl_sise AS s
INNER JOIN orden AS o ON s.registro = o.registro
INNER JOIN servicio AS ser ON s.tipo_servicio_metro = ser.servicio
INNER JOIN plan AS plan ON s.tipo_plan_metro = plan.plan
INNER JOIN velocidad AS velo ON s.velocidad_metro = velo.velocidad
INNER JOIN central AS cen ON s.central = cen.central
INNER JOIN nodos_sise AS nd ON s.nombre_nodo = nd.nombre
INNER JOIN estado_instalacion AS status ON s.status_instalacion = status.estado_ins
INNER JOIN tipo_tarjeta AS tar ON s.tipo_tarjeta = tar.tipo_tarjeta
INNER JOIN tipo_nodo AS tp ON s.tipo_nodo = tp.tipo_nodo_sise WHERE nd.fecha_spl = ?

";

$detalles = DB::select($sql, array($f));

foreach ($detalles as $detalle) {
    
  $det1 = $detalle->id_order;
  $det2 = $detalle->id_servicio;
  $det3 = $detalle->id_plan;
  $det4 = $detalle->id_velocidad;
  $det5 = $detalle->central;
  $det6 = $detalle->id_nodo;
  $det7 = $detalle->id_estado;
  $det8 = $detalle->id_tipo_nodo;
  $det9 = $detalle->id_tipo_tarjeta;
  $det10 = $detalle->nombre_tarjeta;
  $det11 = $detalle->slot;
  $det12 = $detalle->puerto;
  $det13 = $detalle->cantidad_puertos;
  



DB::insert('insert into detalle_orden (id_order, id_servicio, id_plan, id_velocidad, central, id_nodo, id_status, id_tipo_nodo, id_tipo_tarjeta, nombre_tarjeta, slot, puerto, cantidad_puertos)  values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
    
[$det1, $det2, $det3, $det4, $det5, $det6, $det7, $det8, $det9, $det10, $det11, $det12, $det13]);


}//fin del ciclo







}//fin del ciclo


}// Fin de la funcion


//---------------------------------------------------------------

/*
|   FUNCION PARA TOTALIZAR LOS PUERTOS POR CADA NODO
*/

public static function totalizar_puerto_por_nodo(){






$sql = "SELECT DISTINCT nombre_nodo, fecha_spl FROM spl_sise ORDER BY nombre_nodo ASC";

$nodos = DB::select($sql);


foreach ($nodos as $nodo) {

// Activos

$sql2 = "SELECT sum(cantidad_puertos) AS total, nombre_nodo, fecha_spl FROM 
(
SELECT DISTINCT(registro), cantidad_puertos, nombre_nodo, fecha_spl
FROM spl_sise
WHERE nombre_nodo=? AND status_instalacion=? AND fecha_spl=?) 
AS tabla GROUP BY nombre_nodo, fecha_spl";

$nodos_2 = DB::select($sql2, array($nodo->nombre_nodo,'ACTIVO', $nodo->fecha_spl));

foreach ($nodos_2 as $nodo2) {

$sql3 = "UPDATE nodos_sise SET activo = '$nodo2->total'
WHERE nombre ='$nodo2->nombre_nodo' AND fecha_spl='$nodo2->fecha_spl'";
DB::statement($sql3);


}// Cierre Foreach

// |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||


// Cortados

$sql4  = "SELECT sum(cantidad_puertos) AS total, nombre_nodo, fecha_spl FROM 
(
SELECT DISTINCT(registro), cantidad_puertos, nombre_nodo, fecha_spl
FROM spl_sise
WHERE nombre_nodo=? AND status_instalacion=? AND fecha_spl=?) 
AS tabla GROUP BY nombre_nodo, fecha_spl";

$nodos_4 = DB::select($sql4, array($nodo->nombre_nodo,'CORTADO', $nodo->fecha_spl));

foreach ($nodos_4 as $nodo4) {
 

$sql5 = "UPDATE nodos_sise SET cortado = '$nodo4->total'
WHERE nombre ='$nodo4->nombre_nodo' AND fecha_spl='$nodo4->fecha_spl'";
DB::statement($sql5);


 
}

// |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

// En contruccion

$sql6  = "SELECT sum(

cantidad_puertos) AS total, nombre_nodo, fecha_spl FROM 
(
SELECT DISTINCT(registro), cantidad_puertos, nombre_nodo, fecha_spl
FROM spl_sise
WHERE nombre_nodo=? AND status_instalacion=? AND fecha_spl=?) 
AS tabla GROUP BY nombre_nodo, fecha_spl";

$nodos_6 = DB::select($sql6, array($nodo->nombre_nodo,'EN CONSTRUCCION', $nodo->fecha_spl));

foreach ($nodos_6 as $nodo6) {
$sql7 = "UPDATE nodos_sise SET en_construccion = '$nodo6->total'
WHERE nombre ='$nodo6->nombre_nodo' AND fecha_spl='$nodo6->fecha_spl' ";
DB::statement($sql7);
}

// |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
}// Foreach Principal
}//Cierre de la funcion


//--------------------------------------------------------------



public static function datos_reporte($fecha, $tipo){

$f = $fecha;
$t = $tipo;

if($t === 'TODAS'){

$sql = "SELECT region_equipo, estado_equipo, central_sise, codigo_contable, 
total_instalados, total_activos, total_cortado, total_construccion, total_disp  
FROM data_reporte_total 
WHERE  fecha_planta::text LIKE '${f}%' AND fecha_spl::text LIKE '${f}%'
ORDER BY region_equipo, estado_equipo, central_sise";


return $resultados = DB::select($sql);


}else{

$sql = "SELECT region_equipo, estado_equipo, central_sise, codigo_contable, 
total_instalados, total_activos, total_cortado, total_construccion, total_disp  
FROM data_reporte 
WHERE tipo_puerto = '${t}' AND  fecha_planta::text LIKE '${f}%' AND fecha_spl::text LIKE '${f}%'
ORDER BY region_equipo, estado_equipo, central_sise";

return $resultados = DB::select($sql);

}


}//Cierre de la funcion

//--------------------------------------------------------------


public static function reporte_totalizado($fecha, $tipo){


$f = $fecha;
$t = $tipo;

if($t === 'TODAS'){

$sql = "SELECT sum(total_instalados) as total_instalados, sum(total_activos) as total_activos, sum(total_cortado) as total_cortados, sum(total_construccion) as total_construccion
, sum(total_disp) as total_disp
FROM data_reporte_total 
WHERE fecha_planta::text LIKE '${f}%' AND fecha_spl::text LIKE '${f}%'";


return $resultados = DB::select($sql);


}else{

$sql = "SELECT sum(total_instalados) as total_instalados, sum(total_activos) as total_activos, sum(total_cortado) as total_cortados, sum(total_construccion) as total_construccion
, sum(total_disp) as total_disp
FROM data_reporte 
WHERE tipo_puerto = '${t}' AND fecha_planta::text LIKE '${f}%' AND fecha_spl::text LIKE '${f}%'";


return $resultados = DB::select($sql);
}

}//Cierre de la funcion


//---------------------------------------------------------------


public static function data_reporte_estado($fecha, $tipo){

$t = $tipo;
$f = $fecha;


if($t == 'TODAS'){

$sql = "SELECT estado_equipo, sum(total_instalados) as total_instalados, sum(total_activos) as total_activos, sum(total_cortado) as total_cortado, sum(total_construccion) as total_construccion, sum(total_disp) as total_disp
FROM reporte_red_datos_cantv.data_reporte_estado
WHERE fecha_planta::text LIKE '${f}%' AND fecha_spl::text LIKE '${f}%' GROUP BY estado_equipo ORDER BY estado_equipo";


return $centrales = DB::select($sql);



}else{

$sql = "SELECT estado_equipo, total_instalados, total_activos, total_cortado, total_construccion, total_disp 
FROM reporte_red_datos_cantv.data_reporte_estado 
WHERE tipo_puerto = '${t}' AND fecha_planta::text LIKE '${f}%' AND fecha_spl::text LIKE '${f}%'
ORDER BY estado_equipo";

return $centrales = DB::select($sql);

}




}//Cierre de la funcion

//----------------------------------------------------------

public static function data_reporte_region($fecha, $tipo){

$t = $tipo;
$f = $fecha;

if($t == 'TODAS'){

$sql = "SELECT region_equipo, sum(total_instalados) as total_instalados, sum(total_activos) as total_activos, sum(total_cortado) as total_cortado, sum(total_construccion) as total_construccion, sum(total_disp) as total_disp
FROM reporte_red_datos_cantv.data_reporte_region
WHERE fecha_planta::text LIKE '${f}%' AND fecha_spl::text LIKE '${f}%' GROUP BY region_equipo ORDER BY region_equipo";


return $centrales = DB::select($sql);


}else{

$sql = "SELECT region_equipo, total_instalados, total_activos, total_cortado, total_construccion, total_disp 
FROM reporte_red_datos_cantv.data_reporte_region 
WHERE tipo_puerto = '${t}' 
AND fecha_planta::text LIKE '${f}%' AND fecha_spl::text LIKE '${f}%'
ORDER BY region_equipo";

return $centrales = DB::select($sql);

}






}//Cierre de la funcion 



public static function validar_fecha($fecha){

$f = $fecha;

$sql = "SELECT fecha_spl FROM orden WHERE fecha_spl::text LIKE '${f}%' LIMIT 1";

$res = DB::select($sql);

if($res){

return true;

}else{

return false;

}

}













//-------------------------------------------------------------
}//Cierre de la Clase
