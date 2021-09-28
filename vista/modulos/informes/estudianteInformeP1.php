<?php

require("../../librerias/pdf/fpdf.php");
require_once("../../../modelo/reporteModelo.php");

class PDF extends FPDF
{


    public $idEstudiante;

    public function cargarDatosReporte()
    {
        $objRespuesta = modeloReportes::mdlListarReportesPdf($this->idEstudiante);
        return $objRespuesta;
    }


    //Header
    function Header()
    {
        global $title;
        $this->SetFillColor(39, 216, 107);
        $this->Rect(0, 0, 280, 50, 'F');
        $this->SetY(13);
        $this->SetFont('Arial', 'B', 30);
        $this->SetTextColor(255, 255, 255);
        $this->Write(5, 'REPORTE PERIODO 1');
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
		$this->SetTextColor(255,255,255);
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
}

$rutaImagen = "../../../";


$fecha = date("d-m-Y");
$hora = date("H:i");

if (isset($_GET["idEstudiante"])) {


    $objPfd = new PDF();

    $objPfd->idEstudiante = $_GET["idEstudiante"];

    $datos = $objPfd->cargarDatosReporte();


    $objPfd = new pdf('P', 'mm', 'letter', true);
    $objPfd->AddPage('portrain', 'letter');
    $objPfd->SetMargins(10, 30, 20, 20);
    $objPfd->SetFont('Arial', '', 12);
    $objPfd->SetTextColor(255, 255, 255);

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


    $objPfd->SetFont('Arial', 'B', 20);
    $objPfd->SetTextColor(0, 0, 0);
    $objPfd->Image($rutaImagen . $datos["url"], 10, 60, 40, 50);
    $objPfd->SetY(70);
    $objPfd->SetX(60);
    $objPfd->Write(5, 'Estudiante: ' . $datos["nombres"]." ".$datos["apellidos"]);
    $objPfd->Ln();
    $objPfd->Ln();
    $objPfd->SetX(60);
    $objPfd->Write(5, 'Grado: ' . $datos["nombreCurso"]);
    $objPfd->Ln();
    $objPfd->Ln();
    $objPfd->SetX(60);
    $objPfd->Write(5, 'Acudiente: ' . $datos["nombre"]." ".$datos["apellido"]);


    $objPfd->SetFont('Arial', '', 10);
    $objPfd->SetY(119);
    $objPfd->SetTextColor(255, 255, 255);
    $objPfd->SetFillColor(39, 216, 107);
    $objPfd->Cell(30, 10, 'SOCIALES', 1, 0, 'L', 1);
    $objPfd->Ln();
    $objPfd->Cell(30, 10, 'MATEMATICAS', 1, 0, 'L', 1);
    $objPfd->Ln();
    $objPfd->Cell(30, 10, 'BIOLOGIA', 1, 0, 'L', 1);
    $objPfd->Ln();
    $objPfd->Cell(30, 10, 'DIBUJO TEC', 1, 0, 'L', 1);
    $objPfd->Ln();
    $objPfd->Cell(30, 10, 'FISICA', 1, 0, 'L', 1);
    $objPfd->Ln();
    $objPfd->Cell(30, 10, 'CIENCIAS P', 1, 0, 'L', 1);
    $objPfd->Ln();
    $objPfd->Cell(30, 10, 'RELIGION', 1, 0, 'L', 1);
    $objPfd->Ln();
    $objPfd->Cell(30, 10, 'ETICA', 1, 0, 'L', 1);
    $objPfd->Ln();
    $objPfd->Cell(30, 10, 'EDU FISICA', 1, 0, 'L', 1);
    $objPfd->Ln();
    $objPfd->Cell(30, 10, 'INGLES', 1, 0, 'L', 1);
    $objPfd->Ln();
    $objPfd->Cell(30, 10, 'DEFINITIVA', 1, 0, 'L', 1);
    $objPfd->Ln();

    $objPfd->SetTextColor(0, 0, 0);
    $objPfd->SetFillColor(255, 255, 255);

    $objPfd->Output();
}
