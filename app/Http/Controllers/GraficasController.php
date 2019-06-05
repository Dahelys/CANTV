<?php

namespace reporte_red_datos_cantv\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use reporte_red_datos_cantv\Http\Requests;
use reporte_red_datos_cantv\Http\Requests\GraficasShowRequest;
use reporte_red_datos_cantv\Http\Controllers\Controller;
use Auth;
use Session;

use reporte_red_datos_cantv\Historial;
use reporte_red_datos_cantv\Reporte;

class GraficasController extends Controller
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



    public function index($res, $tipo, $res2, $res3)
    {

        $datos1 = $res;
        $tipo1 = $tipo;
        $datos2 = $res2;
        $datos3 = $res3;

                      //--------------------------//
            // Funcion para registrar Actividad

    $actividad = 'Consultó Graficás de la Red de Datos de CANTV';
    $id_user = Auth::user()->id;

            Historial::create([
            'actividad'=> $actividad,
            'id_user'=> $id_user
            ]);

            //--------------------------//






        return view("estadistica.index", compact('datos1','tipo1','datos2','datos3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("estadistica.consulta_estadistica");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GraficasShowRequest $request)
    {
        $fecha = $request['date'];

       if($fecha === NULL){

           return view("estadistica.consulta_estadistica");

       }else{


          $fecha = substr($fecha, -10, -3);
          $tipo = $request['tipo'];

                $val = Reporte::validar_fecha($fecha);

        if($val == True){

            $res = Reporte::data_reporte_region($fecha, $tipo);

         //   consulta_region($fecha, $tipo);
            $res2 = Reporte::data_reporte_estado($fecha, $tipo);

//            consulta_estado($fecha, $tipo);
            $res3 = Reporte::reporte_totalizado($fecha, $tipo);
        
            return $this->index($res, $tipo, $res2, $res3);

        }else{


            Session::flash('message-error','Las estadísticas de la fecha solicitada no existen');

            return redirect("estadistica/create");

        }




       }


       

       return redirect('/estadistica')->with('message','store');


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
