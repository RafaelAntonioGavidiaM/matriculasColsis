
<?php

include_once "../modelo/asistenciaModelo.php";

class asistenciaControl{
    public $idAsistencia;
    public $idCurso;
    public $idAsignatura;
    public $fecha;
    public $valorAsistencia;

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

    public function ctrModificarAsistencia(){

        $objRespuesta=asistenciaModelo::mdlModificarAsistencia($this->idAsistencia,$this->valorAsistencia);
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


// Modicar asistencia

if (isset($_POST["idModAsistencia"]) && isset($_POST["valorAsistencia"])) {
    
    $objModificarAsistencia= new asistenciaControl();
    $objModificarAsistencia->idAsistencia=$_POST["idModAsistencia"];
    $objModificarAsistencia->valorAsistencia=$_POST["valorAsistencia"];
    $objModificarAsistencia->ctrModificarAsistencia();
}