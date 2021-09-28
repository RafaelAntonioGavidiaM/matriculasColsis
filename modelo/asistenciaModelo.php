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

    public static function mdlCargarAsistenciaSegunCurso(){

        $objCargarAsistenciaSegunCurso =  conexion::conectar()->prepare("SELECT asistencia.idAsistencia,estudiante.idEstudiante,estudiante.nombres,estudiante.apellidos,curso.nombreCurso,asignatura.nombreAsignatura,asistencia.fechaHora,asistencia.asistencia from asistencia         inner join asignaturacurso on asignaturacurso.idAsignaturaCurso = asistencia.idAsignaturacurso inner join estudiante on asistencia.idEstudiante = estudiante.idEstudiante inner join curso on asignaturacurso.idCurso = curso.idCurso inner join asignatura on asignaturacurso.idAsignatura = asignatura.idAsignatura where asignaturacurso.idAsignaturaCurso = 2 ");
        $objCargarAsistenciaSegunCurso->execute();
        $listaAsistenciaSegunCurso = $objCargarAsistenciaSegunCurso->fetchAll();
        $objCargarAsistenciaSegunCurso=null;
        return $listaAsistenciaSegunCurso;

    }










}