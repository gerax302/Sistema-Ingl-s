<?php 
include('local.php'); 
session_start();

if(isset($_GET["identificaClase"])){
	
$clase=$_GET["identificaClase"];
}
if(isset($_GET["nombre"])){
	
$nombre=$_GET["nombre"];
}

if (isset($_SESSION["sesion"]))
{
	
	$_POST["periodoBusqueda"];
	$idGeneral=$nombre.$_POST["periodoBusqueda"].$_POST["anio1"].$_POST["asignatura1"].$_POST["grupo1"];
	/*$idGeneral=$_SESSION["nombreSesion"].$_POST["periodo1"].$_POST["anio1"].$_POST["asignatura1"].$_POST["grupo1"];*/
        
}


$periodo="".$_POST["periodoBusqueda"];
$anio="".$_POST["anio1"];



if($clase=="consultar"){

 echo "<script type='text/javascript'> 
	  window.location='Consulta_Dosificacion.php?idGeneral=$idGeneral&periodoBusqueda=$periodo&anio=$anio';
	  </script>";

}else if($clase=="modificar"){
	
	 echo "<script type='text/javascript'> 
	  window.location='Modificar_Dosificacion.php?idGeneral=$idGeneral&periodoBusqueda=$periodo&anio=$anio';
	  </script>";
}
   
	 
?>
