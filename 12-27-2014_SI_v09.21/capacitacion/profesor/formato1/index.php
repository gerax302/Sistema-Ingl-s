<?php
	include_once('PDF.php');

$pdf = new PDF('L','mm');
$pdf->AddPage();
$pdf->SetFont('Arial','', 9);
//Margen decorativo iniciando en 0, 0
$pdf->Image('logo.jpg', 15,13, 15, 15, 'JPG');
 
//Texto de Título
$pdf->SetXY(35, 10);
$pdf->Cell(250, 5, utf8_decode('INSTITUTO TECNOLÓGICO SUPERIOR ZACATECAS SUR'), 1,0, 'C');
 
//Texto FORMATO
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(35,20);
$pdf->Cell(100, 4, utf8_decode('FORMATO: '), 0, 'J');

//Texto dosificación de programa
$pdf->SetFont('Arial','', 10);
$pdf->SetXY(57,20);
$pdf->Cell(100, 4, utf8_decode('Dosificación de programa'), 0, 'J');

//Texto CÓDIGO
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(120,25);
$pdf->Cell(100, 4, utf8_decode('CÓDIGO: '), 0, 'J');

//Texto complemento código
$pdf->SetFont('Arial','', 10);
$pdf->SetXY(137,25);
$pdf->Cell(100, 4, utf8_decode('FP-SA-06-005'), 0, 'J');

//Texto REVISION
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(180,25);
$pdf->Cell(100, 4, utf8_decode('REVISIÓN: '), 0, 'J');

//Texto complemento REVISION
$pdf->SetFont('Arial','', 10);
$pdf->SetXY(201,25);
$pdf->Cell(100, 4, utf8_decode('2'), 0, 'J');

//Texto FECHA
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(225,25);
$pdf->Cell(80, 4, utf8_decode('FECHA: '), 0, 'J');

//Texto complemento FECHA
$pdf->SetFont('Arial','', 10);
$pdf->SetXY(240,25);
$pdf->Cell(70, 4, utf8_decode('01 de agosto de 2005'), 0, 'J');

//borde responsable y formato
$pdf->SetXY(35, 15);
$pdf->Cell(80, 20, utf8_decode(''), 1,0, 'C');

//borde codigo
$pdf->SetXY(115, 15);
$pdf->Cell(50, 20, utf8_decode(''), 1,0, 'C');

//borde revision
$pdf->SetXY(165, 15);
$pdf->Cell(50, 20, utf8_decode(''), 1,0, 'C');

//borde fecha
$pdf->SetXY(215, 15);
$pdf->Cell(70, 20, utf8_decode(''), 1,0, 'C');

//borde imagen
$pdf->SetXY(10, 10);
$pdf->Cell(25, 25, utf8_decode(''), 1,0, 'C');

//Texto responsable
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(35,30);
$pdf->Cell(100, 4, utf8_decode('RESPONSABLE: '), 0, 'J');

//Texto dosificación de programa
$pdf->SetFont('Arial','', 10);
$pdf->SetXY(67,30);
$pdf->Cell(100, 4, utf8_decode('Subdirección Académica'), 0, 'J');

//Texto dosificacion programa
$pdf->SetFont('Arial','', 14);
$pdf->SetXY(100,37);
$pdf->Cell(50, 4, utf8_decode('D O S I F I C A C I Ó N  D E  P R O G R A M A'), 0, 'C');

//texto catedrático
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(10,47);
$pdf->Cell(15, 4, utf8_decode('CATEDRÁTICO:'), 0, 'C');

//borde catedrático
$pdf->SetXY(10, 46);
$pdf->Cell(275, 6, utf8_decode(''), 1,0, 'C');

//texto asignatura
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(10,56);
$pdf->Cell(15, 4, utf8_decode('ASIGNATURA:'), 0, 'C');

//borde ASIGNATURA
$pdf->SetXY(10, 55);
$pdf->Cell(275, 6, utf8_decode(''), 1,0, 'C');

//texto divison
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(10,64);
$pdf->Cell(15, 4, utf8_decode('DIVISIÓN:'), 0, 'C');

//borde division
$pdf->SetXY(10, 61);
$pdf->Cell(90, 12, utf8_decode(''), 1,0, 'C');

//texto carrera
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(100,64);
$pdf->Cell(15, 4, utf8_decode('CARRERA:'), 0, 'C');

