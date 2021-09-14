
<?php

include_once "../modelo/estudianteModelo.php";

class estudiantesControl
{
    public $idEstudiante;
    public $nombres;
    public $apellidos;
    public $documento;
    public $tipoDocumento;
    public $fechaNacimiento;
    public $tipoSangre;
    public $seguroEstudiantil;
    public $telefono;
    public $idAcudiente;
    public $idCurso;
    public $foto;
    public $fotoAntigua;

    //combo curso

    public function ctrListarCursos()
    {
        $objRespuesta = modeloEstudiantes::mdlListarCursos();
        echo json_encode($objRespuesta);
    }
    //combo cursoFiltro
    public function ctrListarCursosFiltro()
    {
        $objRespuesta = modeloEstudiantes::mdlListarCursosFiltro();
        echo json_encode($objRespuesta);
    }
    //CRUD ESTUDIANTE
    public function ctrRegistrarEstudiantes()
    {
        $objRespuesta = modeloEstudiantes::mdlRegistrarEstudiantes($this->nombres, $this->apellidos, $this->documento, $this->tipoDocumento, $this->fechaNacimiento, $this->tipoSangre, $this->seguroEstudiantil, $this->telefono, $this->idAcudiente, $this->idCurso, $this->foto);
        echo json_encode($objRespuesta);
    }

    public function ctrListarEstudiantes()
    {
        $objRespuesta = modeloEstudiantes::mdlListarEstudiantes();
        echo json_encode($objRespuesta);
    }

    public function ctrFiltrarCurso()
    {
        $objRespuesta = modeloEstudiantes::mdlFiltrarCursos($this->idCurso);
        echo json_encode($objRespuesta);
    }
    public function ctrModificarEstudiantes1()
    {
        $objRespuesta = modeloEstudiantes::mdlModificarPerosonalSinCambioFoto($this->idEstudiante, $this->nombres, $this->apellidos, $this->documento, $this->tipoDocumento, $this->fechaNacimiento, $this->tipoSangre, $this->seguroEstudiantil, $this->telefono, $this->idAcudiente, $this->idCurso, $this->foto);
        echo json_encode($objRespuesta);
    }
    public function ctrModificarEstudiantes2()
    {
        $objRespuesta = modeloEstudiantes::mdlModificarPerosonalConCambioFoto($this->idEstudiante, $this->nombres, $this->apellidos, $this->documento, $this->tipoDocumento, $this->fechaNacimiento, $this->tipoSangre, $this->seguroEstudiantil, $this->telefono, $this->idAcudiente, $this->idCurso,  $this->foto, $this->fotoAntigua);
        echo json_encode($objRespuesta);
    }

    public function ctrEliminarEstudiantes()
    {
        $objRespuesta = modeloEstudiantes::mdlEliminarEstudiantes($this->idEstudiante, $this->foto);
        echo json_encode($objRespuesta);
    }
}

//combo Curso

if (isset($_POST["cargarCurso"]) == "cargarCurso") {
    $objListarCursos = new estudiantesControl();
    $objListarCursos->ctrListarCursos();
}

//combo CursoFiltro

if (isset($_POST["cargarCursoFiltro"]) == "cargarCursoFiltro") {
    $objListarCursosFiltro = new estudiantesControl();
    $objListarCursosFiltro->ctrListarCursosFiltro();
}
//crud estudiantes

