<?php
require "conexion.php";

class rolModelo
{

    public static function mdlRegistar(string $nombre)
    {
        $mensaje = "";

        $objRegistar = conexion::conectar()->prepare("Insert into rol(nombre) values ('" . $nombre . "')");
        if ($objRegistar->execute()) {

            $objConsulta = conexion::conectar()->prepare("select  idRol from rol where nombre='".$nombre."'");
            $objConsulta->execute();
            $lista = $objConsulta->fetch();
            $idCreado =$lista[0];

            $objConsulta = conexion::conectar()->prepare("SELECT * FROM formulario");
            $objConsulta->execute();
            $listaFormularios = $objConsulta->fetchAll();
            

            foreach ($listaFormularios as $key => $value) {
                $objInsertPermisos = conexion::conectar()->prepare("Insert into rol_permiso(idRol,nombreFormulario,idPermiso) values (:idCreado,:idFormulario,1)");
                $objInsertPermisos->bindParam(":idCreado", $idCreado, PDO::PARAM_INT);
                $objInsertPermisos->bindParam(":idFormulario",$value["idFormulario"] , PDO::PARAM_INT);
                
                if($objInsertPermisos->execute()){
                    $mensaje="ok";
                }
                else{
                    $mensaje="no";
                }




            }





            
        } else {
            $mensaje = "no";
        }



        $objRegistar = null;
        return $mensaje;
    }

    public static function mdlConsultarRoles()
    {
        $objConsulta = conexion::conectar()->prepare("SELECT * FROM rol");
        $objConsulta->execute();
        $lista = $objConsulta->fetchAll();
        $objConsulta = null;
        return $lista;
    }

    public static function mdlConsultarPermisos(int $idRol)
    {
        $objConsulta = conexion::conectar()->prepare("select rol_permiso.nombreFormulario as idFormulario,formulario.nombreFormulario,rol_permiso.idPermiso,permiso.nombrePermiso from rol inner join rol_permiso on rol.idRol=rol_permiso.idRol inner join formulario on rol_permiso.nombreFormulario=formulario.idFormulario inner join  permiso on rol_permiso.idPermiso = permiso.idPermiso where rol.idRol=:idRol  ");
        $objConsulta->bindParam(":idRol", $idRol, PDO::PARAM_INT);
        $objConsulta->execute();
        $lista = $objConsulta->fetchAll();
        $objConsulta = null;
        return $lista;
    }

    public static function mdlActualizarPermiso($idRol,$idFormulario,$permiso){
        $mensaje="";
        $objActualizar = conexion::conectar()->prepare("UPDATE rol_permiso set idPermiso=:permiso where nombreFormulario=:formulario && idRol=:idRol");
        $objActualizar->bindParam(":permiso", $permiso, PDO::PARAM_INT);
        $objActualizar->bindParam(":formulario", $idFormulario, PDO::PARAM_INT);
        $objActualizar->bindParam(":idRol", $idRol, PDO::PARAM_INT);
        if($objActualizar->execute()){
            $mensaje="ok";


        }else{
            $mensaje="no";

        }
        return $mensaje;



    }
    public static function mdlEliminarRol($idRol){
        $mensaje ="";

        try {
            $objEliminar = conexion::conectar()->prepare("DELETE FROM rol_permiso where idRol=:idRol");
        $objEliminar->bindParam(":idRol", $idRol, PDO::PARAM_INT);
        if($objEliminar->execute()){

            $objEliminar2 = conexion::conectar()->prepare("DELETE FROM rol where idRol=:idRol");
            $objEliminar2->bindParam(":idRol", $idRol, PDO::PARAM_INT);
            if($objEliminar2->execute()){

                $mensaje="ok";

            }else{
                $mensaje="Ya contiene registros en Personal";
            }



        }
        } catch (Exception $th) {

            $mensaje=$th;
            
        }
        

        return $mensaje;

    }

    public static function mdlCambiarNombre($nombre,$idRol){
        $mensaje="";
        
        $objActualizar = conexion::conectar()->prepare("UPDATE rol set nombre=:nombre where idRol=:idRol");
        $objActualizar->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $objActualizar->bindParam(":idRol", $idRol, PDO::PARAM_INT);
        if($objActualizar->execute()){
            $mensaje="ok";


        }else{
            $mensaje="no";
        }

        return $mensaje;




    }

    public static function mdlConsultaPermisosIdRol($idRol){
        $objConsulta = conexion::conectar()->prepare("select formulario.nombreFormulario,rol_permiso.idPermiso from rol_permiso inner join formulario on formulario.idFormulario=rol_permiso.nombreFormulario where idRol=:idRol");
        $objConsulta->bindParam(":idRol", $idRol, PDO::PARAM_INT);
        $objConsulta->execute();
        $lista = $objConsulta->fetchAll();
        $objConsulta = null;
        return $lista;


    }



}
