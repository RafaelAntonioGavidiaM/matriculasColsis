<?php

include_once "conexion.php";

class persnalModelo{


    public static function mdlListarPersonal(){

        $objListarPersonal = conexion::conectar()->prepare("SELECT * FROM personal");
        $objListarPersonal->execute();
        $listaPersonal = $objListarPersonal->fetchAll();
        $objListarPersonal = null;
        return $listaPersonal;





    }

    public static function mdlListarRol(){

        $objListarRol = conexion::conectar()->prepare("SELECT * FROM rol");
        $objListarRol->execute();
        $listaRol = $objListarRol->fetchAll();
        $objListarRol = null;
        return $listaRol;
    }




}