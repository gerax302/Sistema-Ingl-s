 <?php 

	session_start();
	require_once('../Connections/local.php'); 
 	mysql_select_db($database_local, $local);
	$id="";
	
		

		
if(isset($_POST['niveles'])){
	$buscar= "SELECT * from  nivel where nivelIngles='".trim($_POST['niveles'])."'";

	$buscandoNiveles = mysql_query($buscar,  $local);
	$i=1;
	while($row = mysql_fetch_array($buscandoNiveles))
	{

		$id=$row['idnivel'];
	}

}
		
		
    $nombre="";
	$apellidoPaterno="";
	$apellidoMaterno="";
	$domicilio="";
	$passwordAlumno="";
	$telefono="";
	$correo="";
	$edad="";
	$idnivel="";
	$sexo="";
	$planEstudios="";
	$carrera="";
	$estadoAlumno="";
	$preguntaSeguridad="";
	$respuestaSeguridad="";
	   
	   
	   
		$buscarAlumno= "SELECT *  
	FROM `ingles`.`alumno`
	WHERE `alumno`.`NoControl`="."'".$_POST['numeroControl']."'" ;
	
	$buscandoAlumno = mysql_query($buscarAlumno,  $local);
	
	$i=0;
	while($row = mysql_fetch_array($buscandoAlumno))
	{
	$nombre=$row['nombre'];
	$apellidoPaterno=$row['apellidoPaterno'];
	$apellidoMaterno=$row['apellidoMaterno'];
	$domicilio=$row['domicilio'];
	$passwordAlumno=$row['passwordAlumno'];
	$telefono=$row['telefono'];
	$correo=$row['correo'];
	$edad=$row['edad'];
	$sexo=$row['sexo'];
	$planEstudios=$row['planEstudios'];
	$carrera=$row['carrera'];
	$estadoAlumno=$row['estadoAlumno'];
	$preguntaSeguridad=$row['preguntaSeguridad'];
	$respuestaSeguridad=$row['respuestaSeguridad'];
		
	}


		
  		$reinscribeAlumno =("INSERT INTO reinscripcion (
	idReinscripcion,
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
		null,
		'".$_POST['numeroControl']."',
		'".$nombre."',
		'".$apellidoPaterno."',
		'".$apellidoMaterno."',
		'".$domicilio."',
		'".$passwordAlumno."',
		'".$telefono."',
		'".$correo."',
		'".$edad."',
		'".$id."',
		'".$sexo."',
		'".$planEstudios."',
		'".$carrera."',
		'".$estadoAlumno."',
		'".$preguntaSeguridad."',
		'".$respuestaSeguridad."',
		'"."vacio"."'
		)");


	if($_POST['formatoPago']==1){ 
  	$insertFormaPago = ("INSERT INTO formapago (idFormaPago, tipoPago,numeroRecibo,fechaLimite,nivelPagado,Alumno_NoControl) VALUES (
        'null',
	  	'".$_POST['formatoPago']."',
		'".$_POST['noRecibo']."', 
		'".""."',
		'".$_POST['niveles']."',  
		'".$_POST['numeroControl']."' 
		)");
 	}
 

	 else if($_POST['formatoPago']==2){
	 
	 $insertFormaPago = ("INSERT INTO formapago (idFormaPago, tipoPago,numeroRecibo,fechaLimite,nivelPagado,Alumno_NoControl) VALUES (
	        'null',
			'".$_POST['formatoPago']."',
			'".""."', 
			'".$_POST['fechaLimite']."', 
			'".$_POST['niveles']."',  
			'".$_POST['numeroControl']."' 
			)");
	 }
 
	if($_POST['formatoPago']!=0){
	      $libre=true;	 
		  
	 }
	 else{
		 $libre=false;
	 }


	 
	if($libre==true){

	mysql_query($reinscribeAlumno, $local) or die("Error al realizar el proceso: ".mysql_error());  
	mysql_query($insertFormaPago, $local) or die ("No realiza alguna operación : ".mysql_errno());

	  echo "<script type='text/javascript'> 
					alert('Operaci\u00F3n Exitosa'); 
					window.location='../index.php';</script>";	
	}


	else
	{
		echo "<script type='text/javascript'> 
		alert('Tiene campos vacios'); 
		window.location='Reinscripcion_Alumno.php';</script>";		
	}
	
	
		

?>