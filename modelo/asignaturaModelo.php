<?php
require_once "conexion.php";

class asignatuaModelo
{

    // ------------------------->Consultas a area<-----------------------

    // ------------------------------------------------------------------
    // --------------Select a Area---------------------------------------
    // ------------------------------------------------------------------
    public static function mdlListarArea()
    {

        $objListarArea = conexion::conectar()->prepare("SELECT * FROM area");
        $objListarArea->execute();
        $listaArea = $objListarArea->fetchAll();
        $objListarArea = null;
        return $listaArea;
    }

    // ------------------------------------------------------------------
    // --------------Insert a Area---------------------------------------
    // ------------------------------------------------------------------

    public static function mdlRegistrarArea($nombreArea)
    {

        $mensaje = "";
        try {
            $objRegistrarArea = conexion::conectar()->prepare("INSERT INTO area(nombreArea) VALUES (:nombreArea)");
            $objRegistrarArea->bindParam(":nombreArea", $nombreArea, PDO::PARAM_STR);

            if ($objRegistrarArea->execute()) {

                $mensaje = "ok";
            } else {

                $mensaje = "error";
            }
        } catch (Exception $e) {

            $mensaje = $e;
        }


        return $mensaje;
    }

    // ------------------------------------------------------------------
    // --------------Update a Area---------------------------------------
    // ------------------------------------------------------------------

    public static function mdlModificiarArea($idArea, $nombreArea)
    {

        $mensaje =  "";
        try {

            $objRespuesta =  conexion::conectar()->prepare("UPDATE area SET nombreArea='$nombreArea' WHERE idArea='$idArea'");

            if ($objRespuesta->execute()) {

                $mensaje = "ok";
            } else {

                $mensaje = "error";
            }

            $objRespuesta = null;
        } catch (Exception $e) {

            $mensaje = $e;
        }


        return $mensaje;
    }

    // ------------------------------------------------------------------
    // --------------Eliminar una Area---------------------------------------
    // ------------------------------------------------------------------

    public static function mdlEliminarArea($idArea)
    {

        $mensaje = "";
        try {

            $objRespuesta = conexion::conectar()->prepare("DELETE FROM area WHERE idArea='$idArea'");


            if ($objRespuesta->execute()) {

                $mensaje = "ok";
            } else {

                $mensaje = "error";
            }

            $objRespuesta = null;
        } catch (Exception $e) {

            $mensaje = "error";
        }


        return $mensaje;
    }



    // ------------------------->Consultas a asignatura<-----------------------

    // ------------------------------------------------------------------
    // -------Select a Asignatura con inner join a Area------------------
    // ------------------------------------------------------------------
    public static function mdListarAsignatura()
    {

        $objListarAsignatura = conexion::conectar()->prepare("SELECT asignatura.idAsignatura,asignatura.nombreAsignatura,area.idArea,area.nombreArea FROM asignatura INNER JOIN area on area.idArea = asignatura.idArea");
        $objListarAsignatura->execute();
        $listaAsignatura = $objListarAsignatura->fetchAll();
        $objListarAsignatura = null;
        return $listaAsignatura;
    }

    // ------------------------------------------------------------------
    // -------Registrar Una asignatura nueva a la tabla------------------
    // ------------------------------------------------------------------
  

    public static function mdlRegistrarAsignatura($nombreAsignatura, $nombreArea)
    {

        $mensaje = "";
        try {
            $objRegistrarAsignatura = conexion::conectar()->prepare("INSERT INTO asignatura(nombreAsignatura,idArea) VALUES (:nombreAsignatura,:idArea)");
            $objRegistrarAsignatura->bindParam(":nombreAsignatura", $nombreAsignatura, PDO::PARAM_STR);
            $objRegistrarAsignatura->bindParam(":idArea", $nombreArea, PDO::PARAM_STR);

            if ($objRegistrarAsignatura->execute()) {

                $mensaje = "ok";
            } else {

                $mensaje = "error";
            }

            $objRegistrarAsignatura = null;
        } catch (Exception $e) {

            $mensaje =  $e;
        }


        return $mensaje;
    }

    // ------------------------------------------------------------------
    // -------Modificar una asignatura ya registrada ------------------
    // ------------------------------------------------------------------
  

    public static function mdlModificarAsignatura($idAsignatura, $nombreAsignatura, $idArea)
    {

        $mensaje =  "";

        try {

            $objModificarAsignatura = conexion::conectar()->prepare("UPDATE asignatura SET nombreAsignatura='$nombreAsignatura', idArea= '$idArea' WHERE idAsignatura='$idAsignatura'");

            if ($objModificarAsignatura->execute()) {

                $mensaje = "ok";
            } else {

                $mensaje = "error";
            }

            $objModificarAsignatura =  null;
        } catch (Exception $e) {
            
            $mensaje=  $e;
        }

        return $mensaje;
    }

    // ------------------------------------------------------------------
    // -------Eliminar una asignatura ya registrada----------------------
    // ------------------------------------------------------------------
  

    public static function mdlEliminarAsigantura($idAsignatura){

        $mensaje =  "";
            
        try {


            $objEliminarAsignatura = conexion::conectar()->prepare("DELETE FROM asignatura WHERE idAsignatura='$idAsignatura'");
        
            if($objEliminarAsignatura->execute()){
    
                $mensaje = "ok";
    
            }else{
    
                $mensaje =  "error";
    
            }
    
            $objEliminarAsignatura =  null;
        } catch (Exception $e) {
            
            $mensaje =  "error2";
            
        }

        return $mensaje;

    }
}
