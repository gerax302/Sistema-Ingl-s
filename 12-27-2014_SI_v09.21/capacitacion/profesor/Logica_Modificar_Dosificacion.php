<?php
include('local.php'); 
session_start(); 


$db_seleccionada = mysql_select_db($database_local, $local);

mysql_select_db("Ingles", $local);
$nombre="";
$periodoGeneral="";
$anio="";
$asig="";
$gru="";

if(isset($_GET["nombre"])){
	
$nombre=$_GET["nombre"];
}
if (isset($_POST["trampaPeriodo"]))
{
	$periodoGeneral=$_POST["trampaPeriodo"];

}
if (isset($_POST["anio"]))
{
	$anio=$_POST["anio"];

}
if (isset($_POST["trampaNivel"]))
{
	$asig=$_POST["trampaNivel"];

}

if (isset($_POST["grupo2"]))
{
	$gru=$_POST["grupo2"];

}

if (isset($_SESSION["sesion"]))
{
	
	$idGeneral=$nombre.$periodoGeneral.$anio.$asig.$gru;
	/*$idGeneral=$_SESSION["nombreSesion"].$_POST["periodo1"].$_POST["anio1"].$_POST["asignatura1"].$_POST["grupo1"];*/
        
}





	$codigoNuevo=$_POST['codigo'];
	$revisionNueva=$_POST['revision'];
	$fechaNueva=$_POST['auxFecha'];
	$asignaturaNueva=$_POST['trampaNivel'];
	$horasTeoricasNuevo=$_POST['horasTeoricas'];
	$horasPracticasNuevo=$_POST['horasPracticas'];
	$grupoNuevo=$_POST['grupo2'];
	$objetivoDelCursoNuevo=trim($_POST['objetivoDelCurso']);
	$aportacionDelCursoNuevo=trim($_POST['aportacionDelCurso']);
	$temaAnteriorNuevo=$_POST['temaAnterior'];
	$temaPosteriorNuevo=$_POST['temaPosterior'];
	$AsignaturaAnteriorNuevo=$_POST['asignaturaAnterior'];
	$AsignaturaPosteriorNuevo=$_POST['asignaturaPosterior'];
		
		$actualizaGeneral = "UPDATE  dosificaciongeneral
		SET     codigoDosificacion = '".$codigoNuevo."',
		        revision = '".$revisionNueva."',
				fechaDosificacion = '".$fechaNueva."',
				asignatura = '".$asignaturaNueva."',
				horasTeoricas = '".$horasTeoricasNuevo."',				
				horasPracticas = '".$horasPracticasNuevo."',
				periodo = '".$periodoGeneral."'	,			
				grupo = '".$grupoNuevo."',
				objetivoCurso = '".$objetivoDelCursoNuevo."',				
				aportacionCurso = '".$aportacionDelCursoNuevo."',				
				temaAnterior = '".$temaAnteriorNuevo."',				
				temaPosterior = '".$temaPosteriorNuevo."',
				asignaturaAnterior = '".$AsignaturaAnteriorNuevo."',				
				asignaturaPosterior = '".$AsignaturaPosteriorNuevo."'		
				WHERE   idDosificacionGeneral = '$idGeneral'";


 		mysql_query($actualizaGeneral, $local)or die ("No guardo nada" .mysql_errno());

 echo "<script type='text/javascript'> 
	 alert('Operaci\u00F3n Exitosa'); 
	 window.location='Modificar_Dosificacion.php?idGeneral=$idGeneral';
	  </script>";

?>
