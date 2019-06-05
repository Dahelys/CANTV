<?php

namespace reporte_red_datos_cantv;

use Illuminate\Database\Eloquent\Model;
use DB;

class Planta extends Model
{
    protected $table = 'plantas';

  
    public $timestamps = false;

    protected $fillable = ['dir_ip','equipo','puerto_atm_fr','puerto_metro', 'marca_equipo','modelo_equipo','region_equipo','estado_equipo','central_sise','codigo_contable','tipo_puerto','fecha_planta'];

public function scopeSearch($query, $dir_ip)
	{
    $date = date('Y-m');
		return $query

          ->where('dir_ip', 'LIKE', "%${dir_ip}%")
          
					->orWhere( 'equipo', 'LIKE', "%${dir_ip}%")
          
          ->orWhere( 'marca_equipo', 'LIKE', "%${dir_ip}%")
          ->orWhere( 'estado_equipo', 'LIKE', "%${dir_ip}%")
          ->orWhere( 'modelo_equipo', 'LIKE', "%${dir_ip}%")
          ->orWhere( 'region_equipo', 'LIKE', "%${dir_ip}%")
          ->orWhere( 'central_sise', 'LIKE', "%${dir_ip}%")
          ->orWhere( 'codigo_contable', 'LIKE', "%${dir_ip}%")
           ->orWhere( 'tipo_puerto', 'LIKE', "%${dir_ip}%")
          

          ;
	}
 public function users()
      {
        return $this->hasMany('reporte_red_datos_cantv\Planta', 'dir_ip', 'equipo');
      }


public static function insert_estado_planta($dir_ip, $atm, $metro, $fecha){


DB::insert('insert into estado_nodos_planta (dir_ip, puerto_atm_fr, puerto_metro, fecha_planta) values (?, ?, ?, ?)', 
    
[$dir_ip, $atm, $metro, $fecha]);



}


public static function val_ip($dir_ip, $equipo){

$sql = "SELECT * FROM plantas where dir_ip= '$dir_ip'";

    $plantas = DB::select($sql);

    if($plantas){

$sql1 = "SELECT * FROM plantas where dir_ip= '$dir_ip' and equipo ='$equipo'";

$plantas1 = DB::select($sql1);

if($plantas1){

     return False;

}else{

      return True;

}

   
}else{

        return False;

}


}




public static function update_estado_planta($dir_ip, $atm, $metro, $fecha){
 
$sql = "UPDATE estado_nodos_planta 
SET puerto_atm_fr = '$atm', puerto_metro= '$metro'
WHERE dir_ip ='$dir_ip' 
AND fecha_planta::text LIKE '${fecha}%'";

return $d = DB::statement($sql);

}

public static function updatePlanta(){

$dia = date('d');
$mesActual = date('Y-m');

if($dia == 18){

$sql = "SELECT fecha_planta FROM estado_nodos_planta ORDER BY id_estado_planta DESC LIMIT 1";
$fechas = DB::select($sql);

foreach ($fechas as $fecha) {
    $fecha = $fecha->fecha_planta; 
}//Fin del primer foreach

$extMes = substr($fecha, -10, 7);


if($extMes != $mesActual){

$sql2 = "SELECT dir_ip, puerto_atm_fr, puerto_metro, current_date as fecha_planta 
FROM estado_nodos_planta WHERE fecha_planta::text LIKE '${extMes}%' ";

$estados = DB::select($sql2);

foreach($estados as $estado){

$res1 = $estado->dir_ip; 
$res2 = $estado->puerto_atm_fr; 
$res3 = $estado->puerto_metro;
$res4 = $estado->fecha_planta;

$insert = DB::insert('insert into estado_nodos_planta (dir_ip, puerto_atm_fr, puerto_metro, fecha_planta) values (?,?,?,?)', 
[$res1, $res2, $res3, $res4]);

}// Fin del segundo foreach

return true;


}else{

return false;
  
}





} 


}//cierre de la funcion


public static function consultar_nombre(){


  
}






}
