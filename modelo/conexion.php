<?php

class conexion{


    public static function conectar(){
     
        $nombreServidor="34.70.179.196";
        $baseDatos="dbcolsis";
        $usuarioServidor="colsis";
        $password="colsis2022";

        try {

            $objConexion = new PDO('mysql:host='.$nombreServidor.';dbname='.$baseDatos.';',$usuarioServidor,$password); //instanciar conexion
            $objConexion->exec("set names utf8");

        } catch (Exception $e) {
            $objConexion=$e;
        }
        
        return $objConexion;

    }
}