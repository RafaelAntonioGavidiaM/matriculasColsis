<?php

// archivo de Conexion con la base de datos
require_once "conexion.php";

class asistenciaModelo{


    public static function mdlCargarSelectAsignaturaAsistencia($idCurso){

        $objCargarAsignatura = conexion::conectar()->prepare("SELECT asignatura.idAsignatura,asignatura.nombreAsignatura FROM asignaturacurso INNER JOIN asignatura ON asignaturacurso.idAsignatura=asignatura.idAsignatura WHERE asignaturacurso.idCurso = $idCurso");
        $objCargarAsignatura->execute();
        $listaAsignatura=$objCargarAsignatura->fetchAll();
        $objCargarAsignatura= null;
        return $listaAsignatura;

    }








}