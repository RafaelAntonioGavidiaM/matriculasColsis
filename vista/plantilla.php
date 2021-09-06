<?php

include_once "modelo/rolModelo.php";

session_start();

if ($_SESSION == null) {

    include_once "index.php";
} else {

    $idConsulta = $_SESSION["codRol"];

    $objPermisos = rolModelo::mdlConsultaPermisosIdRol($idConsulta);
    $_SESSION["permisos"] = $objPermisos;









    $contador = 0;
    //$ruta = $_GET["ingreso"];


    if (isset($_GET["ruta"])) {

        

        foreach ($objPermisos as $key => $value) {
            $rest = substr($value["nombreFormulario"], 3);
            $minus = strtolower($rest); // minusculas
            if ($_GET["ruta"] == $minus && $value["idPermiso"] == 1) {
                $contador++;

                include_once "vista/modulos/cabecera.php";

<<<<<<< HEAD
                if ($_GET["ruta"] == "rol" || $_GET["ruta"] == "personal" || $_GET["ruta"] == "estudiante"  ||  $_GET["ruta"] == "cursos" ||  $_GET["ruta"] == "reporte") {
=======
                if ($_GET["ruta"] == "rol" || $_GET["ruta"] == "personal" || $_GET["ruta"] == "estudiante" ||  $_GET["ruta"] == "cursos" ||  $_GET["ruta"] == "nota" ||  $_GET["ruta"] == "asignaturacurso" ) {
>>>>>>> 098f483fed15ac45a99bcf04f125366963d56898


                    include_once "vista/modulos/" . $_GET["ruta"] . ".php";
                }
            }
        }
    } else if ($_GET["ingreso"] == 1) {
        $contador++;

        include_once "vista/modulos/cabecera.php";
    }



    if ($contador == 0) {
        include_once "vista/modulos/error.php";
    }
}
