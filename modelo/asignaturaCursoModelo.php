<?php

require "conexion.php"; 

class asignaturaCursoModelo
{
    public static function mdlInsertar(int $asignatura, int $cursoAsignatura, int $docente)
    {
        $mensaje = "";
        try {
            $objRespuesta = Conexion::conectar()->prepare("INSERT INTO asignaturacurso(idAsignatura,idCurso,idDocente)VALUES(:idAsignatura,:idCurso,:idDocente)");
            $objRespuesta->bindParam(":idAsignatura", $asignatura, );
            $objRespuesta->bindParam(":idCurso", $cursoAsignatura, );
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

    public static function mdlCargarAsignatura()
    {
        $objConsulta=conexion::conectar()->prepare("SELECT * from asignatura");
        $objConsulta->execute();

        $lista= $objConsulta->fetchAll();

        $objConsulta=null;

        return $lista;
    }

    public static function mdlCargarCurso()
    {
        $objConsulta=conexion::conectar()->prepare("SELECT * from curso");
        $objConsulta->execute();

        $lista= $objConsulta->fetchAll();

        $objConsulta=null;

        return $lista;
    }


    public static function mdlCargarDocentes()
    {
        $objConsulta=conexion::conectar()->prepare("SELECT * from personal");
        $objConsulta->execute();

        $lista= $objConsulta->fetchAll();

        $objConsulta=null;

        return $lista;
    }

    
    public static function mdlListarTodos()
    {
        $ObjRespuesta = Conexion::conectar()->prepare("select * from asignaturacurso inner join asignatura on asignaturacurso.idAsignatura=asignatura.idAsignatura inner join  personal on asignaturacurso.idDocente=personal.idPersonal inner join curso on asignaturacurso.idCurso=curso.idCurso");
        $ObjRespuesta->execute();
        $listaAsignaturaCurso = $ObjRespuesta->fetchAll();
        $ObjRespuesta = null;
        return $listaAsignaturaCurso;
    }


    public static function mdlModificar ($idAsignaturaCurso,$asignatura, $cursoAsignatura, $docente)
    {
        $mensaje = "";
        try {
            $objRespuesta = Conexion::conectar()->prepare("UPDATE asignaturacurso SET as idAsignatura=:asignatura,idCurso=:cursoAsignatura,idDocente=:docente WHERE idAsignaturaCurso=:idAsignaturaCurso");
            $objRespuesta->bindParam(":asignatura",$asignatura , PDO::PARAM_INT);
            $objRespuesta->bindParam(":cursoAsignatura",$cursoAsignatura , PDO::PARAM_INT);
            $objRespuesta->bindParam(":docente",$docente, PDO::PARAM_INT); 
            $objRespuesta->bindParam(":idAsignaturaCurso",$idAsignaturaCurso, PDO::PARAM_INT);


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

    public static function mdlEliminar($idAsignaturaCurso){
        $mensaje = "";
        try {
            $objRespuesta = Conexion::conectar()->prepare("DELETE FROM asignaturacurso WHERE idAsignaturaCurso='$idAsignaturaCurso'");
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