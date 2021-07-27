<?php

session_start();

if ($_SESSION == null) {

    include_once "index.php";
} else {

    include_once "vista/modulos/cabecera.php";


    if (isset($_GET["ruta"])) {

<<<<<<< HEAD
        if ($_GET["ruta"] == "rol" || $_GET["ruta"] == "personal" ) {
=======
        if ($_GET["ruta"] == "rol" ||
            $_GET["ruta"] == "estudiante"   ) {
>>>>>>> origin


            include_once "vista/modulos/" . $_GET["ruta"] . ".php";
        }
    }

    
}








