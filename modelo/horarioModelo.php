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

    public static function mdlInsertar(int $asignatura, int $cursoAsignatura, $dia, int $horaInicio, int $horaFin)
    {
        $mensaje = "";
        try {
            $objRespuesta = Conexion::conectar()->prepare("INSERT INTO horario(asignatura,cursoAsignatura,dia,horaInicio,horaFin)VALUES(:aignatura,:cursoAsignatura,:dia,:horaInico,:horaFin)");
            $objRespuesta->bindParam("asigantura", $asignatura, PDO::PARAM_INT);
            $objRespuesta->bindParam("cursoAsignatura", $cursoAsignatura);
            $objRespuesta->bindParam("dia", $dia, PDO::PARAM_INT);
            $objRespuesta->bindParam("horaInicio", $horaInicio, PDO::PARAM_INT);
            $objRespuesta->bindParam("horaFin", $horaFin, PDO::PARAM_INT);
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
        $ObjRespuesta = Conexion::conectar()->prepare("select  concat(horaInicio,"-",horaFinal)as Hora ,
            case when dia ='Lunes' then asignatura.nombreAsignatura else '' end as 'Lunes',
            case when dia ='Martes' then  asignatura.nombreAsignatura else '' end as 'Martes',
            case when dia ='Miércoles' then  asignatura.nombreAsignatura else '' end as 'Miércoles',
            case when dia ='Jueves' then  asignatura.nombreAsignatura else '' end as 'Jueves',
            case when dia ='Viernes' then  asignatura.nombreAsignatura else '' end as 'Viernes', 
            case when dia ='Sábado' then  asignatura.nombreAsignatura else '' end as 'Sábado',
            case when dia ='Domingo' then  asignatura.nombreAsignatura else '' end as 'Domingo'
            from horario inner join asignaturacurso on asignaturacurso.idAsignaturaCurso=horario.idAsignaturaCurso inner join asignatura on asignatura.idAsignatura= asignaturacurso.idAsignatura where  asignaturacurso.idCurso=2  order by Hora asc");
        $ObjRespuesta->execute();
        $listaHorario = $ObjRespuesta->fetchAll();
        $ObjRespuesta = null;
        return $listaHorario;
    }

}