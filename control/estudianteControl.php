<?php

include_once "../modelo/estudianteModelo.php";

class estudiantesControl{

    public function ctrRegistrarEstudiantes(){
        $objRespuesta = modeloEstudiantes::mdlRegistrarEstudiantes($this->nombre,$this->apellido,$this->documento,$this->tipoDocumento,$this->fechaNacimiento,$this->tipoSangre,$this->seguroEstudiantil,$this->telefono);
        echo json_encode($objRespuesta);
    }

    public function ctrListarEstudiantes(){
        $objRespuesta = modeloEstudiantes::mdlListarEstudiantes();
        echo json_encode($objRespuesta);
    }

    public function ctrModificarEstudiantes(){
        $objRespuesta = modeloEstudiantes::mdlModificarEstudiantes($this->documento,$this->nombre,$this->apellido,$this->direccion,$this->telefono,$this->idRh,$this->idDependencia,$this->idUsuario);
        echo json_encode($objRespuesta);
    }

    public function ctrEliminarEstudiantes(){
        $objRespuesta = modeloEstudiantes::mdlEliminarEstudiantes($this->idUsuario,$this->foto);
        echo json_encode($objRespuesta);
    }

}

if(isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["documento"]) && isset($_POST["tipoDocumento"]) && isset($_POST["fechaNacimiento"])&& isset($_POST["tipoSangre"]) && isset($_POST["seguroEstudiantil"]) && isset($_POST["telefono"])){
    $objEstudiantes = new estudiantesControl();
    $objEstudiantes->nombre = $_POST["nombre"];
    $objEstudiantes->apellido = $_POST["apellido"];
    $objEstudiantes->documento = $_POST["documento"];
    $objEstudiantes->tipoDocumento = $_POST["tipoDocumento"];
    $objEstudiantes->fechaNacimiento = $_POST["fechaNacimiento"];
    $objEstudiantes->tipoSangre = $_POST["tipoSangre"];
    $objEstudiantes->seguroEstudiantil = $_POST["seguroEstudiantil"];
    $objEstudiantes->telefono = $_FILES["telefono"];
    $objEstudiantes->ctrRegistrarEstudiantes();
}
