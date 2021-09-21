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


    public function ctrInsertar()
    {
        $ObjRespuesta = horarioModelo::mdlInsertar($this->asignatura, $this->cursoAsignatura, $this->dia, $this->horaInicio, $this->horaFin);
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
        $ObjRespuesta = horarioModelo::mdlListarTodos();
        echo json_encode($ObjRespuesta);
    }

    public function ctrlCargarAsignatura()
    {
        $objRespuesta = horarioModelo::mdlCargarAsignatura();
        echo json_encode($objRespuesta);
    }

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

}


if (isset($_POST["cargarDatosAsignatura"])) {

    $objconsulta = new horarioControl();
    $objconsulta->ctrlCargarAsignatura();
}

if (isset($_POST["cargarDatosCursos"])) {

    $objconsulta = new horarioControl();
    $objconsulta->ctrlCargarDatosCursos();
}

if (isset($_POST["cargarDatosCursosHorario"])) {

    $objconsulta = new horarioControl();
    $objconsulta->ctrlCargarDatosCursoHorario();
}


if (isset($_POST["asignatura"]) && isset($_POST["idCurso"]) && isset($_POST["dia"]) && isset($_POST["horaInicio"]) && isset($_POST["horaFin"])) {
    $objHorario = new horarioControl();
    $objHorario->asignatura = $_POST["curasignaturaso"];
    $objHorario->idCurso = $_POST["idCurso"];
    $objHorario->dia = $_POST["dia"];
    $objHorario->horaInicio = $_POST["horaInicio"];
    $objHorario->horaFin = $_POST["horaFin"];
    $objHorario->ctrInsertar();
}

if (isset($_POST["listaHorio"]) == "ok") {
    $objListaHorario = new horarioControl();
    $objListaHorario->ctrListarHorario();
}