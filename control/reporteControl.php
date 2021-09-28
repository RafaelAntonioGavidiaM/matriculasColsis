
<?php

include_once "../modelo/reporteModelo.php";

class reporteControl
{
    public $idCurso;

    public function ctrListarPerido()
    {
        $objRespuesta = modeloReportes::mdlListarReportes();
        echo json_encode($objRespuesta);
    }
    public function ctrListarGrado()
    {
        $objRespuesta = modeloReportes::mdlListarGrados();
        echo json_encode($objRespuesta);
    }
    public function ctrCargarGrado()
    {
        $objRespuesta = modeloReportes::mdlCargarGrado($this->idCurso);
        echo json_encode($objRespuesta);
    }
}

if (isset($_POST["cargarPeriodo"]) == "cargarPeriodo") {
    $objListarPeriodos = new reporteControl();
    $objListarPeriodos->ctrListarPerido();
};
if (isset($_POST["cargarGrado"]) == "cargarGrado") {
    $objListarGrados = new reporteControl();
    $objListarGrados->ctrListarGrado();
};
if (isset($_POST["filtroGrado"]) == "ok" && isset($_POST["filtroGrado"])) {
    $objCargarGrados = new reporteControl();
    $objCargarGrados->idCurso = $_POST["filtroGrado"];
    $objCargarGrados->ctrCargarGrado();
}