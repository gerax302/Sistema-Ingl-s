<?php 

require_once('../Connections/local.php'); 

$idNivel=$_POST['Niveles'].$_POST['Periodo'].$_POST['anio'];

 $insertSQL = ("INSERT INTO nivel (Idnivel, nivelIngles, periodo,anio, estadoNivel) VALUES (
  					  '".$idNivel."',
                      '".$_POST['Niveles']."',
					  '".$_POST['Periodo']."',
					  '".$_POST['anio']."',
					  '"."Activo"."'
					  )");
					
  mysql_select_db($database_local, $local);
 
  $Result1 = mysql_query($insertSQL, $local) or die(mysql_error());
  echo "<script type='text/javascript'> 
		alert('Operaci\u00F3n Exitosa'); 
	window.location='Inicio.php';</script>";	

?>