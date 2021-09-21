<?php

include_once "../modelo/asignaturaModelo.php";

class asignaturaControl
{

    // ----------->VARIABLES DE AREA
    public $idArea;
    public $nombreArea;


    // ----------->VARIABLES DE ASIGNATURA

    public $idAsignatura;
    public $nombreAsignatura;

    // ------------------------>Controles de Area<-----------------------

    public function ctrListarArea()
    {


        $objRespuesta =  asignatuaModelo::mdlListarArea();
        echo json_encode($objRespuesta);
    }

    public function ctrRegistrarArea()
    {

        $objRespuesta =  asignatuaModelo::mdlRegistrarArea($this->nombreArea);
        echo json_encode($objRespuesta);
    }

    public function ctrModificarArea()
    {

        $objRespuesta = asignatuaModelo::mdlModificiarArea($this->idArea, $this->nombreArea);
        echo json_encode($objRespuesta);
    }

    public function ctrEliminarArea()
    {

        $objRespuesta = asignatuaModelo::mdlEliminarArea($this->idArea);
        echo json_encode($objRespuesta);
    }


    // ------------------------>Controles de Asignatura<-----------------------

    public function ctrListarAsignatura(){


        $objRespuesta = asignatuaModelo::mdListarAsignatura();
        echo json_encode($objRespuesta);

    }

    public function ctrListarSelectAsignatura(){


        $objRespuesta = asignatuaModelo::mdlListarArea();
        echo json_encode($objRespuesta);


    }

    public function ctrRegistrarAsignatura(){


        $objRespuesta = asignatuaModelo::mdlRegistrarAsignatura($this->nombreAsignatura,$this->nombreArea);
        echo json_encode($objRespuesta);


    }

    public function ctrModificarAsignatura(){

        $objRespuesta =  asignatuaModelo::mdlModificarAsignatura($this->idAsignatura,$this->nombreAsignatura, $this->idArea);
        echo json_encode($objRespuesta);


    }
    

    public function ctrEliminarAsignatura(){

        $objRespuesta = asignatuaModelo::mdlEliminarAsigantura($this->idAsignatura);
        echo json_encode($objRespuesta);


    }
}
// ------------>VALIDACIONES DE AREA<------------------------------

// ------------------------------------------------------------------
// --------------Listar Datos de Area en la tabla----------------
// ------------------------------------------------------------------


if (isset($_POST["cargarAreas"]) ==  "ok") {

    $objListarArea =  new asignaturaControl();
    $objListarArea->ctrListarArea();
}

// ------------------------------------------------------------------
// --------------Registrar nueva Area---------------------------
// ------------------------------------------------------------------


if (isset($_POST["nombreArea"])) {

    $objRegArea =  new asignaturaControl();
    $objRegArea->nombreArea = $_POST["nombreArea"];
    $objRegArea->ctrRegistrarArea();
}

// ------------------------------------------------------------------
// --------------Modificar una Area registrada-----------------------
// ------------------------------------------------------------------

if (isset($_POST["modNombreArea"]) && isset($_POST["idArea"])) {

    $objModificarArea  = new asignaturaControl();
    $objModificarArea->idArea = $_POST["idArea"];
    $objModificarArea->nombreArea = $_POST["modNombreArea"];
    $objModificarArea->ctrModificarArea();
}

// ------------------------------------------------------------------
// --------------Eliminar una Area registrada-----------------------
// ------------------------------------------------------------------

if (isset($_POST["idDeleteArea"])) {

    $objDeleteArea = new asignaturaControl();
    $objDeleteArea->idArea = $_POST["idDeleteArea"];
    $objDeleteArea->ctrEliminarArea();
}


// ------------>VALIDACIONES DE ASIGNATURA<------------------------------

// ------------------------------------------------------------------
// --------------Listar Datos de Asignatura en la tabla--------------
// ------------------------------------------------------------------


if (isset($_POST["listaAsignatura"]) ==  "ok") {

    $objListarArea =  new asignaturaControl();
    $objListarArea->ctrListarAsignatura();
}

// ------------------------------------------------------------------
// --------------Listar AREA en select de reg y mod------------------
// ------------------------------------------------------------------

if (isset($_POST["listarSelectArea"]) ==  "ok") {

    $objListarArea =  new asignaturaControl();
    $objListarArea->ctrListarSelectAsignatura();
}

// ------------------------------------------------------------------
// --------------Reguistrar Asignatura ------------------------------
// ------------------------------------------------------------------

if(isset($_POST["nombreAsignatura"]) && isset($_POST["regNombreArea"])){

    $objRegistrarAsignatura = new asignaturaControl();
    $objRegistrarAsignatura->nombreAsignatura = $_POST["nombreAsignatura"];
    $objRegistrarAsignatura->nombreArea = $_POST["regNombreArea"];
    $objRegistrarAsignatura->ctrRegistrarAsignatura();


}

// ------------------------------------------------------------------
// --------------Modificar una Asignatura registrada-----------------
// ------------------------------------------------------------------

if(isset($_POST["idModAsignatura"])&& isset($_POST["modNombreAsignatura"]) && isset($_POST["idModArea"])){


    $objModificarAsignatura =  new asignaturaControl();
    $objModificarAsignatura->idAsignatura = $_POST["idModAsignatura"];
    $objModificarAsignatura->nombreAsignatura = $_POST["modNombreAsignatura"];
    $objModificarAsignatura->idArea = $_POST["idModArea"];
    $objModificarAsignatura->ctrModificarAsignatura();


}

// ------------------------------------------------------------------
// --------------Eliminar una Asignatura registrada-----------------
// ------------------------------------------------------------------

if(isset($_POST["idDeleteAsignatura"])){

    $objEliminarAsignatura =  new asignaturaControl();
    $objEliminarAsignatura->idAsignatura = $_POST["idDeleteAsignatura"];
    $objEliminarAsignatura->ctrEliminarAsignatura();


}