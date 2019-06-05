<?php

namespace reporte_red_datos_cantv\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use reporte_red_datos_cantv\Historial;
use reporte_red_datos_cantv\Http\Requests;
use reporte_red_datos_cantv\Http\Controllers\Controller;
use DB;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function __construct(){

        $this->middleware('auth');
        $this->middleware('admin');
    } 







    
    public function index(Request $request)
    {

        $var= $request->nick;
        $request->fechaInicial;
        $request->fechaFinal;

        $date = date('Y-m-d');
    

    

if($request->fechaInicial == NULL || $request->fechaFinal == NULL){

  $f1 = $date."  00:00:00";
  $f2 = $date."  23:59:59";

}else{

$f1 = $request->fechaInicial."  00:00:00";
    $f2 = $request->fechaFinal."  23:59:59";


}
        $Actividades = 
   

        DB::table('vista_historial')
       
       ->where('name', 'LIKE', "%${var}%")
       ->whereBetween('created_at', [$f1, $f2])
          ->paginate(6);
        
        $Actividades->each(function($Actividades){
            
        });


        return view('historial.index',compact('Actividades'));
  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

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
