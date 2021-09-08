<?php

require "conexion.php";

class horarioModelo
{
    public static function mdlCargarAsignatura()
    {
        $objConsulta = conexion::conectar()->prepare("SELECT * from asignatura");
        $objConsulta->execute();

        $lista = $objConsulta->fetchAll();

        $objConsulta = null;

        return $lista;
    }

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

    public static function mdlCargarDia()
    {
        $objConsulta = conexion::conectar()->prepare("SELECT * FROM dia");
        $objConsulta->execute();

        $lista = $objConsulta->fetchall();

        $objConsulta = null;

        return $lista;
    }

    public static function mdlInsertar(int $asignatura, $dia, int $horaInicio, int $horaFin)
    {
        $mensaje = "";
        try {
            $objRespuesta = Conexion::conectar()->prepare("INSERT INTO horario()VALUES()");
            
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