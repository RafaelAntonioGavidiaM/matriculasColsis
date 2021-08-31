<?php

include_once "../modelo/asignaturaCursoModelo.php";

class asignaturaCursoControl
{
    public  $idAsignaturaCurso;
    public  $asignatura;
    public  $cursoAsignatura;
    public  $docente;

    public function ctrInsertar()
    {
        $ObjRespuesta = asignaturaCursoModelo::mdlInsertar($this->asignatura, $this->cursoAsignatura, $this->docente);
        echo json_encode($ObjRespuesta);
    }

    public function ctrModificar()
    {
        $ObjRespuesta = asignaturaCursoModelo::mdlModificar($this->idAsignaturaCurso, $this->asignatura, $this->cursoAsignatura, $this->docente);
        echo json_encode($ObjRespuesta);
    }

    public function ctrEliminar()
    {
        $objRespuesta = asignaturaCursoModelo::mdlEliminar($this->idAsignaturaCurso);
        echo json_encode($objRespuesta);
    }

    public function ctrListarAsignaturaCurso()
    {
        $ObjRespuesta = asignaturaCursoModelo::mdlListarTodos();
        echo json_encode($ObjRespuesta);
    }

    public function ctrlCargarAsignatura()
    {
        $objRespuesta = asignaturaCursoModelo::mdlCargarAsignatura();
        echo json_encode($objRespuesta);
    }

    public function ctrlCargarDatosCursos()
    {
        $objRespuesta = asignaturaCursoModelo::mdlCargarCurso();
        echo json_encode($objRespuesta);
    }

    public function ctrlCargarDocentes()
    {
        $objRespuesta = asignaturaCursoModelo::mdlCargarDocentes();
        echo json_encode($objRespuesta);
    }
}


if (isset($_POST["asignatura"]) && isset($_POST["cursoAsignatura"]) && isset($_POST["docente"])) {
    $ObjCursos = new asignaturaCursoControl();
    $ObjCursos->asignatura = $_POST["asignatura"];
    $ObjCursos->cursoAsignatura = $_POST["cursoAsignatura"];
    $ObjCursos->docente = $_POST["docente"];
    $ObjCursos->ctrInsertar();
}

if (isset($_POST["cargarDatosAsignatura"])) {

    $objconsulta = new asignaturaCursoControl();
    $objconsulta->ctrlCargarAsignatura();
}

if (isset($_POST["cargarDatosCursos"])) {

    $objconsulta = new asignaturaCursoControl();
    $objconsulta->ctrlCargarDatosCursos();
}

if (isset($_POST["cargarDocente"])) {

    $objconsulta = new asignaturaCursoControl();
    $objconsulta->ctrlCargarDocentes();
}

if (isset($_POST["listaAsignaturaCurso"]) == "ok") {
    $objListaAsignaturaCursos = new asignaturaCursoControl();
    $objListaAsignaturaCursos->ctrListarAsignaturaCurso();
}

if (isset($_POST["modAsignaturaSelect"]) && isset($_POST["modCursoSelect"]) && isset($_POST["modDocenteSelect"]) && isset($_POST["modIdAsignaturaCurso"])) {
    $objModAsignaturaCurso = new asignaturaCursoControl();
    $objModAsignaturaCurso->asignatura = $_POST["modAsignaturaSelect"];
    $objModAsignaturaCurso->cursoAsignatura = $_POST["modCursoSelect"];
    $objModAsignaturaCurso->docente = $_POST["modDocenteSelect"];
    $objModAsignaturaCurso->idAsignaturaCurso = $_POST["modIdAsignaturaCurso"];
    $objModAsignaturaCurso->ctrModificar();
}

if (isset($_POST["eliminaAsignaturarCursoId"])) {
    $objRespuesta = new asignaturaCursoControl();
    $objRespuesta->idAsignaturaCurso = $_POST["eliminaAsignaturarCursoId"];
    $objRespuesta->ctrEliminar();
}