if (isset($_POST["nombres"]) && isset($_POST["apellidos"]) && isset($_POST["documento"]) && isset($_POST["tipoDocumento"]) && isset($_POST["fechaNacimiento"]) && isset($_POST["tipoSangre"]) && isset($_POST["seguroEstudiantil"]) && isset($_POST["telefono"]) && isset($_POST["acudiente"]) && isset($_POST["curso"])) {
    $objEstudiantes = new estudiantesControl();
    $objEstudiantes->nombres = $_POST["nombres"];
    $objEstudiantes->apellidos = $_POST["apellidos"];
    $objEstudiantes->documento = $_POST["documento"];
    $objEstudiantes->tipoDocumento = $_POST["tipoDocumento"];
    $objEstudiantes->fechaNacimiento = $_POST["fechaNacimiento"];
    $objEstudiantes->tipoSangre = $_POST["tipoSangre"];
    $objEstudiantes->seguroEstudiantil = $_POST["seguroEstudiantil"];
    $objEstudiantes->telefono = $_POST["telefono"];
    $objEstudiantes->idAcudiente = $_POST["acudiente"];
    $objEstudiantes->idCurso = $_POST["curso"];
    $objEstudiantes->foto = $_FILES["foto"];
    $objEstudiantes->ctrRegistrarEstudiantes();
}

if (isset($_POST["filtroCurso"])) {
    $objEstudiantes = new estudiantesControl();
    $objEstudiantes->idCurso = $_POST["filtroCurso"];
    $objEstudiantes->ctrFiltrarCurso();
}

if (isset($_POST["cargarEstudiante"]) == "ok") {
    $objEstudiantes = new estudiantesControl();
    $objEstudiantes->ctrListarEstudiantes();
}

if (isset($_POST["opcion1"]) == "fotoNormal") {
    $objEstudiantes = new estudiantesControl();
    $objEstudiantes->nombres = $_POST["editarNombres"];
    $objEstudiantes->apellidos = $_POST["editarApellidos"];
    $objEstudiantes->documento = $_POST["editarDocumento"];
    $objEstudiantes->tipoDocumento = $_POST["editarTipoDocumento"];
    $objEstudiantes->fechaNacimiento = $_POST["editarFechaNacimiento"];
    $objEstudiantes->tipoSangre = $_POST["editarTipoSangre"];
    $objEstudiantes->seguroEstudiantil = $_POST["editarSeguroEstudiantil"];
    $objEstudiantes->telefono = $_POST["editarTelefono"];
    $objEstudiantes->idAcudiente = $_POST["editarIdAcudiente"];
    $objEstudiantes->idCurso = $_POST["editarIdCurso"];
    $objEstudiantes->idEstudiante = $_POST["idEstudiante"];
    $objEstudiantes->foto = $_POST["modFoto"];
    $objEstudiantes->ctrModificarEstudiantes1();
}

if (isset($_POST["opcion2"]) == "fotoArray") {
    $objEstudiantes = new estudiantesControl();
    $objEstudiantes->nombres = $_POST["editarNombres"];
    $objEstudiantes->apellidos = $_POST["editarApellidos"];
    $objEstudiantes->documento = $_POST["editarDocumento"];
    $objEstudiantes->tipoDocumento = $_POST["editarTipoDocumento"];
    $objEstudiantes->fechaNacimiento = $_POST["editarFechaNacimiento"];
    $objEstudiantes->tipoSangre = $_POST["editarTipoSangre"];
    $objEstudiantes->seguroEstudiantil = $_POST["editarSeguroEstudiantil"];
    $objEstudiantes->telefono = $_POST["editarTelefono"];
    $objEstudiantes->idAcudiente = $_POST["editarIdAcudiente"];
    $objEstudiantes->idCurso = $_POST["editarIdCurso"];
    $objEstudiantes->idEstudiante = $_POST["idEstudiante"];
    $objEstudiantes->foto = $_FILES["modFoto"];
    $objEstudiantes->fotoAntigua = $_POST["fotoAnterior"];
    $objEstudiantes->ctrModificarEstudiantes2();
}
if (isset($_POST["eliminarEstudiante"]) && isset($_POST["url"])) {
    $objEstudiantes = new estudiantesControl();
    $objEstudiantes->idEstudiante = $_POST["eliminarEstudiante"];
    $objEstudiantes->foto = $_POST["url"];
    $objEstudiantes->ctrEliminarEstudiantes();
}
