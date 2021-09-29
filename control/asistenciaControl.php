
<?php

include_once "../modelo/asistenciaModelo.php";

class asistenciaControl{

    public $idCurso;
    public $idAsignatura;
    public $fecha;

    public function ctrCargarSelectAsignaturaAsistencia(){

        $objRespuesta = asistenciaModelo::mdlCargarSelectAsignaturaAsistencia($this->idCurso);
        echo json_encode($objRespuesta);


    }

    public function ctrCargarAsistencia(){

        $objRespuesta = asistenciaModelo::mdlCargarAsistenciaSegunCurso($this->idCurso,$this->idAsignatura,$this->fecha);
        echo json_encode($objRespuesta);
    }

    public function ctrlInsertarAsistencia(){

        $objRespuesta=asistenciaModelo::mdlInsertarAsistencia($this->idCurso,$this->idAsignatura);
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

// Listar datatable asistencia

if (isset($_POST["listaAsistencia"]) == "ok" && isset($_POST["idCurso"]) && isset($_POST["idAsignatura"]) && isset($_POST["fechaBuscar"])) {
    
    $objCargarAsistencia =  new asistenciaControl();
    $objCargarAsistencia->idCurso = $_POST["idCurso"];
    $objCargarAsistencia->idAsignatura = $_POST["idAsignatura"];
    $objCargarAsistencia->fecha=$_POST["fechaBuscar"];
    $objCargarAsistencia->ctrCargarAsistencia();

}

if(isset($_POST["idCursoC"]) && isset($_POST["idAsignaturaC"])){
    $objCargarAsistencia =  new asistenciaControl();
    $objCargarAsistencia->idCurso=$_POST["idCursoC"];
    $objCargarAsistencia->idAsignatura=$_POST["idAsignaturaC"];

    $objCargarAsistencia->ctrlInsertarAsistencia();


}