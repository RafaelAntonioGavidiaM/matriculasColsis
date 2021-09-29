<?php

// archivo de Conexion con la base de datos
require_once "conexion.php";

class asistenciaModelo
{


    public static function mdlCargarSelectAsignaturaAsistencia($idCurso)
    {


        $objCargarAsignatura = conexion::conectar()->prepare("SELECT asignatura.idAsignatura,asignatura.nombreAsignatura FROM asignaturacurso INNER JOIN asignatura ON asignaturacurso.idAsignatura=asignatura.idAsignatura WHERE asignaturacurso.idCurso = $idCurso");
        $objCargarAsignatura->execute();
        $listaAsignatura = $objCargarAsignatura->fetchAll();
        $objCargarAsignatura = null;
        return $listaAsignatura;
    }

    public static function mdlCargarAsistenciaSegunCurso($idCurso, $idAsignatura, $fechaHora)
    {


        $idAsignaturaCurso = asistenciaModelo::consultarIdAsignaturaCurso($idCurso, $idAsignatura);


        $objCargarAsistenciaSegunCurso =  conexion::conectar()->prepare("SELECT asistencia.idAsistencia,estudiante.idEstudiante,estudiante.nombres,estudiante.apellidos,curso.nombreCurso,asignatura.nombreAsignatura,asistencia.fechaHora,asistencia.asistencia from asistencia  inner join asignaturacurso on asignaturacurso.idAsignaturaCurso = asistencia.idAsignaturacurso inner join estudiante on asistencia.idEstudiante = estudiante.idEstudiante inner join curso on asignaturacurso.idCurso = curso.idCurso inner join asignatura on asignaturacurso.idAsignatura = asignatura.idAsignatura where asignaturacurso.idAsignaturaCurso = :idAsignatura and fechaHora=:fh ");
        $objCargarAsistenciaSegunCurso->bindParam(":idAsignatura", $idAsignaturaCurso[0], PDO::PARAM_INT);
        $objCargarAsistenciaSegunCurso->bindParam(":fh", $fechaHora, PDO::PARAM_STR);
        $objCargarAsistenciaSegunCurso->execute();
        $listaAsistenciaSegunCurso = $objCargarAsistenciaSegunCurso->fetchAll();
        $objCargarAsistenciaSegunCurso = null;
        return $listaAsistenciaSegunCurso;
    }

    public static function consultarIdAsignaturaCurso($idCurso, $idAsignatura)
    {
        $objConsultarId = conexion::conectar()->prepare("SELECT idAsignaturaCurso from asignaturacurso where idCurso = $idCurso and idAsignatura = $idAsignatura ");
        $objConsultarId->execute();
        $idAsignaturaCurso = $objConsultarId->fetch();
        $objConsultarId = null;

        return $idAsignaturaCurso;
    }



    public static function mdlInsertarAsistencia($idCurso, $idAsignatura)
    {

        $objEstudiante = asistenciaModelo::cargarEstudiante($idCurso);

        $fechaActual = date("Y-m-d
        ");

        $idAsignaturaCurso = asistenciaModelo::consultarIdAsignaturaCurso($idCurso, $idAsignatura);

        $contador = 0;
        $valor = "Falto";


        for ($i = 0; $i < count($objEstudiante); $i++) {

            $idEstudiante = $objEstudiante[$i]["idEstudiante"];
            $asignaturaCurso = $idAsignaturaCurso[0];

            $objInsertar = conexion::conectar()->prepare("INSERT into asistencia(idAsignaturaCurso,idEstudiante,fechaHora,asistencia) values (:idA,:idE,:f,:v)");

            $objInsertar->bindParam(":f", $fechaActual, PDO::PARAM_STR);
            $objInsertar->bindParam(":idA", $asignaturaCurso, PDO::PARAM_INT);
            $objInsertar->bindParam(":idE", $idEstudiante, PDO::PARAM_INT);
            $objInsertar->bindParam(":v", $valor, PDO::PARAM_STR);



            if ($objInsertar->execute()) {

                $contador++;
            } else {

                break;
                return "error insertando " . $objEstudiante[$i]["nombres"] . " " . $objEstudiante[$i]["apellidos"];
            }
        }
        if ($contador > 0) {

            $resultados = [];
            $resultados[0] = $fechaActual;
            $resultados[1] = "ok";

            return $resultados;
        } else {
            return "error insertando ";
        }
    }




    public static function cargarEstudiante($idCurso)
    {


        $objConsulta = conexion::conectar()->prepare("Select * from estudiante where idCurso=" . $idCurso . "");
        $objConsulta->execute();
        $lista = $objConsulta->fetchAll();

        $objConsulta = null;

        return $lista;
    }


    public static function mdlModificarAsistencia($idAsistencia,$valorAsistencia){
        $mensaje = "";
      
        try {       

            $objConsulta =  conexion::conectar()->prepare("UPDATE asistencia SET asistencia='$valorAsistencia' where idAsistencia='$idAsistencia'");

            if ($objConsulta->execute()) {
                
                $mensaje = "ok";
    
            }else{
    
                $mensaje = "error";
    
            }

            $objConsulta = null;

        } catch (Exception $e) {
            
            $mensaje = $e;
        }
 

        return $mensaje;

    }





    // public static function mdlConsultarIdAsignaturaCurso($idCurso,$idAsignatura){

    //     $objConsultarId = conexion::conectar()->prepare("SELECT idAsignaturaCurso from asignaturacurso where idCurso = $idCurso and idAsignatura = $idAsignatura ");
    //     $objConsultarId->execute();
    //     $idAsignaturaCurso=$objConsultarId;
    //     $objConsultarId=null;


    // }










}
