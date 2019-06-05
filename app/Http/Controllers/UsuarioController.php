<?php

namespace reporte_red_datos_cantv\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use reporte_red_datos_cantv\Http\Requests;
use reporte_red_datos_cantv\Http\Requests\UserCreateRequest;
use reporte_red_datos_cantv\Http\Requests\userupdaterequest;

use reporte_red_datos_cantv\Http\Controllers\Controller;
use DB;
use reporte_red_datos_cantv\User;
use reporte_red_datos_cantv\Historial;

class UsuarioController extends Controller
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




    public function index()
    {
        $users = 

        DB::table('users')        
        ->whereNull('deleted_at')
        ->orderby('name')
        ->paginate(5);
        $users->each(function($users){
            
        });
        return view('usuario.index',compact('users'));
    }


    public function usersinactivos(){
        $users =
         DB::table('users')
        ->whereNotNull('deleted_at')
        ->orderby('name')
        ->paginate(5);
        $users->each(function($users){
            
        });
        return view('usuario.inactivos',compact('users'));

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        

     User::create([
            'user_name'=> $request['user_name'],
            'apellido'=> $request['apellido'],
            'name'=> $request['name'],
            'email'=> $request['email'],
            'password' => $request['password'], 

            ]);


            //--------------------------//
            // Funcion para registrar Actividad

    $actividad = 'Registro Exitosamente al Usuario '. $request['name'];
    $id_user = Auth::user()->id;

            Historial::create([
            'actividad'=> $actividad,
            'id_user'=> $id_user
            ]);

            //--------------------------//




        return redirect('/usuario')->with('message','Usuario Guardado exitosamente');
       
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
        $name = User::consultar_nombre($id);
         


         $users = User::inactivos($id);
      

         if($users){
               
               $user1 = User::reactivar($id);
         
             if($user1){

           
            //--------------------------//
            // Funcion para registrar Actividad





    $actividad = 'Reactivó Exitosamente al Usuario '. $name;
    $id_user = Auth::user()->id;

            Historial::create([
            'actividad'=> $actividad,
            'id_user'=> $id_user
            ]);

            //--------------------------//




Session::flash('message','Usuario Reactivado Correctamente');
return Redirect::to('/usuario');

                }else{

                     echo "Usuario No Reactivado";
                }
       

         }else{

              $user = User::find($id);
              Controller::notFound($user);
              return view ('usuario.edit',['user'=>$user]);

         }




       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(userupdaterequest $request, $id)
    {
         
       



       $val_name = User::val_name($id, $request->name);
       $val_email = User::val_email($id, $request->email);

       if($val_name == True || $val_email == True){

    
        Session::flash('message-error','El Usuario no pudo ser editado, ingresó un nombre de usuario ó un correo ya utilizado');
         return Redirect::to('/usuario');  


       }else{




         $user = User::find($id);


         $user->fill($request->all());  
         $user->save();


  //--------------------------//
            // Funcion para registrar Actividad

    $actividad = 'Modificó Exitosamente al Usuario '. $request['name'];
    $id_user = Auth::user()->id;

            Historial::create([
            'actividad'=> $actividad,
            'id_user'=> $id_user
            ]);

    //--------------------------//


         Session::flash('message','Usuario Editado Correctamente');
         return Redirect::to('/usuario'); 



          




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
        

        if($id != 1){

        $user = User::find($id);
    

$name  = User::consultar_nombre($id);







           

//--------------------------//
            // Funcion para registrar Actividad

    $actividad = 'Eliminó Exitosamente al Usuario '. $name;
    $id_user = Auth::user()->id;

            Historial::create([
            'actividad'=> $actividad,
            'id_user'=> $id_user
            ]);

    //--------------------------//

                $user->delete();
                




                Session::flash('message','Usuario Eliminado Correctamente');
        return Redirect::to('/usuario');


            }else{


        Session::flash('message-error','El Usuario no pudo ser eliminado, ya que tiene privilegio de administrador');
         return Redirect::to('/usuario'); 


            }


  

    }
}
