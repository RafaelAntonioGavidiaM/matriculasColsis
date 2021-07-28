<?php

include_once "conexion.php";

class CursosModelo
{
    public static function mdlInsertar($curso, $nombreCurso, $año, $docente)
    {
        $mensaje = "";
        try {
            $objRespuesta = Conexion::conectar()->prepare("INSERT INTO curso(curso,nombreCurso,año,idDocente)VALUES(:curso,:nombreCurso,:año,:idDocente)");
            $objRespuesta->bindParam(":curso", $curso, PDO::PARAM_STR);
            $objRespuesta->bindParam(":nombreCurso", $nombreCurso, PDO::PARAM_STR);
            $objRespuesta->bindParam(":año", $año, PDO::PARAM_INT);
            $objRespuesta->bindParam(":idDocente", $docente, PDO::PARAM_STR);
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

    public static function mdlListarTodos()
    {
        $ObjRespuesta = Conexion::conectar()->prepare("SELECT * FROM curso");
        $ObjRespuesta->execute();
        $listaCarro = $ObjRespuesta->fetchAll();
        $ObjRespuesta = null;
        return $listaCarro;
    }

    public static function mdlModificar($idCurso, $curso, $nombreCurso, $año, $docente)
    {
        $mensaje = "";
        try {
            $objRespuesta = Conexion::conectar()->prepare("UPDATE curso SET curso='$curso',nombreCurso='$nombreCurso',año='$año',docente='$docente' WHERE idCurso='$idCurso'");
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

    public static function mdlEliminar($idCurso){
        $mensaje = "";
        try {
            $objRespuesta = Conexion::conectar()->prepare("DELETE FROM curso WHERE idCurso='$idCurso'");
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
}