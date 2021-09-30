<?php

require "conexion.php";

class horarioModelo
{
    public static function mdlCargarAsignaturadeIdCurso($idCurso)
    {
        $objConsulta = conexion::conectar()->prepare("select * from asignaturacurso inner join asignatura on asignatura.idAsignatura=asignaturacurso.idAsignatura where idCurso=" . $idCurso . "");
        $objConsulta->execute();

        $lista = $objConsulta->fetchAll();

        $objConsulta = null;

        return $lista;
    }



    /////


    public static function mdlCargarCurso()
    {
        $objConsulta = conexion::conectar()->prepare("SELECT * from curso");
        $objConsulta->execute();

        $lista = $objConsulta->fetchAll();

        $objConsulta = null;

        return $lista;
    }

    public static function mdlCargarCursoHorario()
    {
        $objConsulta = conexion::conectar()->prepare("SELECT * FROM curso");
        $objConsulta->execute();

        $lista = $objConsulta->fetchall();

        $objConsulta = null;

        return $lista;
    }

    public static function validacion($dia, $horaInicio, $horaFin)
    {


        $objConsulta = conexion::conectar()->prepare("select * from horario where  dia=:d and horaInicio=:hi and horaFinal=:hF ");


        $objConsulta->bindParam(":d", $dia, PDO::PARAM_STR);
        $objConsulta->bindParam(":hi", $horaInicio, PDO::PARAM_STR);
        $objConsulta->bindParam(":hF", $horaFin, PDO::PARAM_STR);

        $objConsulta->execute();

        $respuesta = $objConsulta->fetch();

        return $respuesta;
    }

    public static function mdlInsertar($asignatura, $cursoAsignatura, $dia,  $horaInicio, $horaFin)
    {

        $mensaje = "";

        $idAsignaturaCurso = horarioModelo::consultarAsignaturaCurso($cursoAsignatura, $asignatura);

        $respuesta = horarioModelo::validacion( $dia, $horaInicio, $horaFin);




        if ($respuesta != null || $respuesta != "" || $respuesta != "") {

            return "Ya existe un registro para ese dia y hora";
        } else {

            try {
                $objRespuesta = Conexion::conectar()->prepare("INSERT INTO horario(dia,horaInicio,horaFinal,idAsignaturaCurso)VALUES(:dia,:horaInicio,:horaFin,:id)");
                $objRespuesta->bindParam(":dia", $dia, PDO::PARAM_STR);
                $objRespuesta->bindParam(":horaInicio", $horaInicio, PDO::PARAM_STR);
                $objRespuesta->bindParam(":horaFin", $horaFin, PDO::PARAM_STR);
                $objRespuesta->bindParam(":id", $idAsignaturaCurso, PDO::PARAM_INT);
                if ($objRespuesta->execute()) {
                    $mensaje = "Registrado Correctamente";
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


    public static function consultarAsignaturaCurso($idCurso, $idAsignatura)
    {

        $objConsulta = conexion::conectar()->prepare("SELECT idAsignaturaCurso from asignaturacurso where idCurso=" . $idCurso . " and idAsignatura=" . $idAsignatura . "");
        $objConsulta->execute();
        $lista = $objConsulta->fetch();

        $devolver = $lista[0];

        return $devolver;
    }

    public static function mdlListarTodos($idCurso)
    {
        $ObjRespuesta = conexion::conectar()->prepare(" select  concat(horaInicio,'-',horaFinal)as Hora ,horario.idHorario, asignatura.nombreAsignatura ,dia from horario inner join asignaturacurso on asignaturacurso.idAsignaturaCurso=horario.idAsignaturaCurso inner join asignatura on asignatura.idAsignatura= asignaturacurso.idAsignatura where asignaturacurso.idCurso=:id order by Hora asc, field(dia, 'Lunes','Martes', 'Miercoles','Jueves', 'Viernes','Sabado','Domingo'); ");
        $ObjRespuesta->bindParam(":id", $idCurso, PDO::PARAM_INT);
        $ObjRespuesta->execute();
        $listaHorario = $ObjRespuesta->fetchAll();

        $ObjRespuesta = null;
        return $listaHorario;
    }

    public static function mdlEliminarHorario($idHorario)
    {
        $mensaje = "";

        $objConsulta = conexion::conectar()->prepare("DELETE FROM horario where idHorario=" . $idHorario . "");
        if ($objConsulta->execute()) {

            $mensaje = "ok";
        } else {

            $mensaje = "error";
        }

        return $mensaje;
    }

    public static function mdlConsultarHorarioId($idHorario)
    {
        $objConsulta = conexion::conectar()->prepare("select  horaInicio,horaFinal ,horario.idHorario, asignatura.nombreAsignatura ,dia from horario inner join asignaturacurso on asignaturacurso.idAsignaturaCurso=horario.idAsignaturaCurso inner join asignatura on asignatura.idAsignatura= asignaturacurso.idAsignatura where idHorario=" . $idHorario . " order    by field(dia, 'Lunes','Martes', 'Miercoles','Jueves', 'Viernes','Sabado','Domingo')");
        $objConsulta->execute();
        $lista = $objConsulta->fetchAll();
        $objConsulta = null;
        return $lista;
    }

    public static function mdlModificarHorario($idHorario, $dia, $horaI, $horaF)
    {

        $mensaje = "";

        $respuesta = horarioModelo::validacion($dia, $horaI, $horaF);

        if ($respuesta != null || $respuesta != "" || $respuesta != "") {

            return "Ya existe un registro para ese dia y hora";
        } else {






            $objConsulta = conexion::conectar()->prepare("UPDATE horario set dia=:dia,horaInicio=:hI,horaFinal=:hF where idHorario=:id ");
            $objConsulta->bindParam(":dia", $dia, PDO::PARAM_STR);
            $objConsulta->bindParam(":hI", $horaI, PDO::PARAM_STR);
            $objConsulta->bindParam(":hF", $horaF, PDO::PARAM_STR);
            $objConsulta->bindParam(":id", $idHorario, PDO::PARAM_STR);

            if ($objConsulta->execute()) {

                $mensaje = "ok";
            } else {

                $mensaje = "error";
            }

            return $mensaje;
        }
    }
}
