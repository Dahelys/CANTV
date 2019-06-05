<?php

namespace reporte_red_datos_cantv;
use Storage;
use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
class spl extends Model
{
// $table contiene el nombre de la tabla a cargar    
    protected $table = "spls";

// recibe nombre del archivo
    protected $fillable = ['path'];

public function setPathAttribute($path){


$name_original = $path->getClientOriginalName();

$this->attributes['path'] = $name_original;

$Fecha = spl::ExtraerFecha($name_original);

//Almacena en la Ruta definida en el archivo config/filesystems
\Storage::disk('local')->put($name_original, \File::get($path));
//la variable Dir contiene la ruta de almacenamiento de archivos 

$dir = "C:/xampp/htdocs/reporte_red_datos_cantv/public/spls/";


//la variable archivo concatena "junta" la ruta en dir con el nombre del archivo en $name

$archivo = $dir.$name_original;


// Se realiza un reseteo en la table 
//spl_sise para la carga de nuevos datos
DB::table("spl_sise")->truncate();


spl::LeerArchivo($archivo, $Fecha);


    
} // Cierre de la Funcion 


//------------------------------------------------


public static function ExtraerFecha($name_original){

// Se extrae la Fecha del nombre del SPL
$extFecha = substr($name_original, -10, 6); 
// Se extrae de la Fecha el Dia
$extDia = substr($extFecha, -6, 2);
// Se extrae de la Fecha el Mes
$extMes = substr($extFecha, -4, 2);
// Se extrae de la Fecha el año
$extAnual = substr($extFecha, -2);

// Se contatenan las extracciones para formar la fecha
return $fecha = "20".$extAnual.'-'.$extMes.'-'.$extDia;

}

//-------------------------------------------------

// Validar Arhivo Repetido

public static function ValidarArchivo($name_original){

$comparar = DB::table('spls')->where('path', $name_original)->first();

//Describe el nombre del archivo completo

if($comparar){

return 0;

}else{

return 1;

}

}//Cierre de funcion

//------------------------------------------------

public static function LeerArchivo($archivo, $Fecha){

// se inicializa $registros como un arreglo

$registros = array();


$fecha = $Fecha;

//Se procede abrir el spl con la ruta establecida en la variable $archivo

if (($fichero = fopen($archivo, "r")) !== FALSE) {
    // Lee los nombres de los campos
    $nombres_campos = fgetcsv($fichero, 0, "|", "\"", "\"");
    $num_campos = count($nombres_campos);



    // Lee los registros
    while (($datos = fgetcsv($fichero, 0, "|", "\"", "\"")) !== FALSE) {
        // Crea un array asociativo con los nombres y valores de los campos
        for ($icampo = 0; $icampo < $num_campos; $icampo++) {
            $registro[$nombres_campos[$icampo]] = $datos[$icampo];
        }
        // Añade el registro leido al array de registros
        $registros[] = $registro;
    }
    fclose($fichero);



// Iniciar ciclo for como limite la cantidad de registros en el spl
for ($i = 0; $i < count($registros); $i++) {


// Encapsular los array en variables cortas
 $registro = $registros[$i]["Registro"];
 $orden = $registros[$i]["Orden_Servicio"];
 $cliente = $registros[$i]["Cliente"];
 $identificador = $registros[$i]["Identificador_Metro"];
 $tiposervicio = $registros[$i]["Tipo Servicio Metro"];
 $tipoplan = $registros[$i]["Tipo Plan Metro"];
 $Velocidad = $registros[$i]["Velocidad Metro"];
 $centralcircuito = $registros[$i]["Central+Circuito"]; 
 $central = $registros[$i]["Central"];
 $nom_central = $registros[$i]["Nombre_Central"]; 
 $tipocomponente = $registros[$i]["Tipo_Componente"];
 $status_instalacion = $registros[$i]["Status_Instalacion"];
 $nom_nodo = $registros[$i]["Nombre_Nodo"];
 $tipo_nodo = $registros[$i]["Tipo_Nodo"];
 $tipo_tarjeta = $registros[$i]["Tipo_Tarjeta"];
 $nombre_tarjeta = $registros[$i]["Nombre_Tarjeta"];
 $slot = $registros[$i]["Slot"];
 $puerto = $registros[$i]["Puerto"];


// Arrays Convertidos

$registro = spl::Conversion_Codificacion($registro);
$orden = spl::Conversion_Codificacion($orden);
$cliente = spl::Conversion_Codificacion($cliente);
$identificador = spl::Conversion_Codificacion($identificador);
$tiposervicio = spl::Conversion_Codificacion($tiposervicio);
$tipoplan = spl::Conversion_Codificacion($tipoplan);
$Velocidad = spl::Conversion_Codificacion($Velocidad);
$centralcircuito = spl::Conversion_Codificacion($centralcircuito); 
$central = spl::Conversion_Codificacion($central);
$nom_central = spl::Conversion_Codificacion($nom_central); 
$tipocomponente = spl::Conversion_Codificacion($tipocomponente);
$status_instalacion = spl::Conversion_Codificacion($status_instalacion);
$nom_nodo = spl::Conversion_Codificacion($nom_nodo);
$tipo_nodo = spl::Conversion_Codificacion($tipo_nodo);
$tipo_tarjeta = spl::Conversion_Codificacion($tipo_tarjeta);
$nombre_tarjeta = spl::Conversion_Codificacion($nombre_tarjeta);
$slot = spl::Conversion_Codificacion($slot);
$puerto = spl::Conversion_Codificacion($puerto);

//Array con Reemplazo de Caracteres Desconocidos

$nom_nodo = spl::Reemplazar_caracter($nom_nodo);
$nom_nodo = spl::Reemplazar_palabra($nom_nodo);

//Llamado al conteo de puertos

$cant_puerto = spl::Contar_puertos($puerto);



spl::Registrar_sise($registro, $orden, $cliente, $identificador, 
    $tiposervicio, $tipoplan, $Velocidad, $centralcircuito, 
    $central, $nom_central, $tipocomponente, $status_instalacion, 
    $nom_nodo, $tipo_nodo, $tipo_tarjeta, $nombre_tarjeta, $slot, 
    $puerto, $cant_puerto, $fecha);


}// Cierre del FOR
  
}//Cierre del Ciclo IF
}//Cierre de la funcion 


//-------------------------------------------------

// Cambio de Codificacion


public static function Conversion_Codificacion($codificado_ansi){
  
return $codificado_utf8 = mb_convert_encoding($codificado_ansi, "WINDOWS-1252", "UTF-8");


}//Cierre de la funcion


//-------------------------------------------------


public static function Reemplazar_caracter($cadena_erronea){

return $cadena_arreglada = str_replace("?", "Ñ", $cadena_erronea);

}// Cierre de la Funcion

public static function Reemplazar_palabra($cadena_erronea){

return $cadena_arreglada = str_replace("UREÑA", "URENA", $cadena_erronea);


}// Cierre de la funcion

//-------------------------------------------------


// Conteo de Puertos

public static function Contar_puertos($puerto){

	$delimitadores = array("-*",",","-","|",":",".","Y","y","*","/",";");

	$leer = str_replace($delimitadores, $delimitadores[0], $puerto);
	$resultado = explode($delimitadores[0],$leer);

	if($puerto == NULL){

		return $cantidad_puertos = 0;

	}else{

	$delimitador_extrano = "AL";

		$contiene_al = strpos($puerto, $delimitador_extrano);

		if($contiene_al === FALSE){

			$delimitador_extrano = "-Y";

			$contiene_al = strpos($puerto, $delimitador_extrano);

					if($contiene_al === FALSE){

							return $cantidad_puertos = count($resultado);

					}else{

							return $cantidad_puertos = 3;

					}

		}else{
			
			return $cantidad_puertos = 4;

		}// Segundo IF 

		

	}// Primer IF


}//Cierre de la funcion

//------------------------------------------------

// Registro de los datos del SPL en la BD

public static function Registrar_sise($registro, $orden, $cliente, $identificador, 
    $tiposervicio, $tipoplan, $Velocidad, $centralcircuito, 
    $central, $nom_central, $tipocomponente, $status_instalacion, 
    $nom_nodo, $tipo_nodo, $tipo_tarjeta, $nombre_tarjeta, $slot, 
    $puerto, $cant_puerto, $fecha){

// Insertar datos convertidos en la tabla spl_sise
DB::insert('insert into spl_sise (registro, orden_servicio, cliente, identificador_metro, tipo_servicio_metro, tipo_plan_metro, velocidad_metro, central_circuito, central, nombre_central, tipo_componente, status_instalacion, nombre_nodo, tipo_nodo, tipo_tarjeta, nombre_tarjeta, slot, puerto, cantidad_puertos,fecha_spl) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
    
[$registro, $orden, $cliente, $identificador, 
    $tiposervicio, $tipoplan, $Velocidad, $centralcircuito, 
    $central, $nom_central, $tipocomponente, $status_instalacion, 
    $nom_nodo, $tipo_nodo, $tipo_tarjeta, $nombre_tarjeta, $slot, 
    $puerto, $cant_puerto, $fecha]);



}//Cierre de la Funcion




//-------------------------------------------------

}// Cierre de la clase







