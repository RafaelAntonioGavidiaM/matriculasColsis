<?php

include_once "conexion.php";

class persnalModelo
{
    // ------------------------------------------------------------------
    // --------------Select a Personal y rol-----------------------------
    // ------------------------------------------------------------------

    public static function mdlListarPersonal()
    {

        $objListarPersonal = conexion::conectar()->prepare("SELECT personal.idPersonal,personal.nombre,personal.apellido,personal.documento,personal.telefono,personal.ciudad,personal.correo,personal.correo,personal.estado,rol.idRol,personal.direccion,personal.password,personal.foto,rol.nombre as nombreRol FROM personal inner join rol on rol.idRol=personal.idRol");
        $objListarPersonal->execute();
        $listaPersonal = $objListarPersonal->fetchAll();
        $objListarPersonal = null;
        return $listaPersonal;
    }


    // ------------------------------------------------------------------
    // --------------Select  a tabla rol---------------------------------
    // ------------------------------------------------------------------

    public static function mdlListarRol()
    {

        $objListarRol = conexion::conectar()->prepare("SELECT * FROM rol");
        $objListarRol->execute();
        $listaRol = $objListarRol->fetchAll();
        $objListarRol = null;
        return $listaRol;
    }

    // ------------------------------------------------------------------
    // --------------insert a tabla Personal-----------------------------
    // ------------------------------------------------------------------

    public static function mdlRegistrarPersonal($nombre, $apellido, $documento, $telefono, $ciudad, $correo, $estado, $idRol, $direccion, $password, $foto)
    {
        // extraer el nombre del archivo con su extencion
        $mensaje = "";
        $nombreArchivo = $foto["name"];
        $extension = substr($nombreArchivo, -4);
        // se concatena el documento regsitrado con la extencion para evitar problemas de eliminacion de las fotos
        $rutaArchivo = "../vista/imagenesPersonal/" . $documento . $extension;
        $url = "vista/imagenesPersonal/" . $documento . $extension;

        // validacion de los tipo de extencion aceptados en el registro del personal
        if (($extension == ".jpg" || $extension == ".JPG") || ($extension == ".png" || $extension == ".PNG") || ($extension == "jpng"  || $extension == "JPNG")) {

            // Mueve la foto registrada a la carpeta asignada dentro del proyecto
            if (move_uploaded_file($foto["tmp_name"], $rutaArchivo)) {


                try {
                    $objRegistrarPersonal = conexion::conectar()->prepare("INSERT INTO personal(nombre,apellido,documento,telefono,ciudad,correo,estado,idRol,direccion,password,foto) values (:nombre,:apellido,:documento,:telefono,:ciudad,:correo,:estado,:idRol,:direccion,:password,:foto)");
                    $objRegistrarPersonal->bindParam(":nombre", $nombre, PDO::PARAM_STR);
                    $objRegistrarPersonal->bindParam(":apellido", $apellido, PDO::PARAM_STR);
                    $objRegistrarPersonal->bindParam(":documento", $documento, PDO::PARAM_STR);
                    $objRegistrarPersonal->bindParam(":telefono", $telefono, PDO::PARAM_STR);
                    $objRegistrarPersonal->bindParam(":ciudad", $ciudad, PDO::PARAM_STR);
                    $objRegistrarPersonal->bindParam(":correo", $correo, PDO::PARAM_STR);
                    $objRegistrarPersonal->bindParam(":estado", $estado, PDO::PARAM_STR);
                    $objRegistrarPersonal->bindParam(":idRol", $idRol, PDO::PARAM_INT);
                    $objRegistrarPersonal->bindParam(":direccion", $direccion, PDO::PARAM_STR);
                    $objRegistrarPersonal->bindParam(":password", $password, PDO::PARAM_STR);
                    $objRegistrarPersonal->bindParam(":foto", $url, PDO::PARAM_STR);

                    if ($objRegistrarPersonal->execute()) {

                        $mensaje = "ok";
                    } else {

                        $mensaje = "error";
                    }
                } catch (Exception $e) {

                    $mesaje = $e;
                }
            } else {

                $mensaje = "no fue posible subir el archivo";
            }
        } else {

            $mensaje = "El tipo del archivo no es compatible solo se resive archivos jpg,png y jpng";
        }

        return $mensaje;
    }

    // ------------------------------------------------------------------
    // ---Delete a tabla Personal por medio de la idPersonal-------------
    // ------------------------------------------------------------------

