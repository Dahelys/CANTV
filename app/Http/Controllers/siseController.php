<?php

namespace reporte_red_datos_cantv\Http\Controllers;

use Illuminate\Http\Request;

use reporte_red_datos_cantv\Http\Requests;
use reporte_red_datos_cantv\Http\Requests\SplRequest;
use reporte_red_datos_cantv\Http\Controllers\Controller;
use reporte_red_datos_cantv\spl;

use Auth;
use Session;
use Redirect;
use reporte_red_datos_cantv\Historial;
use Storage;
use DB;
class siseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

        $this->middleware('auth');
        $this->middleware('especialista');
    } 

    
    public function index()
    {
        $spls = DB::table('spls')->paginate(5);
        $spls->each(function($spls){
            
        });

        return view('sise.consulta_spl',compact('spls'));
        
      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Retorna la Vista
           return view('sise.cargar_spl');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SplRequest $request)
    {

$name =  $request['path'];
$name_original = $name->getClientOriginalName();
$spl = spl::ValidarArchivo($name_original);

 if($spl == 0){

Session::flash('message-error','Spl no cargado, el Spl ya existe');
return redirect('/sise/create');
        

}else{


$cols = 




$a = spl::create($request->all());
         

//--------------------------//
// Funcion para registrar Actividad

    $actividad = 'Registró Exitosamente SPL';
    $id_user = Auth::user()->id;

            Historial::create([
            'actividad'=> $actividad,
            'id_user'=> $id_user
            ]);

            //--------------------------//


Session::flash('message','Spl Cargado Exitosamente');
return redirect('/generar_reporte');




}//Fin del If

    
      
  

}//Cierre de la funcion

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


  

}