//borde CARRERA
$pdf->SetXY(100, 61);
$pdf->Cell(38, 12, utf8_decode(''), 1,0, 'C');

//texto HT
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(140,56);
$pdf->Cell(15, 4, utf8_decode('HT:'), 0, 'C');

//borde HT
$pdf->SetXY(138, 55);
$pdf->Cell(40, 6, utf8_decode(''), 1,0, 'C');

//texto HP
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(180,56);
$pdf->Cell(10, 4, utf8_decode('HP:'), 0, 'C');

//borde HP
$pdf->SetXY(178, 55);
$pdf->Cell(25, 6, utf8_decode(''), 1,0, 'C');

//texto GRUPO
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(180,64);
$pdf->Cell(10, 4, utf8_decode('GRUPO:'), 0, 'C');

//borde grupo
$pdf->SetXY(178, 61);
$pdf->Cell(50, 12, utf8_decode(''), 1,0, 'C');

//texto C
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(205,56);
$pdf->Cell(10, 4, utf8_decode('C:'), 0, 'C');

//borde C
$pdf->SetXY(203, 55);
$pdf->Cell(25, 6, utf8_decode(''), 1,0, 'C');

//texto semestre
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(140,64);
$pdf->Cell(15, 4, utf8_decode('SEMESTRE:'), 0, 'C');

//borde semestre
$pdf->SetXY(138, 61);
$pdf->Cell(40, 12, utf8_decode(''), 1,0, 'C');

//texto hoja
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(232,56);
$pdf->Cell(10, 4, utf8_decode('HOJA:               de'), 0, 'C');

//borde C
$pdf->SetXY(228, 55);
$pdf->Cell(57, 6, utf8_decode(''), 1,0, 'C');

//texto periodo
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(232,64);
$pdf->Cell(10, 4, utf8_decode('PERIODO:'), 0, 'C');

//borde PERIODO
$pdf->SetXY(228, 61);
$pdf->Cell(57, 12, utf8_decode(''), 1,0, 'C'); 

//texto objetivos el curso
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(10,72);
$pdf->Cell(20, 18, utf8_decode('OBJETIVOS DEL CURSO:'),0, 'J');

//borde objetivos
$pdf->SetXY(10, 77);
$pdf->Cell(275, 16, utf8_decode(''), 1,0, 'C'); 

//texto aportacion
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(10,91);
$pdf->Cell(20, 18, utf8_decode('APORTACIÓN DEL CURSO AL PERFIL PROFESIONAL:'),0, 'J');

//borde APORTACION
$pdf->SetXY(10, 96);
$pdf->Cell(275, 18, utf8_decode(''), 1,0, 'C'); 

//Texto relacion
$pdf->SetXY(10, 116);
$pdf->Cell(275, 6, utf8_decode('RELACIÓN CON OTRAS ASIGNATURAS'), 1,0, 'C');

//Texto temas
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(10, 122);
$pdf->Cell(160, 5, utf8_decode('TEMAS:'), 1,0, 'C');

//Texto ASIGNATURA
$pdf->SetFont('Arial','B', 10);
$pdf->SetXY(170, 122);
$pdf->Cell(115, 5, utf8_decode('ASIGNATURA:'), 1,0, 'C');

$pdf->RotarTexto(15,153,'ANTERIORES',90);

//borde ANTERIORES
$pdf->SetXY(10, 127);
$pdf->Cell(160, 28, utf8_decode(''), 1,0, 'C'); 

//borde ANTERIORES
$pdf->SetXY(10, 127);
$pdf->Cell(15, 28, utf8_decode(''), 1,0, 'C'); 

//borde ANTERIORES
$pdf->SetXY(170, 127);
$pdf->Cell(115, 28, utf8_decode(''), 1,0, 'C'); 

$pdf->RotarTexto(15,183,'POSTERIORES',90);

//borde posteriores
$pdf->SetXY(10, 155);
$pdf->Cell(160, 30, utf8_decode(''), 1,0, 'C'); 

//borde posteriores
$pdf->SetXY(10, 155);
$pdf->Cell(15, 30, utf8_decode(''), 1,0, 'C'); 

//borde posteriores
$pdf->SetXY(170, 155);
$pdf->Cell(115, 30, utf8_decode(''), 1,0, 'C'); 


$pdf->Output("DosGeneral.pdf",'I'); //Salida al navegador
 
?>