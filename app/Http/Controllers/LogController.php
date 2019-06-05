<?php

namespace reporte_red_datos_cantv\Http\Controllers;

use Illuminate\Http\Request;

use reporte_red_datos_cantv\Http\Requests;
use reporte_red_datos_cantv\Http\Requests\LoginRequest;
use reporte_red_datos_cantv\Http\Controllers\Controller;
use Auth;
use Session;
use Redirect;

use reporte_red_datos_cantv\Historial;


class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(LoginRequest $request)
    {
         if(Auth::attempt(['name'=>$request['name'], 'password'=>$request['password']])){

            //--------------------------//

            // Funcion para registrar Actividad

            $actividad = 'Inicio Sesión';
            $id_user = Auth::user()->id;

            Historial::create([
            'actividad'=> $actividad,
            'id_user'=> $id_user
            ]);



            //--------------------------//

          

            return Redirect::to('panel');
        


        }
        Session::flash('message-error','Datos son incorrectos');

        return Redirect::to('/');
    }

    public function logout(){


            //--------------------------//

            // Funcion para registrar Actividad

    $actividad = 'Finalizó Sesión';
    $id_user = Auth::user()->id;

            Historial::create([
            'actividad'=> $actividad,
            'id_user'=> $id_user
            ]);

            //--------------------------//


        Auth::logout();
        return Redirect::to('/');
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
