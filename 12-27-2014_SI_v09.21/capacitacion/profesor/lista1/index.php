<?php
	include_once('PDF.php');
	session_start();
	if (isset($_GET["nombre"]))
	{
	$nombre = ($_GET["nombre"]);
	}
	if (isset($_POST["guardaControl"]))
	{
	$noControl = ($_POST["guardaControl"]);
	}
	if (isset($_POST["guardaNombre"]))
	{
	$nombreAlumno = ($_POST["guardaNombre"]);
	}
	if (isset($_POST["guardaPlan"]))
	{
	$carrera = ($_POST["guardaPlan"]);
	}
	

$pdf = new PDF('P','mm');
$pdf->AddPage();
$pdf->SetFont('Arial','', 9);
//imagenes
$pdf->Image('logo.jpg', 90,13, 25, 25, 'JPG');
$pdf->Image('logosep.jpg', 140,13, 60, 25, 'JPG');
$pdf->Image('seduzac.jpg', 10,13, 60, 25, 'JPG');
 
//Texto de Título
$pdf->SetFont('Arial','B', 14);
$pdf->SetXY(40, 40);
$pdf->Cell(250, 5, utf8_decode('INSTITUTO TECNOLÓGICO SUPERIOR ZACATECAS SUR'), 0, 'C');
 
//Texto nivel
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(20, 60);
$pdf->Cell(250, 5, utf8_decode('NIVEL: '), 0, 'C');

//Texto horario
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(20, 65);
$pdf->Cell(250, 5, utf8_decode('HORARIO: '), 0, 'C');

//Texto PROMEDIO
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(143, 65);
$pdf->Cell(30, 5, utf8_decode('PROMEDIO: '), 0, 'C');

//Texto PROFESOR
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(20, 70);
$pdf->Cell(250, 5, utf8_decode('PROFESOR :   ' .$nombre), 0, 'C');


//borde y relleno  no
$pdf->SetXY(10, 75);
//tono gris de relleno
$pdf->SetFillColor(189, 189, 189);
$pdf->Cell(10, 10, utf8_decode(''), 1,0, 'C',true);

//Texto NO
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(10, 80);
$pdf->Cell(10, 5, utf8_decode('NO'), 0, 'C');

//borde y relleno  control
$pdf->SetXY(20, 75);
//tono gris de relleno
$pdf->SetFillColor(189, 189, 189);
$pdf->Cell(30, 10, utf8_decode(''), 1,0, 'C',true);

//Texto control
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(23, 80);
$pdf->Cell(15, 5, utf8_decode('CONTROL'), 0, 'C');

//borde y relleno  nombre
$pdf->SetXY(50, 75);
//tono gris de relleno
$pdf->SetFillColor(189, 189, 189);
$pdf->Cell(90, 10, utf8_decode(''), 1,0, 'C',true);

//Texto nombre
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(70, 80);
$pdf->Cell(15, 5, utf8_decode('NOMBRE DEL ALUMNO'), 0, 'C');

//borde y relleno  plan
$pdf->SetXY(140, 75);
//tono gris de relleno
$pdf->SetFillColor(189, 189, 189);
$pdf->Cell(30, 10, utf8_decode(''), 1,0, 'C',true);

//Texto plan
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(143, 80);
$pdf->Cell(15, 5, utf8_decode('PLAN EST.'), 0, 'C');

//borde y relleno  CALIFICACION
$pdf->SetXY(170, 75);
//tono gris de relleno
$pdf->SetFillColor(189, 189, 189);
$pdf->Cell(33, 5, utf8_decode(''), 1,0, 'C',true);

//Texto CALIFICACION
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(170, 75);
$pdf->Cell(15, 5, utf8_decode('CALIFICACIÓN'), 0, 'C');

//borde y relleno  PROMEDIO
$pdf->SetXY(170, 80);
//tono gris de relleno
$pdf->SetFillColor(189, 189, 189);
$pdf->Cell(33, 5, utf8_decode(''), 1,0, 'C',true);

//Texto PROMEDIO
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(173, 80);
$pdf->Cell(15, 5, utf8_decode('PROMEDIO'), 0, 'C');

//ciclo para rellenar
	$contador =0;
	
	for ($i = 85; $i <= 250; $i=$i+5) 
	{
    	$pdf->SetXY(10, $i);
		if(isset($noControl[$contador])){
			$pdf->Cell(10, 5, utf8_decode($contador+1), 1,0, 'C');   
		//}

		//celda de control
		$pdf->SetXY(20, $i);
		//if(isset($noControl[$contador])){
			$pdf->Cell(30, 5, utf8_decode($noControl[$contador]), 1,0, 'C');
		//}
		//celda de nombre alumno
		$pdf->SetXY(50, $i);
		//if(isset($nombreAlumno[$contador])){
			$pdf->Cell(90, 5, utf8_decode($nombreAlumno[$contador]), 1,0, 'C');
		//}
		
		//celda de plan
		$pdf->SetXY(140, $i);
		$pdf->Cell(30, 5, utf8_decode($carrera[$contador]), 1,0, 'C');

		//celda de calif
		$pdf->SetXY(170, $i);
		$pdf->Cell(33, 5, utf8_decode(''), 1,0, 'C');
	}
		$contador=$contador+1; 	
	}


$pdf->SetFont('Arial','', 12);
$pdf->SetXY(120, 265);
$pdf->Cell(10, 5, utf8_decode('____________________'), 0, 'C');
//Texto firma
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(120, 270);
$pdf->Cell(10, 5, utf8_decode('FIRMA DEL PROFESOR'), 0, 'C');


$pdf->Output("Lista1.pdf",'I'); //Salida al navegador
 
?>