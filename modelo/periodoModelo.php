<?php
require_once "conexion.php";

class periodoModelo{

    public static function mdlInsetarPeriodo($n,$i,$f){
        $mensaje="";


        $objConexion= conexion::conectar()->prepare("Insert into periodo(nombrePeriodo,fechaInicio,fechaFin) values(:n,:i,:f)");
        $objConexion->bindParam(":n",$n,PDO::PARAM_STR);
        $objConexion->bindParam(":i",$i,PDO::PARAM_STR);
        $objConexion->bindParam(":f",$f,PDO::PARAM_STR);

        if($objConexion->execute()){

            $mensaje="ok";

        }else{
            $mensaje="error";


        }
        return $mensaje;

    }


    public static function cargarDatos(){
        $objConexion=conexion::conectar()->prepare("select * from periodo");
        $objConexion->execute();
        $lista= $objConexion->fetchAll();
        $objConexion=null;
        return $lista;
    }

    public static function mdlEliminarPeriodo($idPeriodo){

        $mensaje="";


        $objConexion=conexion::conectar()->prepare("Delete from periodo where idPeriodo=:id");
        $objConexion->bindParam(":id",$idPeriodo,PDO::PARAM_INT);


        try {
            if($objConexion->execute()){

                $mensaje="ok";
    
    
               }else{
    
                $mensaje="Este registro es dependencia principal";
    
               }
    
        } catch (\Throwable $th) {
           $mensaje="Hay notas relacionadas a este periodo";
        }
        
           
           return $mensaje;
        
    }



}