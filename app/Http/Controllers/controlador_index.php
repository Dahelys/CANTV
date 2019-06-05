<?php

namespace reporte_red_datos_cantv\Http\Controllers;

use Illuminate\Http\Request;

use reporte_red_datos_cantv\Http\Requests;
use reporte_red_datos_cantv\Http\Controllers\Controller;
use Carbon\Carbon;
use reporte_red_datos_cantv\Planta;

class controlador_index extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response   
     */

    public function __construct(){

        $this->middleware('auth', ['only' => 'panel']);

    } 





    public function index()
    {
        return view('index');
    }
     public function panel()
    {
        Planta::updatePlanta();

        
        $fecha = Carbon::now();
       
        return view('panel', compact('fecha'));
    }
 }

   