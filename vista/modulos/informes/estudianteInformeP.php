<?php

require("../../librerias/pdf/fpdf.php");
require_once("../../../modelo/reporteModelo.php");
require_once("../../../modelo/conexion.php");
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
        $idCurso2 = $_GET["idCurso"];
        $objRespuesta = modeloReportes::mdlListarAsignaturasReportesPdf($idCurso2);
        return $objRespuesta;
    }

    public function resultadosNota()
    {

        $nota = array();
        $idCurso2 = $_GET["idCurso"];
        $idPeriodo = $_GET["idPeriodo"];
        $idEstudiante = $_GET["idEstudiante"];



        $objPfd = new PDF();
        $asignaturas = $objPfd->cargarAsignaturasReporte();

        foreach ($asignaturas as $key => $value) {

            $idAsignatura = $value["idAsignatura"];

            $nombreAsignatura = $value["nombreasignatura"];






            $objConsulta = conexion::conectar()->prepare("select avg(nota) as nota from nota  inner join asignaturanota on  nota.idNota=asignaturanota.idNota   where idPeriodo=" . $idPeriodo . " and idAsignatura=" . $idAsignatura . " and  idEstudiante=" . $idEstudiante . " and nota.idCurso=" . $idCurso2 . "");

            if ($objConsulta->execute()) {

                $notaFinal = $objConsulta->fetch();


                array_push($nota, [$nombreAsignatura, $notaFinal["nota"]]);
            }
        }

        return $nota;
    }



    function BasicTable($header, $data)
    {
        // Cabecera
        $this->SetXY(40, 120);
        $this->SetFont('Arial', 'B', 11);
        $this->SetTextColor(0, 0, 0);
        foreach ($header as $col)
            $this->Cell(70, 10, $col, 1, 0, 'C');
        $this->Ln();
        // Datos
        foreach ($data as $row) {
            $this->SetX(40);
            $this->SetFont('Arial', 'I', 10);

            foreach ($row as $col)
                $this->Cell(70, 8, $col, 1, 0, 'L');
            $this->Ln();
        }
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
}
$rutaImagen = "../../../";


// $fecha = date("d-m-Y");
// $hora = date("H:i");
$dtz = new DateTimeZone("America/Bogota");
$dt = new DateTime("now", $dtz);
$hora = $dt->format("H:i A");
$fecha = $dt->format("m-d-Y");

if (isset($_GET["idEstudiante"]) && isset($_GET["idPeriodo"]) && isset($_GET["idCurso"])) {

    $idEstudiante = $_GET["idEstudiante"];




    $objPfd = new PDF();

    $objPfd->idEstudiante = $_GET["idEstudiante"];
    $objPfd->idPeriodo = $_GET["idPeriodo"];

    $datos = $objPfd->cargarDatosReporte();


    $objPfd = new pdf('P', 'mm', 'letter', true);
    $objPfd->AddPage('portrain', 'letter');
    $objPfd->SetMargins(10, 30, 20, 20);
    $objPfd->SetFont('Arial', '', 12);
    $objPfd->SetTextColor(255, 255, 255);
    if ($datos["idPeriodo"] == 1) {
        $objPfd->SetTitle('REPORTE PERIODO I');
    } elseif ($datos["idPeriodo"] == 2) {
        $objPfd->SetTitle('REPORTE PERIODO II');
    } elseif ($datos["idPeriodo"] == 3) {
        $objPfd->SetTitle('REPORTE PERIODO III');
    } elseif ($datos["idPeriodo"] == 4) {
        $objPfd->SetTitle('REPORTE PERIODO IV');
    }

    $objPfd->SetFont('Arial', 'B', 30);
    $objPfd->SetTextColor(255, 255, 255);
    $objPfd->SetTextColor(255, 255, 255);
    $objPfd->SetY(13);
    $objPfd->Setx(115);
    $objPfd->Write(5, $datos["idPeriodo"].' '.$datos["nombrePeriodo"]);

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
    if ($datos["url"] == null || $datos["url"] == "") {
        $objPfd->Image('../../../vista/imgs/usuarioDefecto.png', 10, 55, 50, 50);
    } else {
        $objPfd->Image($rutaImagen . $datos["url"], 10, 60, 50, 50);
    }

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

    $notas = $objPfd->resultadosNota();

    $header = array('Asignatura', 'Nota');

    $objPfd->SetTextColor(0, 0, 0);

    $objPfd->BasicTable($header, $notas);

    $objPfd->SetTextColor(0, 0, 0);
    $objPfd->SetFillColor(255, 255, 255);

    $objPfd->Output();
}
