<?php

namespace reporte_red_datos_cantv\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use reporte_red_datos_cantv\Planta;
use reporte_red_datos_cantv\user;

use reporte_red_datos_cantv\Http\Requests;
use Auth;
use reporte_red_datos_cantv\Historial;

class pdfplantacontroller extends Controller
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
        return view("pdfplanta.listareporteplanta");
    }


      public function crearPDF($datos,$vistaurl,$tipo)
    {

        $data = $datos;
        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('data', 'date'))->render();

                     //--------------------------//
            // Funcion para registrar Actividad

    $actividad = 'Consultó Reporte de la Planta de CANTV';
    $id_user = Auth::user()->id;

            Historial::create([
            'actividad'=> $actividad,
            'id_user'=> $id_user
            ]);

            //--------------------------//




        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
       
        
        if($tipo==1){return $pdf->setPaper('legal')->setOrientation('landscape')->stream('reporte.pdf');}
        if($tipo==2){return $pdf->setPaper('legal')->setOrientation('landscape')->download('reporte.pdf'); }
    }


    public function crear_reporte_planta($tipo){

     $vistaurl="pdfplanta.reporte_planta";
     $planta=Planta::all();
     
     return $this->crearPDF($planta, $vistaurl,$tipo);




    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
