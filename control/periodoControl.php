<?php
include_once "../modelo/periodoModelo.php";

class periodoControl{
    public $idPeriodo;
    public $nombre;
    public $fechaI;
    public $fechaF;
     


    public function crtInsertar()
    {
        $objRespuesta=periodoModelo::mdlInsetarPeriodo($this->nombre,$this->fechaI,$this->fechaF);
        echo json_encode($objRespuesta);

        
        
    }
    public function cargarDatos(){
        $objRespuesta=periodoModelo::cargarDatos();
        echo json_encode($objRespuesta);

    }

    public function ctrlEliminarPeriodo(){

        $objRespuesta=periodoModelo::mdlEliminarPeriodo($this->idPeriodo);
        echo json_encode($objRespuesta);



    }



}
$objControlPeriodo = new periodoControl();

if(isset($_POST["nombreP"]) && isset($_POST["fechaI"]) && isset($_POST["fechaF"])  ){

    $objControlPeriodo->nombre=$_POST["nombreP"];
    $objControlPeriodo->fechaI=$_POST["fechaI"];
    $objControlPeriodo->fechaF=$_POST["fechaF"];
    $objControlPeriodo->crtInsertar();




}
if(isset($_POST["mensaje"])){
    $objControlPeriodo->cargarDatos();


}

if(isset($_POST["idEliminar"])){
    $objControlPeriodo->idPeriodo=$_POST["idEliminar"];

    $objControlPeriodo->ctrlEliminarPeriodo();




}

