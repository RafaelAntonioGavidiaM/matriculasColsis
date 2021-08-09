<?php

include_once "conexion.php";

class persnalModelo
{


    public static function mdlListarPersonal()
    {

        $objListarPersonal = conexion::conectar()->prepare("SELECT personal.idPersonal,personal.nombre,personal.apellido,personal.documento,personal.telefono,personal.ciudad,personal.correo,personal.correo,personal.estado,rol.idRol,personal.direccion,personal.password,personal.foto,rol.nombre as nombreRol FROM personal inner join rol on rol.idRol=personal.idRol");
        $objListarPersonal->execute();
        $listaPersonal = $objListarPersonal->fetchAll();
        $objListarPersonal = null;
        return $listaPersonal;
    }

    public static function mdlListarRol()
    {

        $objListarRol = conexion::conectar()->prepare("SELECT * FROM rol");
        $objListarRol->execute();
        $listaRol = $objListarRol->fetchAll();
        $objListarRol = null;
        return $listaRol;
    }

    public static function mdlRegistrarPersonal($nombre, $apellido, $documento, $telefono, $ciudad, $correo, $estado, $idRol, $direccion, $password, $foto)
    {

        $mensaje = "";
        $nombreArchivo = $foto["name"];
        $extension = substr($nombreArchivo, -4);
        $rutaArchivo = "../vista/imagenesPersonal/" . $documento . $extension;
        $url = "vista/imagenesPersonal/" . $documento . $extension;


        if (($extension == ".jpg" || $extension == ".JPG") || ($extension == ".png" || $extension == ".PNG") || ($extension == "jpng"  || $extension == "JPNG")) {


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


    public static function mdlDeletePersonal($idPersonal, $deleteFoto)
    {


        $mensaje = "";
        if ($deleteFoto == "") {

            try {
                $objRespuesta = conexion::conectar()->prepare("DELETE FROM personal WHERE idPersonal='$idPersonal'");


                if ($objRespuesta->execute()) {
                    $mensaje = "ok";
                } else {
                    $mesnaje = "error";
                }

                $objRespuesta = null;
            } catch (Exception $e) {

                $mesanje = $e;
            }
        } else {
            if (unlink("../" . $deleteFoto)) {


                try {
                    $objRespuesta = conexion::conectar()->prepare("DELETE FROM personal WHERE idPersonal='$idPersonal'");


                    if ($objRespuesta->execute()) {
                        $mensaje = "ok";
                    } else {
                        $mesnaje = "error";
                    }

                    $objRespuesta = null;
                } catch (Exception $e) {

                    $mesanje = $e;
                }
            } else {



                $mensaje = "No se puede eliminar la foto";
            }
        }

        return $mensaje;
    }

    public static function mdlModificarPerosonalSinCambioFoto($idPersonal, $nombre, $apellido, $documento, $telefono, $ciudad, $correo, $estado, $idRol, $direccion, $password, $foto)
    {

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



        $mensaje = "";
        $nombreArchivo = $foto["name"];
        $extension = substr($nombreArchivo, -4);
        $rutaArchivo = "../vista/imagenesPersonal/" . $documento . $extension;
        $url = "vista/imagenesPersonal/" . $documento . $extension;

        if (($extension == ".jpg" || $extension == ".JPG") || ($extension == ".png" || $extension == ".PNG") || ($extension == "jpng"  || $extension == "JPNG")) {


            if (move_uploaded_file($foto["tmp_name"], $rutaArchivo)) {

                try {



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
                    } else if(unlink("../" . $fotoAnterior)) {
                        

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
}
