<?php

if(strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0){
	$desde = $_GET['desde'];
	$hasta = $_GET['hasta'];

	$verDesde = date('d/m/Y', strtotime($desde));
	$verHasta = date('d/m/Y', strtotime($hasta));
}else{
	$desde = '1111-01-01';
	$hasta = '9999-12-30';

	$verDesde = '______/_____/______';
	$verHasta = '______/_____/______';
}
require('../fpdf/fpdf.php');
include "conexion.php"; 


$pdf = new FPDF();
$pdf-> AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../recursos/drtc.png' , 10 ,8, 10 , 13,'PNG');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, 'DRTC', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Hoy: '.date('d-m-y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'LISTADO DE USUARIOS', 0);
$pdf->Ln(10);
$pdf->Cell(60, 8, '', 0);
$pdf->Cell(100, 8, 'Desde: '.$verDesde.' hasta: '.$verHasta, 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(8, 8, 'Item', 0);
$pdf->Cell(25, 8, 'DNI', 0);
$pdf->Cell(30, 8, 'Nombres', 0);
$pdf->Cell(30, 8, 'Apellidos', 0);
$pdf->Cell(25, 8, 'Fech. Registro', 0);
$pdf->Cell(20, 8, 'Categoria', 0);
$pdf->Cell(20, 8, 'estado', 0);

$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$productos = mysql_query("SELECT * FROM usuarios WHERE fecha_tramite BETWEEN '$desde' AND '$hasta' ");
$item = 0;
$totaluni = 0;
$totaldis = 0;
while($productos2 = mysql_fetch_array($productos)){
	$item = $item+1;
#	$totaluni = $totaluni + $productos2['precio_unit'];
#	$totaldis = $totaldis + $productos2['precio_dist'];
	$pdf->Cell(8, 8, $item, 0);
	$pdf->Cell(25, 8,$productos2['dni'], 0);
	$pdf->Cell(30, 8, $productos2['nombres'], 0);
	$pdf->Cell(30, 8, $productos2['apellidos'], 0);
	$pdf->Cell(25, 8, date('d/m/y', strtotime($productos2['fecha_tramite'])), 0);
	$pdf->Cell(20, 8, $productos2['nivel'], 0);
	$pdf->Cell(20, 8, $productos2['estado'], 0);
	
	$pdf->Ln(8);
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(104,8,'',0);
#$pdf->Cell(31,8,'Total Unitario: S/. '.$totaluni,0);
#$pdf->Cell(32,8,'Total Dist: S/. '.$totaldis,0);

$pdf->Output('reporte.pdf','D');







?>
