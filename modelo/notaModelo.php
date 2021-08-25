<?php
require "conexion.php";

class notaModelo{

    public static function cargarGrados($idPersonal){

        $objConexion= conexion::conectar()->prepare("select distinct(nombreCurso),curso.idCurso from asignaturacurso inner join asignatura on asignatura.idAsignatura=asignaturacurso.idAsignatura inner join curso on curso.idCurso = asignaturacurso.idCurso inner join personal on personal.idPersonal= asignaturacurso.idDocente where personal.idPersonal =".$idPersonal."");
        $objConexion->execute();
        $lista= $objConexion->fetchAll();

        $objConexion=null;
        return $lista;
    
    }

    public static function cargarAsignaturas($idPersonal,$idCurso){

        $objConexion= conexion::conectar()->prepare("select asignatura.idAsignatura, asignatura.nombreAsignatura from asignaturacurso inner join asignatura on asignatura.idAsignatura=asignaturacurso.idAsignatura inner join curso on curso.idCurso = asignaturacurso.idCurso inner join personal on personal.idPersonal= asignaturacurso.idDocente  where curso.idCurso=".$idCurso." and personal.idPersonal=".$idPersonal."");
        $objConexion->execute();
        $lista= $objConexion->fetchAll();

        $objConexion=null;
        return $lista;
    
    }
    

    



}
