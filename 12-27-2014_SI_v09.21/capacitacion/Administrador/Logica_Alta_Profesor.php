<?php 
	/////////////////////////////////////////////////////CODIGO PARA ASIGNAR LOS VALORES DE LO CHECKBOX
	//variables Niveles Impartidos
	$impartidos=""; 
	$ni1="I"; $ni2="II"; $ni3="III"; $ni4="IV"; $ni5="V"; 	$ni6="VI"; 	$niCert="Cert."; 
	//variables Niveles Impartidos Actualmente
	$impartidosActualmente=""; 
	$nia1="I"; $nia2="II"; $nia3="III"; $nia4="IV"; $nia5="V"; $nia6="VI"; $niaCert="Cert."; 	

	//RECORRER NIVELES IMPARTIDOS
	$arreImpartido = $_POST['impartido'];
	if(empty($arreImpartido)){ 
    	//echo("No has seleccionado opciones!");
	}
  	else
  	{
    	$N = count($arreImpartido);
	    //echo("Has seleccionado $N opciones: ");
    	for($i=0; $i < $N; $i++)
	    {
	      //echo($arreImpartido[$i] . " ");
		  $impartidos = $impartidos." ".$arreImpartido[$i];
	    }
		//echo $impartidos;
	}
	//ESPACIO
	echo "<br>";
	//RECORRER NIVELES IMPARTIDOS
	$arreImpartidoActual = $_POST['impartidoActual'];
	if(empty($arreImpartidoActual)) {
    	//echo("No has seleccionado opciones!");
	}
  	else
  	{
    	$N = count($arreImpartidoActual);
	    //echo("Has seleccionado $N opciones: ");
    	for($i=0; $i < $N; $i++)
	    {
	      //echo($arreImpartidoActual[$i] . " ");
		  $impartidosActualmente = $impartidosActualmente." ".$arreImpartidoActual[$i];
	    }
		//echo $impartidosActualmente;
	}	
	

require_once('../Connections/local.php'); 

 $insertSQL = ("INSERT INTO profesor (matricula, nombre, apellidoPaterno,apellidoMaterno, direccion, telefono, correo, certificaciones, experiencia, fechaIngreso, nivelesImpartidos, nivelImpartidoActualmente, periodoLaboral, estadoLaboral, passwordProfesor, preguntaSeguridad, respuestaSeguridad) VALUES (
  		'".$_POST['matricula']."',
              '".$_POST['nombre']."',
              '".$_POST['apellidoPaterno']."',
              '".$_POST['apellidoMaterno']."',
              '".$_POST['direccion']."',
              '".$_POST['telefono']."',
              '".$_POST['correo']."',
              '".$_POST['certificaciones']."',
              '".$_POST['experiencia']."',
              '".$_POST['fechaIngreso']."', 
              '".$impartidos."',
              '".$impartidosActualmente."',
              '".$_POST['periodoLaboral']."',
              '".$_POST['estadoLaboral']."',
              '".$_POST['contrasena']."',
              '".$_POST['comboPreguntas']."',
              '".$_POST['cajaRespuesta']."'
              )");
					
  mysql_select_db($database_local, $local);
 
  $Result1 = mysql_query($insertSQL, $local) or die(mysql_error());
  echo "<script type='text/javascript'> 
		alert('Operaci\u00F3n Exitosa'); 
	window.location='Inicio.php';</script>";	

?>