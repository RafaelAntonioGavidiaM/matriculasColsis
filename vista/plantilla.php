<?php

session_start();

if ($_SESSION == null) {

    include_once "index.php";
} else {

    include_once "vista/modulos/cabecera.php";


    if (isset($_GET["ruta"])) {

        if ($_GET["ruta"] == "rol" ||
            $_GET["ruta"] == "estudiante"   ) {


            include_once "vista/modulos/" . $_GET["ruta"] . ".php";
        }
    }

    
}








