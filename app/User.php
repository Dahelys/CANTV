<?php

namespace reporte_red_datos_cantv;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;
class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_name','apellido','name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $dates = ['deleted_at'];
    
    public function setPasswordAttribute($valor){
        if (!empty($valor)){ 
             $this->attributes['password'] = \Hash::make($valor);
        }
    }

    public static function reactivar($id){

        $sql = "UPDATE users SET deleted_at = NULL
                WHERE id ='$id'";
        return DB::statement($sql);

    }

    public static function inactivos($id){

$sql = "SELECT * FROM users where deleted_at is not null
        and id ='$id'";

       return $users = DB::select($sql);
    

    }


    public static function val_name($id, $name){

        $sql = "SELECT * FROM users where name ='$name'";

    $users = DB::select($sql);

    if($users){


        $sql1 = "SELECT * FROM users where id = '$id' and name ='$name'";

        $users1 = DB::select($sql1);

        if($users1){

            return False;

        }else{

            return True;

        }

        

    }else{

        
        return False;

    }



    }

    public static function val_email($id, $email){


        $sql = "SELECT * FROM users where email ='$email'";

    $users = DB::select($sql);

    if($users){

        $sql1 = "SELECT * FROM users where id= '$id' and email ='$email'";
        $users1 = DB::select($sql1);

        if($users1){

            return False;

        }else{

            return True;

        }
        

    }else{

        return False;

    }


    }


public static function consultar_nombre($id){

$sql1 = "SELECT * FROM users where id = '$id'";

$users = DB::select($sql1);
foreach ($users as $u) {
       return $name = $u->name;
}


        
  
}


}
