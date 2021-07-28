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
    public $idRol;
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

    public function ctrRegistrarPerosonal(){

        $objRespuesta = persnalModelo::mdlRegistrarPersonal($this->nombre,$this->apellidos,$this->documento,$this->telefono,$this->ciudad,$this->correo,$this->estado,$this->idRol,$this->direccion,$this->password,$this->foto);
        echo json_encode($objRespuesta);


    }

    public function ctrDeletePersonal(){

        $objRespuesta = persnalModelo::mdlDeletePersonal($this->idPersonal,$this->foto);
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

if (isset($_POST["nombre"])  && isset($_POST["apellido"]) && isset($_POST["documento"])  && isset($_POST["telefono"])  && isset($_POST["ciudad"])  && isset($_POST["correo"])  && isset($_POST["idRol"])  && isset($_POST["estado"])  && isset($_POST["direccion"]) && isset($_POST["password"])){

    $objRegPersonal = new personalControl();
    $objRegPersonal->nombre = $_POST["nombre"];
    $objRegPersonal->apellidos = $_POST["apellido"];
    $objRegPersonal->documento = $_POST["documento"];
    $objRegPersonal->telefono = $_POST["telefono"];
    $objRegPersonal->ciudad = $_POST["ciudad"];
    $objRegPersonal->correo = $_POST["correo"];
    $objRegPersonal->idRol = $_POST["idRol"];
    $objRegPersonal->estado = $_POST["estado"];
    $objRegPersonal->direccion = $_POST["direccion"];
    $objRegPersonal->password = $_POST["password"];
    $objRegPersonal->foto = $_FILES["foto"];
    $objRegPersonal->ctrRegistrarPerosonal();

}

if (isset($_POST["idDeletePersonal"]) && isset($_POST["deleteFoto"])){

    $objDeletePersonal =  new personalControl();
    $objDeletePersonal->idPersonal = $_POST["idDeletePersonal"];
    $objDeletePersonal->foto = $_POST["deleteFoto"];
    $objDeletePersonal->ctrDeletePersonal();

}



