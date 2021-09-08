<?php

include_once "../modelo/horarioModelo.php";

class horarioControl
{

    public function ctrInsertar()
    {
        
    }

    public function ctrModificar()
    {
        
    }

    public function ctrEliminar()
    {
        
    }

    public function ctrListarHorario()
    {
        
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

    public function ctrlCargarDia()
    {
        $objRespuesta=horarioModelo::mdlCargarDia();
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

if (isset($_POST["cargarDia"])){
    $objconsulta = new horarioControl();
    $objconsulta->ctrlCargarDia();
}