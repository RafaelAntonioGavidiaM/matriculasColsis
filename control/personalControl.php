<?php

include_once "../modelo/personalModelo.php";

class personalControl{

    public $idPersonal;
    public $nombre;
    public $apellidos;
    public $documento;
    public $telefono;
    public $ciudad;
    public $correo;
    public $estado;
    public $rol;
    public $direccion;
    public $password;
    public $foto;
    public $fotoAntigua;

    public function ctrListarPersonal(){

        $objRespuesta = persnalModelo::mdlListarPersonal();
        echo json_encode($objRespuesta);

    }

    public function ctrListarRol(){

        $objRespuesta = persnalModelo::mdlListarRol();
        echo json_encode($objRespuesta);


    }





}


if (isset($_POST["listaPersonal"]) == "ok") {
    
    $objListarPersonal = new personalControl();
    $objListarPersonal->ctrListarPersonal();
}

if (isset($_POST["listaRoles"]) == "ok") {
    
    $objListarRol = new personalControl();
    $objListarRol->ctrListarRol();
}




