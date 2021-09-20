<?php

require_once "../modelo/notaModelo.php";
class notaControl{
    public $idCurso=0; 
    public $nombreNota;
    public $asignatura;
    public $asignaturaNota;
    public $valorNota;
    public $permiso;
    public $idEstudiante;
    
           
    
   

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
    public function ctrlCargarNotasAeditar(){
        $objRespuesta= notaModelo::mdlConsultarNotasAeditar($this->idEstudiante,$this->idCurso,$this->asignatura);
        echo json_encode($objRespuesta);



    }

    public function ctrlCambiarValorNota(){
        $objRespuesta=notaModelo::mdlCambiarValorNota($this->asignaturaNota,$this->valorNota);
        echo json_encode($objRespuesta);


    }

    public function ctrlConsultarNotasAModificar(){

        $objRespuesta=notaModelo::mdlConsultarNotasdeAsignaturayCurso($this->asignatura,$this->idCurso);
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

if(isset($_POST["cidEstudiante"]) && isset($_POST["cidCurso"]) && isset($_POST["casignatura"])){

   
    $objCargar = new notaControl();
    $objCargar->idEstudiante=$_POST["cidEstudiante"];
    $objCargar->idCurso=$_POST["cidCurso"];
    $objCargar->asignatura= $_POST["casignatura"];
    $objCargar->ctrlCargarNotasAeditar();


}
if(isset($_POST["idAsignaturaNotaCambiar"]) && isset($_POST["notaCambiar"])){
    $objCargar = new notaControl();
    $objCargar->asignaturaNota=$_POST["idAsignaturaNotaCambiar"];
    $objCargar->valorNota=$_POST["notaCambiar"];
    $objCargar->ctrlCambiarValorNota();

}

if(isset($_POST["consultarNotasAsignatura"]) && isset($_POST["consultarNotasidCurso"])){
    $objCargar = new notaControl();
    $objCargar->asignatura=$_POST["consultarNotasAsignatura"];
    $objCargar->idCurso=$_POST["consultarNotasidCurso"];
    $objCargar->ctrlConsultarNotasAModificar();

}
















