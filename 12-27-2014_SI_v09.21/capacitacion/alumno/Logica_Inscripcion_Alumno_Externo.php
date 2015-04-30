<?php 

//conexión a base de datos
include('local.php'); 

//datos para la conección de la base de datos
mysql_select_db("Ingles", $local);
mysql_select_db($database_local, $local);
$db_seleccionada = mysql_select_db($database_local, $local);


$id="";

$db_seleccionada = mysql_select_db($database_local, $local);

if(isset($_POST['niveles'])){
	$buscar= "SELECT * from  nivel where nivelIngles='".trim($_POST['niveles'])."'";
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
				if($_POST['curp']==$row['NoControl']){
					$var=$var+1;				
				}
				
			}

if($var==0){
//Código SQL para la inserción de la base de datos.
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
  estadoAlumno,
  preguntaSeguridad, 	
  respuestaSeguridad,
  idGrupo) VALUES (
        '".$_POST['curp']."',
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
        '".$_POST['Plan']."',
        '".$_POST['estado']."',
		'".$_POST['pregunta']."',
		'".$_POST['respuesta']."',
		'"."vacio"."'
		
		)");

//Este if es para que no haga nada si el combo box sigue en la posición 0 o si siguen las lineas. 						
 if($_POST['niveles']==0 || $_POST['genero']==0 || $_POST['estado']==0  ){
  $libre=false;
 }else{
	 $libre=true; 
 }
  
 //si la forma de pago es con Recibo de banco, entonces se debe activar el campo paraingresar el numero de recibo 
 if($_POST['formatoPago']==1){ 
  
  $insertFormaPago = ("INSERT INTO formapago (idFormaPago, tipoPago,numeroRecibo,fechaLimite,nivelPagado,Alumno_NoControl) VALUES (
        'null',
		'".$_POST['formatoPago']."',
		'".$_POST['noRecibo']."', 
		'".""."',
		'".$_POST['niveles']."',  
		'".$_POST['curp']."' 
		)");
 }
 //si la forma de pago es con Prorroga, entonces se debe activar el campo para ingresar la fecha limite 
 else if($_POST['formatoPago']==2){
	 
 $insertFormaPago = ("INSERT INTO formapago (idFormaPago, tipoPago,numeroRecibo,fechaLimite,nivelPagado,Alumno_NoControl) VALUES (
        'null',
		'".$_POST['formatoPago']."',
		'".""."', 
		'".$_POST['fechaLimite']."', 
		'".$_POST['niveles']."',  
		'".$_POST['curp']."' 
		)");
 }
 
 //si no se ha seleccionado nada en el combo de Forma de Pago
 
if($_POST['formatoPago']!=0){
      $libre=true;	 
	  
 }else{
	 $libre=false; 
 }

if($libre==true){
	
  //si hay algun error en la conexión de la base de datos. 
   
   mysql_query($insertAlumno, $local) or die(mysql_error());
   mysql_query($insertFormaPago, $local) or die ("No realiza alguna operación" .mysql_errno());
 
 //Mensaje en java script que indica la operacióon exitosa.  
 echo "<script type='text/javascript'> 
				alert('Operaci\u00F3n Exitosa'); 
				window.location='../index.php';</script>";	
}else{
	//Si hay algun campo vacio en la operación 
	 echo "<script type='text/javascript'> 
				alert('Tiene campos vacios'); 
				window.location='Inscripcion_Alumno_Externo.php';</script>";	
}

}else{
	echo "<script type='text/javascript'>
					alert('Su n\u00FAmero de control esta registrado, seleccione opci\u00F3n reinscripci\u00F3n para continuar');
					window.location='salir.php';</script>";
	
}

?>