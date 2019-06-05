<?php
include( 'wp-load.php' );
//generales
$name = $_POST['name'];
$mail = $_POST['mail'];
$company= $_POST['company'];
//Encuestas
$resp1 = $_POST['resp1'];
$resp2 = $_POST['resp2'];
$resp3 = $_POST['resp3'];
$resp4 = $_POST['resp4'];
$resp5 = $_POST['resp5'];
//dinos que necesitas
$message= $_POST['message'];
$phone= $_POST['phone'];
//Registro
$position= $_POST['position'];
$country = $_POST['country'];
$userStatus = $_POST['userStatus'];
//agrupamiento de respuestas
$respuesta = $resp1 . ' '. $resp2 . ' '.$resp3 . ' '.$resp4 . ' '.$resp5;

$error = false;

function errors($er) {
if($error == false){
    echo "400. alguno de los campos no paso las validaciones";
    $error = true;
}
echo " /error con el dato ".$er." /";

}
function validateMail($email_b){
    $ans = False;
    if (filter_var($email_b, FILTER_VALIDATE_EMAIL)){
        $ans = True;
    }else{
        errors($email_b);
    }
    return $ans;
}

function validateLetters ($str){
        $ans = False;
        $str = trim($str);
        //if(!preg_match('/^([a-zA-Z]+[\'-]?[a-zA-Z]+[ ]?)+$/', $str))
        //if(!preg_match("/^[a-zA-Z'-]+$/",$str))
        if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $str) && (0 === preg_match('~[0-9]~', $str)))
        {
            $ans = True;
        }
        else
        {
            errors($str);
        }
        return $ans;
    }

function validateNumbers ($str){
    $ans = False;
    if (is_numeric(str_replace(' ','',$str))){
        $ans = True;
    }else{
        errors($str);
    }
    return $ans;
}
function isNotEmpty($str){
    $ans = False;
    if (!empty($str)){
        $ans = True;
    }
    return $ans;
}
function val_l ($str){
    $ans = False;
    if (isNotEmpty($str)){
        if (validateLetters($str)){
            $ans = True;
        }
    }
    return $ans;
}

function val_n ($str){
    $ans = False;
    if (isNotEmpty($str)){
        if (validateNumbers($str)){
            $ans = True;
        }
    }
    return $ans;
}
function val_m ($str){
    $ans = False;
    if (isNotEmpty($str)){
        if (validateMail($str)){
            $ans = True;
        }
    }
    return $ans;
}
function val_e($str){
         return isNotEmpty($str);
}

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'enc_cliente' :
        if(val_e($respuesta)&&val_m($mail)){
            $wpdb->insert("e_encuesta",array(
                "respuesta" => $respuesta ,
                "encuesta_consultor"=>false,
                "nombre"=> $name,
                "email"=> $mail)
                );
                echo "200";
        }
        /* else{
            echo "400. alguno de los campos no paso las validaciones";
        } */
        break;
        case 'enc_consultor' :
        if(val_e($respuesta)&&val_m($mail)){
            $wpdb->insert("e_encuesta",array(
                "respuesta" => $respuesta ,
                "encuesta_consultor"=>true,
                "nombre"=> $name,
                "email"=> $mail)
                );
                echo "200";
        }
        /* else{
            echo "400. alguno de los campos no paso las validaciones";
        } */
            break;
        case 'necesitas' :
            if(val_e($respuesta)&&val_l($name)&&val_m($mail)){
            $wpdb->insert("e_post",array(
                "nombre" => $name ,
                "email"=>$mail,
                "telefono"=> $phone,
                "empresa"=> $company,
                "mensaje"=> $message,)

                );
                echo "200";
        }
        /* else{
            echo "400. alguno de los campos no paso las validaciones";
        } */
            break;
        case 'registro' :
        //echo "<br>Nombre: ".$name." empresa: ".$company." country: ".$country." mail: ".$mail."<br>";
        if(val_l($name)&&val_e($company)&&val_l($country)&&val_m($mail)){
            $wpdb->insert("e_usuario",array(
                "nombreCompleto" => $name ,
                "email"=>$mail,
                "cargo"=> $position,
                "empresa"=> $company,
                "pais"=> $country,
                "usuario_consultor"=> $userStatus)

                );
                echo "200";
        }
        /* else{
            echo "400. alguno de los campos no paso las validaciones";
        } */
        case 'checkUser' :
        if(val_m($mail)){
            $lectura = $wpdb->get_results(
                "SELECT * FROM e_usuario WHERE email = '". $mail."'"
            );
            echo "200. ";
            if(sizeof($lectura)>0){
                echo "false";
            }else{
                echo "true";
            }
        }
        /* else{
            echo "400. alguno de los campos no paso las validaciones";
        } */
            break;
            case 'test':
            $xs =val_l($mail);

            break;
        default:
        echo "400, peticion errada";
    }
}

?>