<?php

namespace reporte_red_datos_cantv\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use reporte_red_datos_cantv\Planta;
use reporte_red_datos_cantv\Http\Requests;
use reporte_red_datos_cantv\Http\Requests\plantacreaterequest;
use reporte_red_datos_cantv\Http\Requests\plantaupdaterequest;
use reporte_red_datos_cantv\Http\Controllers\Controller;
use App\Http\Requests\PlantaRequest;
use Auth;
use reporte_red_datos_cantv\Historial;

class plantacontroller extends Controller
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



    
        public function index(Request $request)
      
   {
        
        

        $plantas =   

      //  consulplanta();

        Planta::Search($request->dir_ip)
       
        ->orderBy('dir_ip', 'DESC')
        
        ->paginate(50);
        $plantas->each(function($plantas){
            
        });

        return view('planta.consultarplanta')->with('planta', $plantas);
    }  


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('planta.registrar_nodo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(plantacreaterequest $request)
    {

            if($request['puerto_atm_fr'] < 0 || $request['puerto_metro'] < 0){

                Session::flash('message-error','El numero de puertos debe ser minimo de 0');
                return redirect('/planta/create');

            }else{


            $request['fecha_planta'] = date('Y-m-d');


            
            
           
            
         
        $equipo = strtoupper($request['equipo']);
        $marca = strtoupper($request['marca_equipo']);
        $modelo = strtoupper($request['modelo_equipo']);
        $region = strtoupper($request['region_equipo']);
        $estado = strtoupper($request['estado_equipo']);
        $central = strtoupper($request['central_sise']);
        $codigo =  strtoupper($request['codigo_contable']);

               
     $INSplanta  =  Planta::create([
            'dir_ip'=> $request['dir_ip'],
            'equipo'=> $equipo,
            'puerto_atm_fr'=> $request['puerto_atm_fr'],
            'puerto_metro'=> $request['puerto_metro'],
            'marca_equipo'=> $marca,
            'modelo_equipo'=> $modelo,
            'region_equipo'=> $region,
            'estado_equipo'=> $estado,
            'central_sise'=> $central,
            'codigo_contable'=> $codigo,
            'tipo_puerto'=> $request['tipo_puerto'],
            'fecha_planta' => $request['fecha_planta'],           

            ]);


     if($INSplanta){

             $fecha = date("Y-m-d");

              Planta::insert_estado_planta($request['dir_ip'], $request['puerto_atm_fr'], $request['puerto_metro'], $fecha); 

               

               //--------------------------//
            // Funcion para registrar Actividad

            $actividad = 'Registró Exitosamente el equipo';
            $id_user = Auth::user()->id;

            Historial::create([
            'actividad'=> $actividad,
            'id_user'=> $id_user
            ]);

            //--------------------------//

        return redirect('/planta')->with('message','Se creó el nodo Exitosamente');

     }else{

          Session::flash('message-error','No se pudo crear el nodo');
                return redirect('/planta/create');  

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
          {
        $planta = Planta::find($id);
        Controller::notFound($planta);
        return view ('planta.edit',['planta'=>$planta]); 
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(plantaupdaterequest $request, $id)
    {
        
         if($request['puerto_atm_fr'] < 0 || $request['puerto_metro'] < 0){

                Session::flash('message-error','El numero de puertos debe ser minimo de 0');
                return redirect('/planta/create');

            }else{

                    $fecha = date("Y-m-d");
                    $extMes = substr($fecha, -10, 7);

            $val_ip = Planta::val_ip($request->dir_ip, $request->equipo);


                if($val_ip == True){


                        Session::flash('message-error','El Nodo no pudo ser editado, ingresó una Dirección IP  ya utilizada');
                        return Redirect::to('/planta'); 



                }else{



    $upPlanta = Planta::update_estado_planta($request['dir_ip'], $request['puerto_atm_fr'], $request['puerto_metro'], $extMes);


    if($upPlanta){


        $planta = Planta::find($id);


         $planta->fill(

            $request->all());  
         $planta->save();

            //--------------------------//
            // Funcion para registrar Actividad

            $actividad = 'Modificó Exitosamente el equipo';
            $id_user = Auth::user()->id;

            Historial::create([
            'actividad'=> $actividad,
            'id_user'=> $id_user
            ]);

            //--------------------------//

           

   

         Session::flash('message','Nodo Actualizado Correctamente');
         return Redirect::to('/planta');



    }else{


            Session::flash('message-error','Nodo No Actualizado Correctamente');
         return Redirect::to('/planta');

    }
                

                }





            }


 
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


    public function registrar(){

            return view('planta.registrar_nodo');

    }


}
