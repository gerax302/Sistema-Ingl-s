<?php 

 $idGrupo="";
 $grupillos="";
 
if(isset($_POST['grp'])){
	
	 $idGrupo=$_POST['grp'];
}
if(isset($_POST['nivgr'])){
	
	 $grupillos=$_POST['nivgr'];
}
if(isset($_GET['tipoconsulta'])){
	if($_GET['tipoconsulta']=="alta"){
		echo "<script type='text/javascript'>  
	window.location='Alta_Calificaciones1.php?idgr=$idGrupo&grupillos=$grupillos';</script>";
	}
	if($_GET['tipoconsulta']=="alta2"){
		echo "<script type='text/javascript'>  
	window.location='Alta_Calificaciones2.php?idgr=$idGrupo&grupillos=$grupillos';</script>";
	}
	if($_GET['tipoconsulta']=="consulta"){
		echo "<script type='text/javascript'>  
	window.location='Consulta_Calificaciones.php?idgr=$idGrupo&grupillos=$grupillos';</script>";
	}
}


	

  	

?>