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


    


    }

    public function ctrModificarAsignatura(){




    }
    

    public function ctrEliminarAsignatura(){




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

if(isset($_POST["nombreAsignatura"]) && isset($_POST["nombreArea"])){

    $objRegistrarAsignatura = new asignaturaControl();
    $objRegistrarAsignatura->nombreAsignatura = $_POST["nombreAsignatura"];
    $objRegistrarAsignatura->nombreArea = $_POST["nombreArea"];
    $objRegistrarAsignatura->ctrRegistrarAsignatura();


}