<?php

class conexion
{


    public static function conectar(){

        
<<<<<<< HEAD
        // $nombreServidor="localhost";
=======
        $nombreServidor="localhost";
        $baseDatos="colsissena";
        $usuarioServidor="root";
        $password="";
     
        // $nombreServidor="35.225.225.25";
>>>>>>> origin/master
        // $baseDatos="dbcolsis";
        // $usuarioServidor="root";
        // $password="";
     
        $nombreServidor="35.225.225.25";
        $baseDatos="dbcolsis";
        $usuarioServidor="colsis";
        $password="colsis2022";

        try {

            $objConexion = new PDO('mysql:host=' . $nombreServidor . ';dbname=' . $baseDatos . ';', $usuarioServidor, $password); //instanciar conexion
            $objConexion->exec("set names utf8");
        } catch (Exception $e) {
            $objConexion = $e;
        }

        return $objConexion;
    }
}
