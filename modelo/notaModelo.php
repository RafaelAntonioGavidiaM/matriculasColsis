<?php
require "conexion.php";

class notaModelo
{

    public static function cargarGrados($idPersonal)
    {  //Cargo los grados que tiene el personal logueado 

        $objConexion = conexion::conectar()->prepare("select distinct(nombreCurso),curso.idCurso from asignaturacurso inner join asignatura on asignatura.idAsignatura=asignaturacurso.idAsignatura inner join curso on curso.idCurso = asignaturacurso.idCurso inner join personal on personal.idPersonal= asignaturacurso.idDocente where personal.idPersonal =" . $idPersonal . "");
        $objConexion->execute();
        $lista = $objConexion->fetchAll();

        $objConexion = null;
        return $lista;
    }

    public static function cargarAsignaturas($idPersonal, $idCurso)
    { //cargo las asignaturas de los grados 

        $objConexion = conexion::conectar()->prepare("select asignatura.idAsignatura, asignatura.nombreAsignatura from asignaturacurso inner join asignatura on asignatura.idAsignatura=asignaturacurso.idAsignatura inner join curso on curso.idCurso = asignaturacurso.idCurso inner join personal on personal.idPersonal= asignaturacurso.idDocente  where curso.idCurso=" . $idCurso . " and personal.idPersonal=" . $idPersonal . "");
        $objConexion->execute();
        $lista = $objConexion->fetchAll();

        $objConexion = null;
        return $lista;
    }

    public function retornarIdPeriodo()
    { // Conozco en que periodo estoy actual 
        $fechActual = date("Y-m-d");




        $objConexion = conexion::conectar()->prepare("select idPeriodo,nombrePeriodo from periodo where  fechaInicio <=:fecha  and  fechaFin>=:fecha");
        $objConexion->bindParam(":fecha", $fechActual, PDO::PARAM_STR);

        $objConexion->execute();
        $lista = $objConexion->fetch();
        $objConexion = null;
        return $lista;
    }

    public static function mdlRegistrarNota($nombreNota, $permiso, $asignatura, $idCurso)
    { // Registra una nueva nota 


        $mensaje = "";
        session_start();
        $idPersonal = $_SESSION["idPersonal"];
        $Periodo = new notaModelo();
        $periodoActual = $Periodo->retornarIdPeriodo();
        $idPeriodo = $periodoActual[0][0];
        $str = strtoupper($nombreNota); //mayuscula


        $objConexion = conexion::conectar()->prepare("insert into nota(nombreNota,estadoNota,idAsignatura,idCurso,idDocente,idPeriodo) values (:nombre,:estado,:asignatura,:curso,:docente,:periodo)");
        $objConexion->bindParam(":nombre", $str, PDO::PARAM_STR);
        $objConexion->bindParam(":estado", $permiso, PDO::PARAM_INT);
        $objConexion->bindParam(":asignatura", $asignatura, PDO::PARAM_INT);
        $objConexion->bindParam(":curso", $idCurso, PDO::PARAM_INT);
        $objConexion->bindParam(":docente", $idPersonal, PDO::PARAM_INT);
        $objConexion->bindParam(":periodo", $idPeriodo, PDO::PARAM_INT);

        if ($objConexion->execute()) {
            $mensaje = "ok";


            $listaEstudiantes = new notaModelo();
            $recorerEstudiantes = $listaEstudiantes->cargarEstudiantesCurso($idCurso);

            if ($recorerEstudiantes != null && $recorerEstudiantes != 0) {
                $idRegistro = new notaModelo();
                $idNota = $idRegistro->idRegistro();
                $id = $idNota[0];
                $nota = 0;

                foreach ($recorerEstudiantes as $key => $value) {

                    $idEstudiante = $value["idEstudiante"];

                    $objRegistrarNotaNull = conexion::conectar()->prepare("insert into asignaturanota(nota,idNota,idEstudiante) values(:n,:idNota,:idEstudiante) ");
                    $objRegistrarNotaNull->bindParam(":n", $nota, PDO::PARAM_INT);
                    $objRegistrarNotaNull->bindParam(":idNota", $id, PDO::PARAM_INT);
                    $objRegistrarNotaNull->bindParam(":idEstudiante", $idEstudiante, PDO::PARAM_INT);

                    if ($objRegistrarNotaNull->execute()) {

                        $mensaje = "ok";
                    }
                }
            } else {

                $mensaje = "Se registro la nota pero no se encontraron estudiantes en el curso :(";
            }
        } else {

            $mensaje = "Hubo un error";
        }

        return $mensaje;
    }


    public  function cargarEstudiantesCurso($idCurso)
    { // cargo los estudiantes que pertencen ese curso

        $objConexion = conexion::conectar()->prepare("select * from estudiante where idCurso=" . $idCurso . "");
        $objConexion->execute();
        $lista = $objConexion->fetchAll();
        $objConexion = null;
        return $lista;
    }

    public function idRegistro()
    { // conozco con que id quedo registrada  la nota en la  tabla nota
        $objConexion = conexion::conectar()->prepare("Select  MAX(idNota) AS id FROM nota");
        $objConexion->execute();
        $lista = $objConexion->fetch();
        $objConexion = null;
        return $lista;
    }

