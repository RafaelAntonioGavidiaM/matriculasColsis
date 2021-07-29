<?php
include_once "conexion.php";

class modeloEstudiantes
{
    //cargar Combo Acudiente
    public static function mdlListarAcudientes()
    {
        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM acudiente");
        $objRespuesta->execute();
        $listarAcudientes = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $listarAcudientes;
    }
    //cargar Combo Curso
    public static function mdlListarCursos()
    {
        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM curso");
        $objRespuesta->execute();
        $listarCursos = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $listarCursos;
    }
    public static function mdlRegistrarEstudiantes($nombres, $apellidoss, $documento, $tipoDocumento, $fechaNacimiento, $tipoSangre, $seguroEstudiantil, $telefono, $idAcudiente, $idCurso)
    {

        try {
            $objRegistrarEstudiante = Conexion::conectar()->prepare("INSERT INTO estudiante(nombres,apellidos,documento,tipoDocumento,fechaNacimiento,tipoSangre,seguroEstudiantil,telefono,idAcudiente,idCurso)VALUES(:nombres,:apellidos,:documento,:tipoDocumento,:fechaNacimiento,:tipoSangre,:seguroEstudiantil,:telefono,:idAcudiente,:idCurso)");
            $objRegistrarEstudiante->bindParam(":nombres", $nombres, PDO::PARAM_STR);
            $objRegistrarEstudiante->bindParam(":apellidos", $apellidoss, PDO::PARAM_STR);
            $objRegistrarEstudiante->bindParam(":documento", $documento, PDO::PARAM_STR);
            $objRegistrarEstudiante->bindParam(":tipoDocumento", $tipoDocumento, PDO::PARAM_STR);
            $objRegistrarEstudiante->bindParam(":fechaNacimiento", $fechaNacimiento);
            $objRegistrarEstudiante->bindParam(":tipoSangre", $tipoSangre, PDO::PARAM_STR);
            $objRegistrarEstudiante->bindParam(":seguroEstudiantil", $seguroEstudiantil, PDO::PARAM_STR);
            $objRegistrarEstudiante->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $objRegistrarEstudiante->bindParam(":idAcudiente", $idAcudiente, PDO::PARAM_INT);
            $objRegistrarEstudiante->bindParam(":idCurso", $idCurso, PDO::PARAM_INT);


            if ($objRegistrarEstudiante->execute()) {
                $mensaje = "ok";
            } else {
                $mensaje = "error";
            }
            $objRegistrarEstudiante = null;
        } catch (Exception $e) {
            $mensaje = $e;
        }

        return $mensaje;
    }

    public static function mdlListarEstudiantes()
    {
        $objListaEstudiantes = Conexion::conectar()->prepare("SELECT * FROM estudiante");
        $objListaEstudiantes->execute();
        $listaEstudiantes = $objListaEstudiantes->fetchAll();
        $objListaEstudiantes = null;
        return $listaEstudiantes;
    }

    public static function mdlModificarEstudiantes($nombres, $apellidos, $documento, $tipoDocumento, $fechaNacimiento, $tipoSangre, $seguroEstudiantil, $telefono, $idAcudiente, $idCurso,$idEstudiante)
    {

        $mesaje = "";
        try {
            $objModificarEstudiantes = Conexion::conectar()->prepare("UPDATE estudiante SET nombres='$nombres',apellidos='$apellidos',documento='$documento',tipoDocumento='$tipoDocumento',fechaNacimiento='$fechaNacimiento',tipoSangre='$tipoSangre',seguroEstudiantil='$seguroEstudiantil',telefono='$telefono',idAcudiente='$idAcudiente',idCurso='$idCurso' WHERE idEstudiante='$idEstudiante'");

            if ($objModificarEstudiantes->execute()) {
                $mesaje = "ok";
            } else {
                $mesaje = "error";
            }
            $objModificarEstudiantes = null;
        } catch (Exception $e) {
            $mesaje = $e;
        }

        return $mesaje;
    }

    public static function mdlEliminarEstudiantes($idEstudiante){   
        $mensaje = "";
        try {
            $objEliminarEstudiante = Conexion::conectar()->prepare("DELETE FROM estudiante WHERE idEstudiante='$idEstudiante'");
            if ($objEliminarEstudiante->execute()) {
                $mensaje = "ok";
            } else {
                $mensaje = "error";
            }
            $objEliminarEstudiante = null;
        } catch (Exception $e) {
            $mensaje = $e;
        }

        return $mensaje;


    }
}