    public static function mdlDeletePersonal($idPersonal, $deleteFoto)
    {


        $mensaje = "";
        // ---------------->VALIDACIONES
        // En caso de que el registro no tenga alguna foto asignada entrara por el siguiente if y realizara un delete comun y corriente
        if ($deleteFoto == "" || $deleteFoto == "null" || $deleteFoto == null) {

            try {
                $objRespuesta = conexion::conectar()->prepare("DELETE FROM personal WHERE idPersonal='$idPersonal'");


                if ($objRespuesta->execute()) {
                    $mensaje = "ok";
                } else {
                    $mensaje = "error";
                }

                $objRespuesta = null;
            } catch (Exception $e) {

                $mensaje = "error";
            }
        } else {
            // si no entro por el anterior if hara el siguienete proceso eliminara la foto registrada anteriormente de la carpeta asignada del proyecto gracias al unlink
            if (unlink("../" . $deleteFoto)) {

                // hacer un delete comun y corriente por el id de la tabla
                try {
                    $objRespuesta = conexion::conectar()->prepare("DELETE FROM personal WHERE idPersonal='$idPersonal'");


                    if ($objRespuesta->execute()) {
                        $mensaje = "ok";
                    } else {
                        $mensaje = "error";
                    }

                    $objRespuesta = null;
                } catch (Exception $e) {

                    $mensaje = "error";
                }
            } else {



                $mensaje = "No se puede eliminar la foto";
            }
        }

        return $mensaje;
    }

    // ------------------------------------------------------------------
    // --------------Update a tabla Personal(Dos formas)-----------------
    // ------------------------------------------------------------------

    public static function mdlModificarPerosonalSinCambioFoto($idPersonal, $nombre, $apellido, $documento, $telefono, $ciudad, $correo, $estado, $idRol, $direccion, $password, $foto)
    {
        // Entra a este modelo en dado el caso de que no se cambie la foto que tenia registrada en la base de datos dbColsis
        $mensaje = "";

        try {

            $objRespuesta = conexion::conectar()->prepare("UPDATE personal SET nombre='$nombre' ,apellido='$apellido' ,documento='$documento' ,telefono='$telefono' ,ciudad='$ciudad' ,correo='$correo',estado='$estado' ,idRol='$idRol' ,direccion='$direccion' ,password='$password' ,foto='$foto' WHERE idPersonal='$idPersonal' ");

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

    public static function mdlModificarPerosonalConCambioFoto($idPersonal, $nombre, $apellido, $documento, $telefono, $ciudad, $correo, $estado, $idRol, $direccion, $password, $foto, $fotoAnterior)
    {

        //Entra en este modelo en dado el caso se halla cargado una nueva imgane en la modal
        //Se extrae el nombre del archivo y la extension respectiva del archivo

        $mensaje = "";
        $nombreArchivo = $foto["name"];
        $extension = substr($nombreArchivo, -4);

        //Concatena el documento de la persona con la extension y se le asigna la carpeta respectiva de guardar las fotos del personal dentro del proyecto
        $rutaArchivo = "../vista/imagenesPersonal/" . $documento . $extension;
        $url = "vista/imagenesPersonal/" . $documento . $extension;

        // Verfica la extencion si es compatible 

        if (($extension == ".jpg" || $extension == ".JPG") || ($extension == ".png" || $extension == ".PNG") || ($extension == "jpng"  || $extension == "JPNG")) {

            // Mueve la nueva foto registrada a la carpeta 
            if (move_uploaded_file($foto["tmp_name"], $rutaArchivo)) {

                try {


                    // En caso de que foto estuviera vacia en el registro de la base de datos entrar ppor este if
                    // y hara el procedimiento de un update normal
                    if ($fotoAnterior == "" || $fotoAnterior = null) {
                        try {

                            $objRespuesta = conexion::conectar()->prepare("UPDATE personal SET nombre='$nombre' ,apellido='$apellido' ,documento='$documento' ,telefono='$telefono' ,ciudad='$ciudad' ,correo='$correo',estado='$estado' ,idRol='$idRol' ,direccion='$direccion' ,password='$password' ,foto='$url' WHERE idPersonal='$idPersonal' ");

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

                        //Si tenia una foto registrada anteriormente en la base de tados esa se eliminara y se remplazara con la nueva 
                        // el procedimiento se hace dentro de este else if
                        $objRespuesta = conexion::conectar()->prepare("UPDATE personal SET nombre='$nombre' ,apellido='$apellido' ,documento='$documento' ,telefono='$telefono' ,ciudad='$ciudad' ,correo='$correo',estado='$estado' ,idRol='$idRol' ,direccion='$direccion' ,password='$password' ,foto='$url' WHERE idPersonal='$idPersonal' ");

                        if ($objRespuesta->execute()) {
                            $mensaje = "ok";
                            $objRespuesta = null;
                        } else {
                            $mensaje = "error";
                        }
                    } else {

                        $objRespuesta = conexion::conectar()->prepare("UPDATE personal SET nombre='$nombre' ,apellido='$apellido' ,documento='$documento' ,telefono='$telefono' ,ciudad='$ciudad' ,correo='$correo',estado='$estado' ,idRol='$idRol' ,direccion='$direccion' ,password='$password' ,foto='$url' WHERE idPersonal='$idPersonal' ");

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


    public static function mdlFiltrarPersonal(){




        
    }
}
