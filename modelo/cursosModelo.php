<?php

include_once "conexion.php";

class CursosModelo
{
    public static function mdlInsertar($curso, $nombreCurso, $año,int $docente)
    {
        $mensaje = "";
        try {
            $objRespuesta = Conexion::conectar()->prepare("INSERT INTO curso(curso,nombreCurso,año,idDocente)VALUES(:curso,:nombreCurso,:a,:idDocente)");
            $objRespuesta->bindParam(":curso", $curso, PDO::PARAM_STR);
            $objRespuesta->bindParam(":nombreCurso", $nombreCurso, PDO::PARAM_STR);
            $objRespuesta->bindParam(":a", $año, PDO::PARAM_STR);
            $objRespuesta->bindParam(":idDocente", $docente);
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
        $ObjRespuesta = Conexion::conectar()->prepare("select curso.idCurso,curso.curso,curso.nombreCurso,curso.año,curso.idDocente,personal.idPersonal,personal.nombre,personal.apellido from  curso inner join personal on curso.idDocente=personal.idPersonal");
        $ObjRespuesta->execute();
        $listaCarro = $ObjRespuesta->fetchAll();
        $ObjRespuesta = null;
        return $listaCarro;
    }

    public static function mdlModificar ($idCurso,$curso, $nombreCurso, $año,  $docente)
    {
        $mensaje = "";
        try {
            $objRespuesta = Conexion::conectar()->prepare("UPDATE curso SET curso=:curso,nombreCurso=:nombre,año=:a,idDocente=:docente WHERE idCurso=:idCurso");
            $objRespuesta->bindParam(":curso",$curso , PDO::PARAM_STR);
            $objRespuesta->bindParam(":nombre",$nombreCurso , PDO::PARAM_STR);
            $objRespuesta->bindParam(":a",$año, PDO::PARAM_STR);
            $objRespuesta->bindParam(":docente",$docente, PDO::PARAM_INT);
            $objRespuesta->bindParam(":idCurso",$idCurso, PDO::PARAM_INT);


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

    public static function mdlCargarDocentes()
    {
        $objConsulta=conexion::conectar()->prepare("SELECT * from personal");
        $objConsulta->execute();

        $lista= $objConsulta->fetchAll();

        $objConsulta=null;

        return $lista;
    }
   
}