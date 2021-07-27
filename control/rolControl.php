<?php
include_once "../modelo/rolModelo.php";
class rolControl{
    public $nombreRol;
    public $idRol;
    public $permiso;
    public $idFormulario;

    public function ctrlRegistrar(){
        $objRespuesta = rolModelo::mdlRegistar($this->nombreRol);
        echo json_encode($objRespuesta);




    }
    public function ctrlConsultarRoles(){

        $objRespuesta = rolModelo::mdlConsultarRoles();
        echo json_encode($objRespuesta);


    }
    public function ctrlConsultaPermisos(){
        $objRespuesta = rolModelo::mdlConsultarPermisos($this->idRol);
        echo json_encode($objRespuesta);
 

    }

    public function ctrlActualizarPermiso(){

        $objRespuesta=rolModelo::mdlActualizarPermiso($this->idRol,$this->idFormulario,$this->permiso);
        echo json_encode($objRespuesta);


    }

    public function ctrlEliminarRol(){
    
    
        $objRespuesta=rolModelo::mdlEliminarRol($this->idRol);
        echo json_encode($objRespuesta);
       
    }
    public function ctrCambiarRol(){

         $objModificar= rolModelo::mdlCambiarNombre($this->nombreRol,$this->idRol);

         echo json_encode($objModificar);

  
  
     
    }


   

   







}


if(isset($_POST["nombreRol"])){
    $objRegistrar = new rolControl();
    $objRegistrar->nombreRol=$_POST["nombreRol"];
    $objRegistrar->ctrlRegistrar();


}
if (isset($_POST["mensaje"])){
    $objConsultar = new rolControl();
    $objConsultar->ctrlConsultarRoles();


}
if(isset($_POST["idRol"])){
    $objConsultaPermisos= new rolControl();
    $objConsultaPermisos->idRol=$_POST["idRol"];
    $objConsultaPermisos->ctrlConsultaPermisos();



}

if(isset($_POST["idRolPermiso"]) && isset($_POST["idFormulario"]) && isset($_POST["permiso"]) ){

    $objUpdate= new rolControl();
    $objUpdate->idRol=$_POST["idRolPermiso"];
    $objUpdate->idFormulario=$_POST["idFormulario"];
    $objUpdate->permiso=$_POST["permiso"];
    $objUpdate->ctrlActualizarPermiso();



}

if(isset($_POST["idRolEliminar"])){
    $objEliminar = new rolControl();
    $objEliminar->idRol=$_POST["idRolEliminar"];
    $objEliminar->ctrlEliminarRol();


}

if(isset($_POST["nombreMod"])&& isset($_POST["idRolMod"])){

    $objModificarRol= new rolControl();
    $objModificarRol->nombreRol=$_POST["nombreMod"];
    $objModificarRol->idRol=$_POST["idRolMod"];
    $objModificarRol->ctrCambiarRol();
}