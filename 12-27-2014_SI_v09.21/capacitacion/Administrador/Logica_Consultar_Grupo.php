<?php 
 
	$idgrupo=""; 
	if(isset($_POST['idgrupo'])){
		$idgrupo=$_POST['idgrupo'];
	}

	  echo "<script type='text/javascript'>  
		window.location='Consultar_Grupo.php?idgrupo=$idgrupo';</script>";	
?>