    public static function cargarNotas($idAsignatura, $idCurso)
    { // cargo el nombre de las notas para  poder hacer otra consulta que me traiga los resultados

        $objPerido = new notaModelo;
        $periodo = $objPerido->retornarIdPeriodo();

        $idPeriodo = $periodo[0][0];
        $objConsulta = conexion::conectar()->prepare(" select  nombreNota  from nota where idCurso=:curso and idAsignatura=:asignatura and idPeriodo=:periodo");
        $objConsulta->bindParam(":curso", $idCurso, PDO::PARAM_INT);
        $objConsulta->bindParam(":asignatura", $idAsignatura, PDO::PARAM_INT);
        $objConsulta->bindParam(":periodo", $idPeriodo, PDO::PARAM_INT);
        $objConsulta->execute();
        $lista = $objConsulta->fetchAll();
        $objConsulta = null;
        return $lista;
    }

    public static function mdlConsultarNotas($idAsignatura, $idCurso)
    { //consulto las notas  de asignatura y curso

        
        $concatenar = "";

        $objRespuestaNombreNotas = notaModelo::cargarNotas($idAsignatura, $idCurso);
        $objPerido = new notaModelo;
        $periodo = $objPerido->retornarIdPeriodo();

        $idPeriodo = $periodo[0][0];

        $ciclosNotas = count($objRespuestaNombreNotas);
        $contado = 0;



        foreach ($objRespuestaNombreNotas as $key => $value) {

            if ($contado + 1 != $ciclosNotas) {
                $concatenar .= "sum(case when Nnota ='" . $value["nombreNota"] . "' then Calificacion else 0 end )as '" . $value["nombreNota"] . "',";
            } else {
                $concatenar .= "sum(case when Nnota ='" . $value["nombreNota"] . "' then Calificacion else 0 end )as '" . $value["nombreNota"] . "'";
            }
            $contado++;
        }


        $objConsultaNotas = conexion::conectar()->prepare("select idAsignaturaNota, idCursoF,idAsignaturaF,cod_Estudiante, Nombre,Apellidos," . $concatenar . " from (select asignaturanota.idAsignaturaNota as idAsignaturaNota, nota.idCurso as idCursoF ,asignatura.idasignatura as idAsignaturaF,estudiante.idEstudiante as cod_Estudiante, estudiante.nombres as Nombre,estudiante.apellidos as Apellidos,asignatura.nombreAsignatura as Asignatura,nota.nombreNota as Nnota,asignaturanota.nota as Calificacion from asignaturanota inner join estudiante on asignaturanota.idEstudiante=estudiante.idEstudiante inner join nota on asignaturanota.idNota=nota.idNota inner join asignatura on nota.idAsignatura=asignatura.idAsignatura where nota.idCurso=" . $idCurso . " and nota.idAsignatura=" . $idAsignatura . " and nota.idPeriodo=" . $idPeriodo . ") as tb group by Nombre ");

        try {
            $objConsultaNotas->execute();

            $lista = $objConsultaNotas->fetchAll();
            $objConsultaNotas = null;

            return $lista;
        } catch (Exception $e) {
            $nada =null;

            return $nada;
            
        }
    }
    public static function mdlConsultarNotasAeditar(int $idEstudiante, int $idCurso, int $idAsignatura) //trae los datos para cargarlos en la modal 
    {
        $objConsulta = conexion::conectar()->prepare("select asignaturanota.idAsignaturaNota,nota.idNota,nota.nombreNota,asignaturanota.nota from asignaturanota inner join nota on nota.idNota=asignaturanota.idNota inner join estudiante on asignaturanota.idEstudiante =estudiante.idEstudiante where estudiante.idEstudiante=" . $idEstudiante . " and nota.idAsignatura=" . $idAsignatura . " and nota.idCurso=" . $idCurso . " and nota.estadoNota=1");
        $objConsulta->execute();
        $lista = $objConsulta->fetchAll();
        $objConsulta = null;
        return $lista;
    }

    public static function mdlCambiarValorNota($idAsignaturaNota, float $valorNota)
    {
        $mensaje = "";
        $objConexion = conexion::conectar()->prepare("UPDATE asignaturanota set nota=" . $valorNota . " where idAsignaturaNota=" . $idAsignaturaNota . " ");
        if ($objConexion->execute()) {

            $mensaje = "ok";
        } else {
            $mensaje = "Error";
        }

        return $mensaje;
    }
    public static function mdlConsultarNotasdeAsignaturayCurso($asignatura, $curso)
    {

        $objConsulta = conexion::conectar()->prepare("select * from nota where idAsignatura=" . $asignatura . " and idCurso=" . $curso . "");
        $objConsulta->execute();
        $lista = $objConsulta->fetchAll();
        $objConsulta = null;
        return $lista;
    }
    public static function mdlModificarNotas($idNota, $nombreNota, $estadoNota)
    {
        $mensaje = "";

        $mayus = strtoupper($nombreNota);

        $objconsulta = conexion::conectar()->prepare("Update nota set  nombreNota=:n,estadoNota=:e where idNota=:i");
        $objconsulta->bindParam(":n", $mayus, PDO::PARAM_STR);
        $objconsulta->bindParam(":e", $estadoNota, PDO::PARAM_INT);
        $objconsulta->bindParam(":i", $idNota, PDO::PARAM_INT);

        if ($objconsulta->execute()) {
            $mensaje = "ok";
        } else {
            $mensaje = "error";
        }
        $objconsulta = null;
        return $mensaje;
    }

    public static function mdlEliminarNota($idNota)
    {

        $mensaje = "";

        try {
            $objEliminar = conexion::conectar()->prepare("DELETE from asignaturanota where idNota=" . $idNota . "");
            if ($objEliminar->execute()) {

                $objEliminar = null;
                $objEliminar = conexion::conectar()->prepare("DELETE from nota where idNota=" . $idNota . "");
                if ($objEliminar->execute()) {
                    $mensaje = "ok";
                    $objEliminar = null;
                }
            }
        } catch (Exception $th) {
            $mensaje = $th;
        }

        return $mensaje;
    }
}
