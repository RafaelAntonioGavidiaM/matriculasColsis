<?php

require_once "../modelo/notaModelo.php";
class notaControl{
    public $idCurso=0; 
    public $nombreNota;
    public $asignatura;
    public $permiso;
    
           
    
   

    public function cargarGrados(){

        session_start();
        $idPersonal=$_SESSION["idPersonal"];

  
        

        $objRespuesta= notaModelo::cargarGrados($idPersonal);
        echo json_encode($objRespuesta);
        




    } 

    public function cargarAsignaturas(){
        session_start();
        $idPersonal=$_SESSION["idPersonal"];

  
        

        $objRespuesta= notaModelo::cargarAsignaturas($idPersonal,$this->idCurso);
        echo json_encode($objRespuesta);


    }

    public function ctrlRegistrarNota(){
        $objRespuesta= notaModelo::mdlRegistrarNota($this->nombreNota,$this->permiso,$this->asignatura,$this->idCurso);
        
        echo json_encode($objRespuesta);




    }

    public function ctrConsultarDatos(){
        $objRespuesta= notaModelo::mdlConsultarNotas($this->asignatura,$this->idCurso);
        
        echo json_encode($objRespuesta);






    }

    public function ctrlConsultarNombresNotas(){
        $objRespuesta= notaModelo::cargarNotas($this->asignatura,$this->idCurso);
        
        echo json_encode($objRespuesta);


    }
   




}

if(isset($_POST["grados"])){
    $objCargar = new notaControl();
    $objCargar->cargarGrados();


}

if(isset($_POST["idCurso"])){
    $objCargar = new notaControl();
    $objCargar->idCurso=$_POST["idCurso"];
    $objCargar->cargarAsignaturas();



}
if(isset($_POST["nombreNota"]) && isset($_POST["visibilidad"]) && isset($_POST["asignatura"]) && isset($_POST["idCursoR"]) ){

    $objCargar = new notaControl();
    $objCargar->nombreNota=$_POST["nombreNota"];
    $objCargar->permiso=$_POST["visibilidad"];
    $objCargar->asignatura=$_POST["asignatura"];
    $objCargar->idCurso=$_POST["idCursoR"];

    $objCargar->ctrlRegistrarNota();





}

if(isset($_POST["cAsignatura"]) && isset($_POST["cGrado"])){
    $objCargar = new notaControl();
    $objCargar->idCurso=$_POST["cGrado"];
    $objCargar->asignatura=$_POST["cAsignatura"];
    $objCargar->ctrConsultarDatos();






}
if(isset($_POST["MAsignatura"]) && isset($_POST["MGrado"])){

    $objCargar = new notaControl();
    $objCargar->idCurso=$_POST["MGrado"];
    $objCargar->asignatura=$_POST["MAsignatura"];
    $objCargar->ctrlConsultarNombresNotas();


}














