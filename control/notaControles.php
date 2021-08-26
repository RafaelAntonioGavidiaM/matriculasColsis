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















