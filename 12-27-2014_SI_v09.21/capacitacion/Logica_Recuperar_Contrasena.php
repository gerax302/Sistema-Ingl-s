<?php 
//conexión a base de datos
include('local.php'); 
$seleccionado=""; $tablaBD="";
//datos para la conección de la base de datos
mysql_select_db("Ingles", $local);
mysql_select_db($database_local, $local);
$db_seleccionada = mysql_select_db($database_local, $local);

//CONTIENE LA LOGICA PARA RECUPERAR LA CONTRASEÑA DE UN USUARIO
$key = ""; 
$idUsuario=$_POST['cajaUsuario'];  
$preguntaSeguridad=$_POST['comboPreguntas'];
$respuesta=$_POST['cajaRespuesta'];  	

$valorNombre=$_POST["cajaUsuario"];
$valorRespuesta=$_POST["cajaRespuesta"];

$mensaje= "Su contrasena es: ";	
$mensajeIncorrecto= "Sus datos son incorrectos";

//condiciones para que se seleccione 
if(isset($_GET["usuarioLogin"])){

	$seleccionado =$_GET["usuarioLogin"];

	if($seleccionado=="alumno"){
		$tablaBD ="alumno";
		$password="passwordAlumno";
		$idUsuario="NoControl";
	}

	if($seleccionado=="profesor"){
		$tablaBD ="profesor";
		$password="passwordProfesor";
		$idUsuario="matricula";
	}

	if( $seleccionado=="administrador" ){
		$tablaBD ="usuario";
		$password="passwordUsuario";
		$idUsuario="nombre";
	}	

$patron = '/^[a-zA-Z]*$/';
	
$consulta="  select * from $tablaBD where ".$idUsuario." = '".$_POST["cajaUsuario"]."' 
				and preguntaSeguridad = '".$_POST["comboPreguntas"]."' "."
				and respuestaSeguridad = '".$_POST["cajaRespuesta"]."'  ";

//echo "<br>"; echo "La consulta que se ejecuta es: ".$consulta;    echo "<br>";
mysql_query($consulta, $local) or die(mysql_error());

$res=mysql_query($consulta,$local);
while($row = @mysql_fetch_array($res)){	   
	$key=$row[$password];
}

if ($consulta == true) {
	if($key==""){
		echo "<script type='text/javascript'> 
			alert('Datos Incorrectos'); 
			window.location='Recuperar_Contrasena.php?usuarioLogin=$seleccionado';	</script>";
	}
	else{
		echo "<script type='text/javascript'> 
				alert('Operaci\u00F3n Exitosa'); 
				window.location='Recuperar_Contrasena.php?				usuarioLogin=$seleccionado&contrasena=$key&visible=true';</script>";
	}	
}

/*}else{
	//Si hay algun campo vacio en la operación 
	echo "<script type='text/javascript'> 
				alert('Datos incorrectos'); 
				window.location='Recuperar_Contrasena.php?usuarioLogin=$seleccionado';</script>";	
}*/
}
?>