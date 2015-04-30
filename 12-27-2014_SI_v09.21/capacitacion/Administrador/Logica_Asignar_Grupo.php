<?php 

require_once('../Connections/local.php'); 

$db_seleccionada = mysql_select_db($database_local, $local);

mysql_select_db("Ingles", $local);
 $idNivel="";
 
if(isset($_POST['niveles'])){
	 $buscar= "SELECT * from  nivel, grupo where nivelIngles='".$_POST['niveles']."' and nivel.idnivel=grupo.nivel_idnivel";
	
	$buscandoNiveles = mysql_query($buscar,  $local);
	$i=1;
	while($row = mysql_fetch_array($buscandoNiveles))
	{
		$idNivel=$row['idnivel'];
	}
	
}


	

  echo "<script type='text/javascript'>  
	window.location='Asignar_Grupos.php?idNivel=$idNivel';</script>";	

?>