<?php
	include_once('PDF.php');

$pdf = new PDF('L','mm');
$pdf->AddPage();

//Texto unidad
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(10,10);
$pdf->Cell(275, 6, utf8_decode('UNIDAD: '), 1,0, 'J');

//Texto nombre
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(45,10);
$pdf->Cell(130, 6, utf8_decode('NOMBRE: '), 1,0, 'J');

//Texto CARRERA
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(175,10);
$pdf->Cell(60, 6, utf8_decode('CARRERA/SEMESTRE: '), 1,0, 'J');

//Texto hoja
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(236,10);
$pdf->Cell(20, 6, utf8_decode('HOJA:            de'), 0, 'J');

//Texto materia
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(10,16);
$pdf->Cell(135, 6, utf8_decode('MATERIA: '), 1,0, 'J');

//Texto CATEDRA
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(145,16);
$pdf->Cell(140, 6, utf8_decode('CATEDRÁTICO: '), 1,0, 'J');

//Texto OBJETIVO
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(10,22);
$pdf->Cell(275, 6, utf8_decode('OBJETIVO DE APRENDIZAJE: '), 1,0, 'J');

//Texto CONTENIDO
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(55,28);
$pdf->Cell(110, 6, utf8_decode('CONTENIDO'), 0, 'C');

//Texto TEMAS
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(45,34);
$pdf->Cell(110, 6, utf8_decode('(TEMAS Y SUBTEMAS)'), 0, 'C');

//borde TENMAS
$pdf->SetXY(10, 28);
$pdf->Cell(110, 12, utf8_decode(''), 1,0, 'C');

//Texto estrategias didac
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(120,28);
$pdf->Cell(50, 12, utf8_decode('ESTRATEGIAS DIDÁCTICAS'), 1,0, 'C');

//Texto estrategias
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(180,28);
$pdf->Cell(110, 6, utf8_decode('ESTRATEGIAS DE'), 0, 'C');

//Texto TEMAS
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(182,34);
$pdf->Cell(110, 6, utf8_decode('APRENDIZAJE'), 0, 'C');

//borde ESTRATEGIAS DE APRENDIZAJE
$pdf->SetXY(170, 28);
$pdf->Cell(50, 12, utf8_decode(''), 1,0, 'C');

//Texto desarrollo
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(220,28);
$pdf->Cell(65, 6, utf8_decode('DESARROLLO DE UNIDAD'), 1,0, 'C');

//Texto horas
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(220,34);
$pdf->Cell(20, 6, utf8_decode('No. HRS'), 1,0, 'C');

//Texto horas
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(240,34);
$pdf->Cell(20, 6, utf8_decode('INICIO'), 1,0, 'C');

//Texto horas
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(260,34);
$pdf->Cell(25, 6, utf8_decode('TERMINO'), 1,0, 'C');

//borde CONTENIDO 1
$pdf->SetXY(10, 40);
$pdf->Cell(110, 80, utf8_decode(''), 1,0, 'C');

//borde ESTRATEGIAS DIDACTICAS 1
$pdf->SetXY(120, 40);
$pdf->Cell(50, 80, utf8_decode(''), 1,0, 'C');

//borde ESTRATEGIAS de aprendizaje 1
$pdf->SetXY(170, 40);
$pdf->Cell(50, 80, utf8_decode(''), 1,0, 'C');

//borde horas 1
$pdf->SetXY(220, 40);
$pdf->Cell(20, 80, utf8_decode(''), 1,0, 'C');

//borde inicio 1
$pdf->SetXY(240, 40);
$pdf->Cell(20, 80, utf8_decode(''), 1,0, 'C');

//borde termino 1
$pdf->SetXY(260, 40);
$pdf->Cell(25, 80, utf8_decode(''), 1,0, 'C');

//borde horas 2
$pdf->SetXY(220, 120);
$pdf->Cell(20, 10, utf8_decode(''), 1,0, 'C');

//borde inicio 2
$pdf->SetXY(240, 120);
$pdf->Cell(20, 10, utf8_decode(''), 1,0, 'C');

//borde termino 2
$pdf->SetXY(260, 120);
$pdf->Cell(25, 10, utf8_decode(''), 1,0, 'C');

//Texto evaluacion
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(10,120);
$pdf->Cell(210, 10, utf8_decode('EVALUACIÓN'), 1,0, 'J');

//Texto PRACTICAS
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(10,130);
$pdf->Cell(275, 6, utf8_decode('PRÁCTICAS / VISITAS:'), 1,0, 'J');

//Texto RECURSOS
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(10,140);
$pdf->Cell(30, 6, utf8_decode('RECURSOS DIDÁCTICOS'), 0, 'J');

//BORDE RECURSOS
$pdf->SetXY(10, 140);
$pdf->Cell(140, 48, utf8_decode(''), 1,0, 'C');

//Texto FUENTES
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(150,140);
$pdf->Cell(150, 6, utf8_decode('FUENTES DE INFORMACIÓN'), 0, 'J');

//BORDE FUENTES
$pdf->SetXY(150, 140);
$pdf->Cell(135, 48, utf8_decode(''), 1,0, 'C');

$pdf->Output("DosUnidad.pdf",'I'); //Salida al navegador
 
?>