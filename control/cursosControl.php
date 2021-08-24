<?php

include_once "../modelo/cursosModelo.php";

class cursosControl
{
    public  $idCurso;
    public   $curso;
    public $nombreCurso;
    public $año;
    public  $docente;

    public function ctrInsertar()
    {
        $ObjRespuesta = cursosModelo::mdlInsertar($this->curso, $this->nombreCurso, $this->año, $this->docente);
        echo json_encode($ObjRespuesta);
    }

    public function ctrModificar()
    {
        $ObjRespuesta = cursosModelo::mdlModificar($this->idCurso, $this->curso, $this->nombreCurso, $this->año, $this->docente);
        echo json_encode($ObjRespuesta);
    }

    public function ctrEliminar()
    {
        $objRespuesta = cursosModelo::mdlEliminar($this->idCurso);
        echo json_encode($objRespuesta);
    }

    public function ctrListarTodos()
    {
        $ObjRespuesta = cursosModelo::mdlListarTodos();
        echo json_encode($ObjRespuesta);
    }

    public function ctrlCargarDocentes()
    {
        $objRespuesta = cursosModelo::mdlCargarDocentes();
        echo json_encode($objRespuesta);
    }
}


if (isset($_POST["curso"]) && isset($_POST["nombreCurso"]) && isset($_POST["año"]) && isset($_POST["docente"])) {
    $ObjCursos = new cursosControl();
    $ObjCursos->curso = $_POST["curso"];
    $ObjCursos->nombreCurso = $_POST["nombreCurso"];
    $ObjCursos->año = $_POST["año"];
    $ObjCursos->docente = $_POST["docente"];
    $ObjCursos->ctrInsertar();
}

if (isset($_POST["listaCursos"]) == "ok") {
    $objListaCursos = new cursosControl();
    $objListaCursos->ctrListarTodos();
}

if (isset($_POST["modCurso"]) && isset($_POST["modNombreCurso"]) && isset($_POST["modAño"]) && isset($_POST["modDocenteSelect"]) && isset($_POST["modIdCurso"])) {
    $objModCursos = new cursosControl();
    $objModCursos->curso = $_POST["modCurso"];
    $objModCursos->nombreCurso = $_POST["modNombreCurso"];
    $objModCursos->año = $_POST["modAño"];
    $objModCursos->idCurso = $_POST["modIdCurso"];
    $objModCursos->docente = $_POST["modDocenteSelect"];

    $objModCursos->ctrModificar();
}

if (isset($_POST["eliminarCursosId"])) {
    $objRespuesta = new cursosControl();
    $objRespuesta->idCurso = $_POST["eliminarCursosId"];
    $objRespuesta->ctrEliminar();
}


if (isset($_POST["cargarDocente"])) {

    $objconsulta = new cursosControl();
    $objconsulta->ctrlCargarDocentes();
}
