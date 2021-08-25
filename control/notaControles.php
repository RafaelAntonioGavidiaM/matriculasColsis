<?php

require_once "../modelo/notaModelo.php";
class notaControl{
    public $idCurso=0; 
           
    
   

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















