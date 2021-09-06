<?php
include_once "conexion.php";


class modeloEstudiantes
{
    public static function buscar($texto)
    {
        $res = array();
        $query = Conexion::conectar()->prepare('SELECT idAcudiente,nombre,apellido FROM acudiente WHERE nombre  LIKE :texto');
        $query->execute(['texto' => $texto . '%']);

        if ($query->rowCount()) {
            while ($r = $query->fetch()) {
                array_push($res, $r['idAcudiente']);
                array_push($res, $r['nombre']);
                array_push($res, $r['apellido']);
            }
        }
        return $res;
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

    //cargar Combo CursoFiltro
    public static function mdlListarCursosFiltro()
    {
        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM curso");
        $objRespuesta->execute();
        $listarCursosFiltro = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $listarCursosFiltro;
    }
    public static function mdlRegistrarEstudiantes($nombres, $apellidos, $documento, $tipoDocumento, $fechaNacimiento, $tipoSangre, $seguroEstudiantil, $telefono, $idAcudiente, $idCurso, $foto)
    {
        $mesaje = "";
        $nombreArchivo = $foto['name'];
        $extencion = substr($nombreArchivo, -4);
        $rutaArchivo = "../vista/imagenesEstudiantes/" . $nombres . $apellidos . $idCurso . $extencion;
        $url = "vista/imagenesEstudiantes/" . $nombres . $apellidos . $idCurso . $extencion;

        if (($extencion == ".jpg" || $extencion == ".JPG") || ($extencion == ".png" || $extencion == ".PNG") || ($extencion == ".jpng" || $extencion == ".JPNG")) {

            if (move_uploaded_file($foto['tmp_name'], $rutaArchivo)) {

                try {
                    $objRegistrarEstudiante = Conexion::conectar()->prepare("INSERT INTO estudiante(nombres,apellidos,documento,tipoDocumento,fechaNacimiento,tipoSangre,seguroEstudiantil,telefono,idAcudiente,idCurso,url)VALUES(:nombres,:apellidos,:documento,:tipoDocumento,:fechaNacimiento,:tipoSangre,:seguroEstudiantil,:telefono,:idAcudiente,:idCurso,:url)");
                    $objRegistrarEstudiante->bindParam(":nombres", $nombres, PDO::PARAM_STR);
                    $objRegistrarEstudiante->bindParam(":apellidos", $apellidos, PDO::PARAM_STR);
                    $objRegistrarEstudiante->bindParam(":documento", $documento, PDO::PARAM_STR);
                    $objRegistrarEstudiante->bindParam(":tipoDocumento", $tipoDocumento, PDO::PARAM_STR);
                    $objRegistrarEstudiante->bindParam(":fechaNacimiento", $fechaNacimiento);
                    $objRegistrarEstudiante->bindParam(":tipoSangre", $tipoSangre, PDO::PARAM_STR);
                    $objRegistrarEstudiante->bindParam(":seguroEstudiantil", $seguroEstudiantil, PDO::PARAM_STR);
                    $objRegistrarEstudiante->bindParam(":telefono", $telefono, PDO::PARAM_STR);
                    $objRegistrarEstudiante->bindParam(":idAcudiente", $idAcudiente, PDO::PARAM_INT);
                    $objRegistrarEstudiante->bindParam(":idCurso", $idCurso, PDO::PARAM_INT);
                    $objRegistrarEstudiante->bindParam(":url", $url, PDO::PARAM_STR);


                    if ($objRegistrarEstudiante->execute()) {
                        $mensaje = "ok";
                    } else {
                        $mensaje = "error";
                    }
                    $objRegistrarEstudiante = null;
                } catch (Exception $e) {
                    $mensaje = $e;
                }
            } else {
                $mesaje = "No fue posible subir el archivo";
            }
        } else {
            $mesaje = "El formato de archivo no es compatible";
        }

        return $mensaje;
    }

    public static function mdlListarEstudiantes()
    {
        $objListaEstudiantes = Conexion::conectar()->prepare("select  estudiante.idEstudiante,estudiante.nombres,estudiante.apellidos,estudiante.documento,estudiante.tipoDocumento,estudiante.fechaNacimiento,estudiante.tipoSangre,estudiante.seguroEstudiantil,estudiante.telefono,estudiante.idAcudiente,acudiente.nombre,acudiente.apellido,curso.idCurso,curso.nombreCurso,estudiante.url from  estudiante inner join acudiente on acudiente.idAcudiente=estudiante.idAcudiente inner join curso on curso.idCurso=estudiante.idCurso;");
        $objListaEstudiantes->execute();
        $listaEstudiantes = $objListaEstudiantes->fetchAll();
        $objListaEstudiantes = null;
        return $listaEstudiantes;
    }

    public static function mdlFiltrarCursos($idCurso)
    {
        $objFiltroListaEstudiantes = Conexion::conectar()->prepare("select  estudiante.idEstudiante,estudiante.nombres,estudiante.apellidos,estudiante.documento,estudiante.tipoDocumento,estudiante.fechaNacimiento,estudiante.tipoSangre,estudiante.seguroEstudiantil,estudiante.telefono,estudiante.idAcudiente,acudiente.nombre,acudiente.apellido,curso.idCurso,curso.nombreCurso from  estudiante inner join acudiente on acudiente.idAcudiente=estudiante.idAcudiente inner join curso on curso.idCurso=estudiante.idCurso  where curso.idCurso ='$idCurso'");
        $objFiltroListaEstudiantes->execute();
        $listaEstudiantesFiltro = $objFiltroListaEstudiantes->fetchAll();
        $objFiltroListaEstudiantes = null;
        return $listaEstudiantesFiltro;
    }

    // public static function mdlModificarEstudiantes($nombres, $apellidos, $documento, $tipoDocumento, $fechaNacimiento, $tipoSangre, $seguroEstudiantil, $telefono, $idAcudiente, $idCurso, $idEstudiante)
    // {

    //     $mesaje = "";
    //     try {
    //         $objModificarEstudiantes = Conexion::conectar()->prepare("UPDATE estudiante SET nombres='$nombres',apellidos='$apellidos',documento='$documento',tipoDocumento='$tipoDocumento',fechaNacimiento='$fechaNacimiento',tipoSangre='$tipoSangre',seguroEstudiantil='$seguroEstudiantil',telefono='$telefono',idAcudiente='$idAcudiente',idCurso='$idCurso' WHERE idEstudiante='$idEstudiante'");

    //         if ($objModificarEstudiantes->execute()) {
    //             $mesaje = "ok";
    //         } else {
    //             $mesaje = "error";
    //         }
    //         $objModificarEstudiantes = null;
    //     } catch (Exception $e) {
    //         $mesaje = $e;
    //     }
    //     return $mesaje;
    // }
    public static function mdlModificarPerosonalSinCambioFoto($idEstudiante, $nombres, $apellidos, $documento, $tipoDocumento, $fechaNacimiento, $tipoSangre, $seguroEstudiantil, $telefono, $idAcudiente, $idCurso, $foto)
    {

        $mensaje = "";

        try {

            $objRespuesta = conexion::conectar()->prepare("UPDATE estudiante SET nombres='$nombres' ,apellidos='$apellidos' ,documento='$documento' ,tipoDocumento='$tipoDocumento' ,fechaNacimiento='$fechaNacimiento' ,tipoSangre='$tipoSangre',seguroEstudiantil='$seguroEstudiantil' ,telefono='$telefono' ,idAcudiente='$idAcudiente' ,idCurso='$idCurso' ,url='$foto' WHERE idEstudiante='$idEstudiante' ");

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

    public static function mdlModificarPerosonalConCambioFoto($idEstudiante, $nombres, $apellidos, $documento, $tipoDocumento, $fechaNacimiento, $tipoSangre, $seguroEstudiantil, $telefono, $idAcudiente, $idCurso, $foto, $fotoAnterior)
    {



        $mensaje = "";
        $nombreArchivo = $foto["name"];
        $extension = substr($nombreArchivo, -4);
        $rutaArchivo = "../vista/imagenesEstudiantes/" . $nombres . $apellidos . $idCurso . $extension;
        $url = "vista/imagenesEstudiantes/" . $nombres . $apellidos . $idCurso . $extension;

        if (($extension == ".jpg" || $extension == ".JPG") || ($extension == ".png" || $extension == ".PNG") || ($extension == "jpng"  || $extension == "JPNG")) {


            if (move_uploaded_file($foto["tmp_name"], $rutaArchivo)) {

                try {



                    if ($fotoAnterior == "" || $fotoAnterior == null) {
                        try {

                            $objRespuesta = conexion::conectar()->prepare("UPDATE estudiante SET nombres='$nombres' ,apellidos='$apellidos' ,documento='$documento' ,tipoDocumento='$tipoDocumento' ,fechaNacimiento='$fechaNacimiento' ,tipoSangre='$tipoSangre',seguroEstudiantil='$seguroEstudiantil' ,telefono='$telefono' ,idAcudiente='$idAcudiente' ,idCurso='$idCurso' ,url='$url' WHERE idEstudiante='$idEstudiante'");

                            if ($objRespuesta->execute()) {
                                $mensaje = "ok";
                            } else {
                                $mensaje = "error";
                            }

                            $objRespuesta = null;
                        } catch (Exception $e) {

                            $mensaje = $e;
                        }
                    } else if (unlink("../" . $fotoAnterior)) {


                        $objRespuesta = conexion::conectar()->prepare("UPDATE estudiante SET nombres='$nombres' ,apellidos='$apellidos' ,documento='$documento' ,tipoDocumento='$tipoDocumento' ,fechaNacimiento='$fechaNacimiento' ,tipoSangre='$tipoSangre',seguroEstudiantil='$seguroEstudiantil' ,telefono='$telefono' ,idAcudiente='$idAcudiente' ,idCurso='$idCurso' ,url='$url' WHERE idEstudiante='$idEstudiante'");

                        if ($objRespuesta->execute()) {
                            $mensaje = "ok";
                            $objRespuesta = null;
                        } else {
                            $mensaje = "error";
                        }
                    } else {

                        $objRespuesta = conexion::conectar()->prepare("UPDATE estudiante SET nombres='$nombres' ,apellidos='$apellidos' ,documento='$documento' ,tipoDocumento='$tipoDocumento' ,fechaNacimiento='$fechaNacimiento' ,tipoSangre='$tipoSangre',seguroEstudiantil='$seguroEstudiantil' ,telefono='$telefono' ,idAcudiente='$idAcudiente' ,idCurso='$idCurso' ,url='$url' WHERE idEstudiante='$idEstudiante'");

                        if ($objRespuesta->execute()) {
                            $mensaje = "ok";
                            $objRespuesta = null;
                        } else {
                            $mensaje = "error";
                        }
                    }
                } catch (Exception $e) {

                    $mensaje = $e;
                }
            }
        }

        return $mensaje;
    }


    public static function mdlEliminarEstudiantes($idEstudiante, $foto)
    {
        $mensaje = "";

        if (!unlink("../" . $foto)) {
            $mensaje = "No fue posible eliminar la imagen";
        } else {
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
        }

        return $mensaje;
    }
}
