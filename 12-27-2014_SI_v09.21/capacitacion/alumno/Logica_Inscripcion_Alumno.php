<?php
include('local.php');

mysql_select_db("Ingles", $local);

mysql_select_db($database_local, $local);

$id="";

$db_seleccionada = mysql_select_db($database_local, $local);

if(isset($_POST['niveles'])){
	$buscar= "SELECT * from  nivel where nivelIngles='".$_POST['niveles']."'";
	$buscandoNiveles = mysql_query($buscar,  $local);
	$i=1;
	while($row = mysql_fetch_array($buscandoNiveles))
	{

		$id=$row['idnivel'];
	}

}


$var=0;
$buscarId= "SELECT  NoControl from alumno";

			$buscandoId = mysql_query($buscarId,  $local);
			
			while($row = mysql_fetch_array($buscandoId))
			{
				if($_POST['NumeroControl']==$row['NoControl']){
					$var=$var+1;				
				}
				
			}

if($var==0){

$insertAlumno = ("INSERT INTO alumno (
	NoControl,
	nombre,
	apellidoPaterno,
	apellidoMaterno,
	domicilio,
	passwordAlumno,
	telefono,
	correo,
	edad,
	idnivel,
	sexo,
	planEstudios,
	carrera,
	estadoAlumno,
	preguntaSeguridad,
	respuestaSeguridad,
	idGrupo) VALUES (
		'".$_POST['NumeroControl']."',
		'".$_POST['nombre']."',
		'".$_POST['apellidoPaterno']."',
		'".$_POST['apellidoMaterno']."',
		'".$_POST['direccion']."',
		'".$_POST['contraseña']."',
		'".$_POST['telefono']."',
		'".$_POST['correo']."',
		'".$_POST['edad']."',
		'".$id."',
		'".$_POST['genero']."',
		'".$_POST['planEstudio']."',
		'".$_POST['carrera']."',
		'".$_POST['estado']."',
		'".$_POST['comboPreguntas']."',
		'".$_POST['cajaRespuesta']."',
		'"."vacio"."'
		)");


		if($_POST['niveles']==0 || $_POST['planEstudio']!=0 || $_POST['genero']==0 || $_POST['estado']==0  ){
			$libre=false;
		}
		else{
			$libre=true;
		}

		if($_POST['formatoPago']==1){
			$insertFormaPago = ("INSERT INTO formapago (idFormaPago, tipoPago,numeroRecibo,fechaLimite,nivelPagado,Alumno_NoControl) VALUES (
				'null',
				'".$_POST['formatoPago']."',
				'".$_POST['noRecibo']."',
				'".""."',
				'".$_POST['niveles']."',
				'".$_POST['NumeroControl']."'
				)");
			}
			else if($_POST['formatoPago']==2){

				$insertFormaPago = ("INSERT INTO formapago (idFormaPago, tipoPago,numeroRecibo,fechaLimite,nivelPagado,Alumno_NoControl) VALUES (
					'null',
					'".$_POST['formatoPago']."',
					'".""."',
					'".$_POST['fechaLimite']."',
					'".$_POST['niveles']."',
					'".$_POST['NumeroControl']."'
					)");
				}

				if($_POST['formatoPago']!=0){
					$libre=true;

				}
				else{
					$libre=false;
				}

				if($libre==true){

					mysql_query($insertAlumno, $local) or die(mysql_error());
					mysql_query($insertFormaPago, $local) or die ("No realiza alguna operación" .mysql_errno());

					echo "<script type='text/javascript'>
					alert('Operaci\u00F3n Exitosa');
					window.location='../index.php';</script>";
				}
				else{
					echo "<script type='text/javascript'>
					alert('Tiene campos vacios');
					window.location='Inscripcion_Alumno.php';</script>";

				}
}else{
	echo "<script type='text/javascript'>
					alert('Su n\u00FAmero de control esta registrado, seleccione opci\u00F3n reinscripci\u00F3n para continuar');
					window.location='salir.php';</script>";
	
	
}
	
				?>
