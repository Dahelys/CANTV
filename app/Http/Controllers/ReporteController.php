<?php

namespace reporte_red_datos_cantv\Http\Controllers;

use Illuminate\Http\Request;



use Session;
use Redirect;
use reporte_red_datos_cantv\Http\Requests;
use reporte_red_datos_cantv\Http\Requests\ReporteRequest;
use reporte_red_datos_cantv\Http\Controllers\Controller;
use DB;
use Auth;

use reporte_red_datos_cantv\Reporte;
use reporte_red_datos_cantv\Historial;

class ReporteController extends Controller
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
        return view("reporte.index");
    }

//----------------------------------------------------

      public function crearPDF_red($vistaurl, $res, $res2, $tipo, $tipo_reporte)
    {

        $data = $res;
        $data2 = $res2;
        $date = date('Y-m-d');
        $tipo = $tipo;
        $tipo_reporte = $tipo_reporte;
         //--------------------------//
            // Funcion para registrar Actividad

            $actividad = 'Consultó Reporte de Red de Datos de Cantv';
            $id_user = Auth::user()->id;

            Historial::create([
            'actividad'=> $actividad,
            'id_user'=> $id_user
            ]);

            //--------------------------//

            


     $name_report = 'reporte_por_'. $tipo_reporte .'_'. $date .'_'. $tipo .'_.pdf';


$view =  \View::make($vistaurl, compact('data', 'date', 'data2','tipo'))->render();
$pdf = \App::make('dompdf.wrapper');
$pdf->loadHTML($view);
    
        
return $pdf->setPaper('legal')->setOrientation('portrait')->stream($name_report);
        
    }


//-----------------------------------------------------



//-----------------------------------------------------

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
        
        
    $verificar_mig = Reporte::verificar_migraciones();
     

    if($verificar_mig == False){
                



            // Migraciones Automaticas de la tabla temporal  
    

        Reporte::migracion_automatica_cliente();
        Reporte::migracion_automatica_servicio();
        Reporte::migracion_automatica_plan();
        Reporte::migracion_automatica_velocidad();
        Reporte::migracion_automatica_status();
        Reporte::migracion_automatica_tipo_nodo();
        Reporte::migracion_automatica_tipo_tarjeta();
        Reporte::migracion_automatica_central();
        Reporte::migracion_automatica_nodos();
        Reporte::migracion_automatica_ordenes();
        Reporte::migracion_automatica_detalle_orden();
        Reporte::totalizar_puerto_por_nodo();

        



                     //--------------------------//
            // Funcion para registrar Actividad

    $actividad = 'Generó Exitosamente el Reporte de Red de Datos de Cantv';
    $id_user = Auth::user()->id;

            Historial::create([
            'actividad'=> $actividad,
            'id_user'=> $id_user
            ]);

            //--------------------------//


Session::flash('message','Se generó con exito el Reporte');
return Redirect::to('/consulta'); 

        return view("reporte.consulta");
       
          
            
              
    }else{


        $ver = Reporte::consul_fe_spl();

         if($ver == 4){
                 
                Session::flash('message','No se ha Cargado ningún SPL');
                    return Redirect::to('/generar_reporte');
        }else{


                 Session::flash('message','Ya se generó el ultimo Reporte');
                   return Redirect::to('/consulta');

        }

     

           
                      
  

                

       



    }

  
     
     

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
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
    public function update(ReporteRequest $request)
    {
        $tipo_reporte = $request['reporte'];
        $fecha = $request['date'];
        $fecha = substr($fecha, -10, -3);
        $tipo = $request['tipo'];
        $val = Reporte::validar_fecha($fecha);

    switch ($tipo_reporte) {
    case "central":
    
        $vistaurl="reporte.reporte_red";

        if($val == True){

        
        $res = Reporte::datos_reporte($fecha, $tipo);
        $res2 = Reporte::reporte_totalizado($fecha, $tipo);
                   
        
        return $this->crearPDF_red($vistaurl, $res, $res2, $tipo, $tipo_reporte);

        }else{

            Session::flash('message-error','El reporte de la fecha solicitada no existe');
            return redirect('consulta');
            

        }

        break;
    case "estado":
        
        $vistaurl="reporte.reporte_red_estados";

        if($val == True){

        
        $res = Reporte::data_reporte_estado($fecha, $tipo);
        $res2 = Reporte::reporte_totalizado($fecha, $tipo);               
        
        return $this->crearPDF_red($vistaurl, $res, $res2, $tipo, $tipo_reporte);

        }else{

            Session::flash('message-error','El reporte de la fecha solicitada no existe');
            return redirect('consulta');

        }



        
        break;
    case "region":
        
        $vistaurl="reporte.reporte_red_region";
        if($val == True){

        
        $res = Reporte::data_reporte_region($fecha, $tipo);
        $res2 = Reporte::reporte_totalizado($fecha, $tipo);               
        
        return $this->crearPDF_red($vistaurl, $res, $res2, $tipo, $tipo_reporte);

        }else{

            Session::flash('message-error','El reporte de la fecha solicitada no existe');
            return redirect('consulta');

        }
       
       break;
    }


         
            
     

     

return redirect('/generar_reporte')->with('message','store');
       
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

    public function vista_consulta(){
        
        return view("reporte.consulta");
    }

    public function consultar_reporte(Request $request){

         

    }




}