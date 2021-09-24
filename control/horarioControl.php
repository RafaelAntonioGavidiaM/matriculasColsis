<?php

include_once "../modelo/horarioModelo.php";

class horarioControl
{

    public $idHorario;
    public $asignatura;
    public $cursoAsignatura;
    public $dia;
    public $horaInicio;
    public $horaFin;
    public $idCurso;


    public function ctrInsertar()
    {
        $ObjRespuesta = horarioModelo::mdlInsertar($this->asignatura, $this->idCurso, $this->dia, $this->horaInicio, $this->horaFin);
        echo json_encode($ObjRespuesta);
    }

    public function ctrModificar()
    {
        
    }

    public function ctrEliminar()
    {
        
    }

    public function ctrListarHorario()
    {
        $objRespuesta = horarioModelo::mdlListarTodos($this->idCurso);
        echo json_encode($objRespuesta);
        
    }

    // public function ctrlCargarAsignatura()
    // {
    //     $objRespuesta = horarioModelo::mdlCargarAsignatura();
    //     echo json_encode($objRespuesta);
    // }

    public function ctrlCargarDatosCursos()
    {
        $objRespuesta = horarioModelo::mdlCargarCurso();
        echo json_encode($objRespuesta);
    }

    public function ctrlCargarDatosCursoHorario()
    {
        $objRespuesta = horarioModelo::mdlCargarCursoHorario();
        echo json_encode($objRespuesta);
    }

    public function ctrlConsultarAsignaturasdeCurso(){

        $objRespuesta = horarioModelo::mdlCargarAsignaturadeIdCurso($this->idCurso);
        echo json_encode($objRespuesta);

    }

}

$objHorario = new horarioControl();
$objconsulta= new horarioControl();

if (isset($_POST["cargarDatosAsignatura"])) {

    
    //$objconsulta->ctrlCargarAsignatura();
}

if (isset($_POST["cargarCursosHorario"])) {

   
    $objconsulta->ctrlCargarDatosCursos();
}

if (isset($_POST["cargarDatosCursosHorario"])) {

    
    $objconsulta->ctrlCargarDatosCursoHorario();
}


if (isset($_POST["asignatura"]) && isset($_POST["curso"]) && isset($_POST["dia"]) && isset($_POST["horaInicio"]) && isset($_POST["horaFin"])) {

    $objHorario->asignatura = $_POST["asignatura"];
    $objHorario->idCurso = $_POST["curso"];
    $objHorario->dia = $_POST["dia"];
    $objHorario->horaInicio = $_POST["horaInicio"];
    $objHorario->horaFin = $_POST["horaFin"];
    $objHorario->ctrInsertar();
}

if(isset($_POST["idCurso"])){

    $objHorario->idCurso=$_POST["idCurso"];
    $objHorario->ctrlConsultarAsignaturasdeCurso();

 
    
    
}

if(isset($_POST["horario"])){

    $objHorario->idCurso=$_POST["horario"];

    $objHorario->ctrListarHorario();
}