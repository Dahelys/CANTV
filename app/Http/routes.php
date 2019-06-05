<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




        //todas mis rutas que necesiten tener el permiso de admin.



//Ruta para el Modulo Sise
Route::resource('sise','siseController');
Route::get('spls/{archivo}', function ($archivo) {
     

     $public_path = public_path('spls');
     $url = $public_path."\\".$archivo;
     //verificamos si el archivo existe y lo retornamos
     if (Storage::exists($archivo))
     {
       return response()->download($url);
     }
     //si no se encuentra lanzamos un error 404.
    // abort(404);
     echo $archivo;
        // echo $url = $public_path."\\".$archivo;

});




Route::get('/', 'controlador_index@index');
Route::get('panel', 'controlador_index@panel');

Route::resource('usuario','UsuarioController');

Route::get('inactivos','UsuarioController@usersinactivos');



Route::resource('log','LogController');
Route::get('logout','LogController@logout');

Route::resource('planta','plantacontroller');
Route::get('reporteplanta', 'pdfplantaController@index');


Route::get('crear_reporte_planta/{tipo}', 'pdfplantacontroller@crear_reporte_planta');





Route::resource('generar_reporte','ReporteController');
Route::resource('Historial','HistorialController');

Route::get('consulta','ReporteController@vista_consulta');

Route::get('consultar_reporte','ReporteController@consultar_reporte');










Route::resource('estadistica','GraficasController');











