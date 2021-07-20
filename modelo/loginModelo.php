
<?php

require "conexion.php";
class loginModelo{
    public static function mdlLogin($documento,$contraseña){
        $objConsulta = conexion::conectar()->prepare("SELECT * from personal inner join rol on personal.idRol=rol.idRol inner join rol_permiso on rol.idRol=rol_permiso.idRol inner join formulario on formulario.idFormulario = rol_permiso.nombreFormulario inner join permiso on rol_permiso.idPermiso = permiso.idPermiso where personal.documento=:documento and personal.password=:password and formulario.nombreFormulario='facturaWeb' and rol_permiso.idPermiso=1");
        $objConsulta->bindParam(":documento",$documento,PDO::PARAM_STR);
        $objConsulta->bindParam(":password",$contraseña,PDO::PARAM_STR);

        $objConsulta->execute();

        $lista=$objConsulta->fetch();

        $objConsulta=null;

        return $lista;


    }


}

