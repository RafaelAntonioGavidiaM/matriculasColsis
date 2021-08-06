<?php

include_once "../modelo/cursosModelo.php";

class cursosControl{
    public $idCurso;
    public $curso;
    public $nombreCurso;
    public $año;
    public $docente;

    public function ctrInsertar(){
        $ObjRespuesta = cursosModelo::mdlInsertar($this->curso,$this->nombreCurso,$this->año,$this->docente);
        echo json_encode($ObjRespuesta);
    }

    public function ctrModificar(){
        $ObjRespuesta = cursosModelo::mdlModificar($this->idCurso,$this->curso,$this->nombreCurso,$this->año,$this->docente);
        echo json_encode($ObjRespuesta);
    }

    public function ctrEliminar(){
        $objRespuesta = cursosModelo::mdlEliminar($this->idCurso);
        echo json_encode($objRespuesta);
    }

    public function ctrListarTodos(){
        $ObjRespuesta = cursosModelo::mdlListarTodos();
        echo json_encode($ObjRespuesta);
    }

    public function ctrlCargarDocentes(){
        $objRespuesta=cursosModelo::mdlCargarDocentes();
        echo json_encode($objRespuesta);

    }

   

}


if (isset($_POST["curso"]) && isset($_POST["nombreCurso"]) && isset($_POST["año"]) && isset($_POST["docente"])){
    $ObjCursos = new cursosControl();
    $ObjCursos->curso = $_POST["curso"];
    $ObjCursos->nombreCurso = $_POST["nombreCurso"];
    $ObjCursos->año = $_POST["año"];
    $ObjCursos->docente = $_POST["docente"];
    $ObjCursos->ctrInsertar();
}

if (isset($_POST["listaCursos"]) == "ok"){
    $objListaCursos = new cursosControl();
    $objListaCursos->ctrListarTodos();
}

if (isset($_POST["eliminarCursosId"]) && isset($_POST["deleteImagen"])){
    $objRespuesta = new cursosControl();
    $objRespuesta->idCurso = $_POST["eliminarCursosId"];
    $objRespuesta->ctrEliminar();
}

if (isset($_POST["cargarPersonal"])) {
    $objRespuesta = new cursosControl();
    $objRespuesta->ctrlCargarDocentes();
}
if (isset($_POST["cargarDocente"])) {

    $objconsulta= new cursosControl();
    $objconsulta->ctrlCargarDocentes();
}
