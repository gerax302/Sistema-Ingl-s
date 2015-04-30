<?php
	
	include_once('PDF.php');

$pdf = new PDF('L','mm');
$pdf->AddPage();
$pdf->SetFont('Arial','', 9);
//imagenes
$pdf->Image('logo.jpg', 15,13, 20, 20, 'JPG');
$pdf->Image('logosep.jpg', 220,13, 60, 20, 'JPG');

 
//Texto de Título
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(80, 20);
$pdf->Cell(220, 5, utf8_decode('INSTITUTO TECNOLÓGICO SUPERIOR ZACATECAS SUR'), 0, 'C');
 
//Texto ingles
//$pdf->SetFont('Arial','B', 12);
//$pdf->SetXY(95,50);
//$pdf->Cell(50, 4, utf8_decode('INGLES'), 0, 'C');

//Texto nivel
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(20, 40);
$pdf->Cell(250, 5, utf8_decode('NIVEL'), 0, 'C');

//LINEA nivel
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(45, 40);
$pdf->Cell(250, 5, utf8_decode('__________'), 0, 'C');

//Texto horario
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(20, 50);
$pdf->Cell(250, 5, utf8_decode('HORARIO'), 0, 'C');

//LINEA HORARIO
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(45, 50);
$pdf->Cell(250, 5, utf8_decode('____________________'), 0, 'C');

//Texto PROFESOR
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(155, 40);
$pdf->Cell(30, 5, utf8_decode('PROFESOR'), 0, 'C');

//LINEA PROFESOR
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(180, 40);
$pdf->Cell(250, 5, utf8_decode('________________________________________'), 0, 'C');

//Texto PERIODO
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(155, 50);
$pdf->Cell(250, 5, utf8_decode('PERIODO'), 0, 'C');

//LINEA PERIODO
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(180, 50);
$pdf->Cell(250, 5, utf8_decode('________________________________________'), 0, 'C');


//borde y relleno  no
$pdf->SetXY(10, 60);
//tono gris de relleno
$pdf->SetFillColor(189, 189, 189);
$pdf->Cell(10, 5, utf8_decode(''), 1,0, 'C',true);

//Texto NO
$pdf->SetFont('Arial','', 10);
$pdf->SetXY(10, 60);
$pdf->Cell(10, 5, utf8_decode('NO'), 0, 'C');

//borde y relleno  control
$pdf->SetXY(20, 60);
//tono gris de relleno
$pdf->SetFillColor(189, 189, 189);
$pdf->Cell(30, 5, utf8_decode(''), 1,0, 'C',true);

//Texto control
$pdf->SetFont('Arial','', 10);
$pdf->SetXY(23, 60);
$pdf->Cell(15, 5, utf8_decode('CONTROL'), 0, 'C');

//borde y relleno  nombre
$pdf->SetXY(50, 60);
//tono gris de relleno
$pdf->SetFillColor(189, 189, 189);
$pdf->Cell(50, 5, utf8_decode(''), 1,0, 'C',true);

//Texto nombre
$pdf->SetFont('Arial','', 10);
$pdf->SetXY(55, 60);
$pdf->Cell(50, 5, utf8_decode('NOMBRE DEL ALUMNO'), 0, 'C');

//borde y relleno  plan
$pdf->SetXY(100, 60);
//tono gris de relleno
$pdf->SetFillColor(189, 189, 189);
$pdf->Cell(23, 5, utf8_decode(''), 1,0, 'C',true);

//Texto plan
$pdf->SetFont('Arial','', 10);
$pdf->SetXY(102, 60);
$pdf->Cell(15, 5, utf8_decode('PLAN EST.'), 0, 'C');


//borde y relleno  asistencia
$pdf->SetXY(123, 60);
//tono gris de relleno
$pdf->SetFillColor(189, 189, 189);
$pdf->Cell(160, 5, utf8_decode(''), 1,0, 'C',true);

//Texto ASISTENCIA
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(123, 60);
$pdf->Cell(160, 5, utf8_decode('ASISTENCIA'),1, 0, 'C');

//ciclo para rellenar
	$contador =1;
	for ($i = 65; $i <= 160; $i=$i+5) 
	{
    	$pdf->SetXY(10, $i);
		$pdf->Cell(10, 5, utf8_decode($contador), 1,0, 'C');   

		//celda de control
		$pdf->SetXY(20, $i);
		$pdf->Cell(30, 5, utf8_decode(''), 1,0, 'C');

		//celda de nombre
		$pdf->SetXY(50, $i);
		$pdf->Cell(50, 5, utf8_decode(''), 1,0, 'C');

		//celda de plan
		$pdf->SetXY(100, $i);
		$pdf->Cell(23, 5, utf8_decode(''), 1,0, 'C');

		//celda de calif
		$pdf->SetXY(123, $i);
		$pdf->Cell(10, 5, utf8_decode(''), 1,0, 'C');

		//celda de calif
		$pdf->SetXY(133, $i);
		$pdf->Cell(10, 5, utf8_decode(''), 1,0, 'C');

		//celda de calif
		$pdf->SetXY(143, $i);
		$pdf->Cell(10, 5, utf8_decode(''), 1,0, 'C');

		//celda de calif
		$pdf->SetXY(153, $i);
		$pdf->Cell(10, 5, utf8_decode(''), 1,0, 'C');

		//celda de calif
		$pdf->SetXY(163, $i);
		$pdf->Cell(10, 5, utf8_decode(''), 1,0, 'C');

		//celda de calif
		$pdf->SetXY(173, $i);
		$pdf->Cell(10, 5, utf8_decode(''), 1,0, 'C');

		//celda de calif
		$pdf->SetXY(183, $i);
		$pdf->Cell(10, 5, utf8_decode(''), 1,0, 'C');

		//celda de calif
		$pdf->SetXY(193, $i);
		$pdf->Cell(10, 5, utf8_decode(''), 1,0, 'C');

		//celda de calif
		$pdf->SetXY(203, $i);
		$pdf->Cell(10, 5, utf8_decode(''), 1,0, 'C');

		//celda de calif
		$pdf->SetXY(213, $i);
		$pdf->Cell(10, 5, utf8_decode(''), 1,0, 'C');

		//celda de calif
		$pdf->SetXY(223, $i);
		$pdf->Cell(10, 5, utf8_decode(''), 1,0, 'C');

		//celda de calif
		$pdf->SetXY(233, $i);
		$pdf->Cell(10, 5, utf8_decode(''), 1,0, 'C');

		//celda de calif
		$pdf->SetXY(243, $i);
		$pdf->Cell(10, 5, utf8_decode(''), 1,0, 'C');

		//celda de calif
		$pdf->SetXY(253, $i);
		$pdf->Cell(10, 5, utf8_decode(''), 1,0, 'C');

		//celda de calif
		$pdf->SetXY(263, $i);
		$pdf->Cell(10, 5, utf8_decode(''), 1,0, 'C');

		//celda de calif
		$pdf->SetXY(273, $i);
		$pdf->Cell(10, 5, utf8_decode(''), 1,0, 'C');

		$contador=$contador+1; 	
	}

//Texto firma
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(150, 170);
$pdf->Cell(10, 5, utf8_decode('FIRMA DEL PROFESOR'), 0, 'C');


$pdf->Output("Lista1.pdf",'I'); //Salida al navegador
 
?>