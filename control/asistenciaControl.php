
<?php

include_once "../modelo/asistenciaModelo.php";

class asistenciaControl{

    public $idCurso;

    public function ctrCargarSelectAsignaturaAsistencia(){

        $objRespuesta = asistenciaModelo::mdlCargarSelectAsignaturaAsistencia($this->idCurso);
        echo json_encode($objRespuesta);


    }






}


// Validaciones


// Listar selecteAsignaturaAsistencia 

if(isset($_POST["listaAsignatura"]) == "ok" && isset($_POST["idCurso"])){

    $objCargarSelectAsignaturaAsistencia = new asistenciaControl();
    $objCargarSelectAsignaturaAsistencia->idCurso = $_POST["idCurso"];
    $objCargarSelectAsignaturaAsistencia->ctrCargarSelectAsignaturaAsistencia();
    
}