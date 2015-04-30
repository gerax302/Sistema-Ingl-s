<?php 
session_start();
include('local.php'); 

$idUnidad="";
if(isset($_GET["identificaClase"])){
	
	$clase=$_GET["identificaClase"];
	
}


if (isset($_GET["nombre"]))
	{
		
		$idUnidad=$_GET["nombre"].$_POST["periodoBusqueda"].$_POST["anio1"].$_POST["asignatura1"].$_POST["grupo1"].$_POST["unidad1"];
		//$idGeneral=$_SESSION["nombreSesion"].$_POST["periodoBusqueda"].$_POST["anio1"].$_POST["asignatura1"].$_POST["grupo1"];
	}

if($clase=="consultar"){

 echo "<script type='text/javascript'> 
	  window.location='Consulta_Dosificacion_Unidad.php?idUnidad=$idUnidad';
	  </script>";
}


if($clase=="modificar"){

 echo "<script type='text/javascript'> 
	  window.location='Modificar_Dosificacion_Unidad.php?idUnidad=$idUnidad';
	  </script>";
}
	 
?>
