<?php

include_once "../modelo/estudianteModelo.php";

//inpt acudiente
$modelo =  new modeloEstudiantes();

$texto = $_GET['auto-acudiente'];

$res = $modelo->buscar($texto);

echo json_encode($res);

?>