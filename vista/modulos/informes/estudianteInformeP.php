<?php

require("../../librerias/pdf/fpdf.php");
require_once("../../../modelo/reporteModelo.php");
class PDF extends FPDF
{


    public $idEstudiante;
    public $idPeriodo;
    public $idCurso;


    public function cargarDatosReporte()
    {
        $objRespuesta = modeloReportes::mdlListarReportesPdf($this->idEstudiante, $this->idPeriodo);
        return $objRespuesta;
    }
    public function cargarAsignaturasReporte()
    {
        $objRespuesta = modeloReportes::mdlListarAsignaturasReportesPdf($this->idCurso);
        return $objRespuesta;
    }

    function Header()
    {
        global $title;
        $this->SetFillColor(39, 216, 107);
        $this->Rect(0, 0, 280, 50, 'F');
        $this->SetY(13);
        $this->SetFont('Arial', 'B', 30);
        $this->SetTextColor(255, 255, 255);
        $this->Write(5, 'REPORTE PERIODO');
        $this->Image('../../../vista/imgs/colsis_logotipo.png', 165, -2, 50, 50);
        $this->ln(40);
    }

    // Pie de página
    function Footer()
    {
        $this->SetFillColor(39, 216, 107);
        $this->Rect(0, 250, 220, 50, 'F');
        $this->SetY(-20);
        $this->SetFont('Arial', '', 12);
        $this->SetTextColor(255, 255, 255);
        $this->SetX(11);
        $this->Write(5, 'Colsis');
        $this->Ln();
        $this->SetX(11);
        $this->Write(5, 'colsiswebsena@gmail.com');
        $this->SetX(11);
        $this->Ln();
        $this->SetX(11);
        $this->Write(5, '+(57)7889-8787');
    }
    // function cabeceraHorizontal($cabecera)
    // {
    //     $this->SetXY(10, 10);
    //     $this->SetFont('Arial', 'B', 10);
    //     $this->SetTextColor(0,0,0);
    //     foreach ($cabecera as $fila) {
    //         //Atención!! el parámetro valor 0, hace que sea horizontal
    //         $this->Cell(24, 7, utf8_decode($fila), 1, 0, 'L');
    //     }
    // }

    // function datosHorizontal($datos)
    // {
    //     $this->SetXY(10, 17);
    //     $this->SetFont('Arial', '', 10);
    //     //Siendo un array tipo: $datos => $fila
    //     //Significa que $datos tiene 'nombre' 'apellido' 'matricula'
    //     //$fila tiene cada valor de los antes mencionados
    //     foreach ($datos as $fila) {
    //         $this->Cell(24, 7, utf8_decode($fila['nombre']), 1, 0, 'L');
    //         $this->Cell(24, 7, utf8_decode($fila['apellido']), 1, 0, 'L');
    //         $this->Cell(24, 7, utf8_decode($fila['matricula']), 1, 0, 'L');
    //         $this->Ln(); //Salto de línea para generar otra fila
    //     }
    // }

    // //Integrando cabecera y datos en un solo método
    // function tablaHorizontal($cabeceraHorizontal, $datosHorizontal)
    // {
    //     $this->cabeceraHorizontal($cabeceraHorizontal);
    //     $this->datosHorizontal($datosHorizontal);
    // }
}
$rutaImagen = "../../../";


$fecha = date("d-m-Y");
$hora = date("H:i");

if (isset($_GET["idEstudiante"]) && isset($_GET["idPeriodo"]) && isset($_GET["idCurso"])) {


    $objPfd = new PDF();

    $objPfd->idEstudiante = $_GET["idEstudiante"];
    $objPfd->idPeriodo = $_GET["idPeriodo"];

    $datos = $objPfd->cargarDatosReporte();


    $objPfd = new pdf('P', 'mm', 'letter', true);
    $objPfd->AddPage('portrain', 'letter');
    $objPfd->SetMargins(10, 30, 20, 20);
    $objPfd->SetFont('Arial', '', 12);
    $objPfd->SetTextColor(255, 255, 255);

    $objPfd->SetFont('Arial', 'B', 30);
    $objPfd->SetTextColor(255, 255, 255);
    $objPfd->SetTextColor(255, 255, 255);
    $objPfd->SetY(13);
    $objPfd->Setx(115);
    $objPfd->Write(5, $datos["idPeriodo"]);

    $objPfd->SetFont('Arial', '', 12);
    $objPfd->SetY(25);
    $objPfd->SetX(11);
    $objPfd->Write(5, 'Fecha: ' . $fecha);
    $objPfd->Ln();
    $objPfd->SetX(11);
    $objPfd->Write(5, 'Hora: ' . $hora);
    $objPfd->Ln();
    $objPfd->SetX(11);
    $objPfd->Write(5, 'Direccion: ' . "Cra 56 #12-21");
    $objPfd->Ln();
    $objPfd->SetX(11);
    $objPfd->Write(5, 'Ciudad: ' . "Sogamoso");


    $objPfd->SetFont('Arial', 'B', 15);
    $objPfd->SetTextColor(0, 0, 0);
    $objPfd->Image($rutaImagen . $datos["url"], 10, 60, 40, 50);
    $objPfd->SetY(70);
    $objPfd->SetX(60);
    $objPfd->Write(5, 'Estudiante: ' . $datos["nombres"] . " " . $datos["apellidos"]);
    $objPfd->Ln();
    $objPfd->Ln();
    $objPfd->SetX(60);
    $objPfd->Write(5, 'Grado: ' . $datos["nombreCurso"]);
    $objPfd->Ln();
    $objPfd->Ln();
    $objPfd->SetX(60);
    $objPfd->Write(5, 'Acudiente: ' . $datos["nombre"] . " " . $datos["apellido"]);


    $objPfd->idCurso = $_GET["idCurso"];
    $datosAsignatura = $objPfd->cargarAsignaturasReporte();

    $objPfd->SetFont('Arial', '', 10);
    $objPfd->SetY(119);
    $objPfd->SetTextColor(255, 255, 255);
    $objPfd->SetFillColor(39, 216, 107);

    for ($i = 0; $i < count($datosAsignatura); $i++) {
        $objPfd->Cell(30, 10, $datosAsignatura[$i]["nombreasignatura"], 1, 0, 'L', 1);
        $objPfd->Ln();
    }


    // $miCabecera = array('Nombre', 'Apellido', 'Matrícula');

    // $misDatos = array(
    //     array('nombre' => 'Hugo', 'apellido' => 'Martínez', 'matricula' => '20420423'),
    //     array('nombre' => 'Araceli', 'apellido' => 'Morales', 'matricula' =>  '204909'),
    //     array('nombre' => 'Georgina', 'apellido' => 'Galindo', 'matricula' =>  '2043442'),
    //     array('nombre' => 'Luis', 'apellido' => 'Dolores', 'matricula' => '20411122'),
    //     array('nombre' => 'Mario', 'apellido' => 'Linares', 'matricula' => '2049990'),
    //     array('nombre' => 'Viridiana', 'apellido' => 'Badillo', 'matricula' => '20418855'),
    //     array('nombre' => 'Yadira', 'apellido' => 'García', 'matricula' => '20443335')
    // );

    // $objPfd->tablaHorizontal($miCabecera, $misDatos);

    $objPfd->SetTextColor(0, 0, 0);
    $objPfd->SetFillColor(255, 255, 255);

    $objPfd->Output();
}
