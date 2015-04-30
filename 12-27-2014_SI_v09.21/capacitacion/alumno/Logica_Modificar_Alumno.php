<?php

	#function GuardarAlumno(){
    session_start();
	//SOLICITAR CONEXION 
	require_once('../Connections/local.php'); 
 	mysql_select_db($database_local, $local);

	if (isset($_SESSION["sesion"]))
	{
		//CREAR VARIABLE DE SESIÓN
        $numeroControl = ($_SESSION['sesion']);
		$consultaNombre="select nombre from Alumno where NoControl ='".$numeroControl."'";
		$respuesta=mysql_query($consultaNombre,$local);
		$row=mysql_fetch_array($respuesta);
		$nombre=$row['nombre'];	

	
	//CAMPOS A MODIFICAR
	$nombreNuevo=$_POST['nombre'];
	$apellidoPaternoNuevo=$_POST['apellidoPaterno'];
	$apellidoMaternoNuevo=$_POST['apellidoMaterno'];
	$direccionNuevo=$_POST['domicilio'];
	$telefonoNuevo=$_POST['telefono'];
	$correoNuevo=$_POST['correo'];
	$edadNuevo=$_POST['edad'];
	$nivelNuevo=$_POST['nivel'];
	$sexoNuevo=$_POST['genero'];
	$planEstudioNuevo=$_POST['planEstudios'];
	$carreraNuevo=$_POST['carrera'];
	$ncontrol=$_POST['ncontrol'];
	$preguntaSeguridadNuevo=$_POST['preguntaSeguridad'];
	$respuestaSeguridadNuevo=$_POST['respuestaSeguridad'];
	
	//CONSULTA PARA ACTUALIZAR DATOS DEL ALUMNO
	$actualizaAlumno = "UPDATE  alumno SET
	            nombre = '".$nombreNuevo."',
		        apellidoPaterno = '".$apellidoPaternoNuevo."',
				apellidoMaterno = '".$apellidoMaternoNuevo."',
				domicilio = '".$direccionNuevo."',
				telefono = '".$telefonoNuevo."',				
				correo = '".$correoNuevo."',				
				edad = '".$edadNuevo."',					
				sexo = '".$sexoNuevo."',		
				planEstudios = '".$planEstudioNuevo."',
				carrera = '".$carreraNuevo."',
				preguntaSeguridad = '".$preguntaSeguridadNuevo."',
				respuestaSeguridad = '".$respuestaSeguridadNuevo."'				
				WHERE   NoControl =  '".$numeroControl."' ";
				
	//echo "consulta ".$$actualizaAlumno ;
	 mysql_query($actualizaAlumno, $local) or die (mysql_error() . mysql_errno());

	
	 //MENSAJE DE CONFIRMACION ÉXITO EN OPERACIÓN 
	  echo "<script type='text/javascript'> 
				alert('Operaci\u00F3n Exitosa'); 
				window.location='Inicio.php';</script>";	
				
				
	#}
	
	
?>