<?php
include_once "conexion.php";


class modeloReportes
{
    public static function mdlListarReportes()
    {
        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM periodo");
        $objRespuesta->execute();
        $listarPeriodos = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $listarPeriodos;
    }
    public static function mdlListarGrados()
    {
        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM curso");
        $objRespuesta->execute();
        $listarGrados = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $listarGrados;
    }
    public static function mdlCargarGrado($idCurso)
    {
        $objCargarReportes = Conexion::conectar()->prepare("select  estudiante.idEstudiante,estudiante.nombres,estudiante.apellidos,estudiante.idAcudiente,acudiente.nombre,acudiente.apellido,curso.idCurso,curso.nombreCurso from  estudiante inner join acudiente on acudiente.idAcudiente=estudiante.idAcudiente inner join curso on curso.idCurso=estudiante.idCurso  where curso.idCurso ='$idCurso';");
        $objCargarReportes->execute();
        $listaReportes = $objCargarReportes->fetchAll();
        $objCargarReportes = null;
        return $listaReportes;
    }
    public static function mdlListarReportesPdf($idEstudiante)
    {
        $objListaReporte = Conexion::conectar()->prepare("select  estudiante.idEstudiante,estudiante.nombres,estudiante.apellidos,estudiante.url,estudiante.idAcudiente,acudiente.nombre,acudiente.apellido,curso.idCurso,curso.nombreCurso from  estudiante inner join acudiente on acudiente.idAcudiente=estudiante.idAcudiente inner join curso on curso.idCurso=estudiante.idCurso  where estudiante.idEstudiante ='$idEstudiante'");
        $objListaReporte->execute();
        $listaReporte = $objListaReporte->fetch();
        $objListaReporte = null;
        return $listaReporte;
    }
}
