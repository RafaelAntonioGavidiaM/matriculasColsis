<?php
include_once "../modelo/loginModelo.php";
class loginControl{
    public $documento;
    public $contraseña;

    public function login(){
        $objRespuesta=loginModelo::mdlLogin($this->documento,$this->contraseña);
        $ingreso="";
        if($objRespuesta!=null){
            session_start();
            $_SESSION["nombre"]=$objRespuesta[1];
            $_SESSION["apellido"]=$objRespuesta["apellido"];
            $_SESSION["documento"]=$objRespuesta["documento"];
            $_SESSION["idPersonal"]=$objRespuesta["idPersonal"];
            $_SESSION["foto"]=$objRespuesta["foto"];
            $ingreso="valido";


        }else{
            $ingreso="invalido";

        }
        
        


        echo json_encode($ingreso);



    }




}

if(isset($_POST["contraseña"])&& isset($_POST["documento"])){

    $objLogin = new loginControl();
    $objLogin->contraseña=$_POST["contraseña"];
    $objLogin->documento=$_POST["documento"];
    $objLogin->login();




}