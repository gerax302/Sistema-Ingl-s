<?php
include('local.php'); 
session_start(); 


$db_seleccionada = mysql_select_db($database_local, $local);

mysql_select_db("Ingles", $local);

if (isset($_GET["id"]))
{
	$idUnidad=$_GET["id"];

}

	$unidadNuevo=$_POST['unidad'];
	$nombreUnidadNuevo=$_POST['nombre'];
	$objetivoAprendizajeNuevo=$_POST['objetivoAprendizaje'];
	$contenidoTemasSubtemasNuevo=$_POST['contenidoTemasSubtemas'];
	$estrategiasDidacticasNuevo=$_POST['estrategiasDidacticas'];
	$estrategiasAprendizajeNuevo=$_POST['estrategiasDeAprendizaje'];
	$desarrolloNoHorasNuevo=$_POST['noHoras'];
	$desarrolloInicioNuevo=$_POST['inicio'];
	$desarrolloTerminoNuevo=$_POST['termino'];
	$evaluacionNuevo=$_POST['evaluacion'];
	$practicasVisitasNuevo=$_POST['practicasVisitas'];
	$recursosDidacticosNuevo=$_POST['recursosDidacticos'];
	$fuentesInformacionNuevo=$_POST['fuentesDeInformacion'];
		
		$actualizaUnidad = "UPDATE  dosificacionunidad
		SET     unidad = '".$unidadNuevo."',
		        nombreUnidad = '".$nombreUnidadNuevo."',
				objetivoAprendizaje = '".$objetivoAprendizajeNuevo."',
				contenidoTemasSubtemas = '".$contenidoTemasSubtemasNuevo."',
				estrategiasDidacticas = '".$estrategiasDidacticasNuevo."',				
				estrategiasAprendizaje = '".$estrategiasAprendizajeNuevo."',
				desarrolloNoHoras = '".$desarrolloNoHorasNuevo."'	,			
				desarrolloInicio = '".$desarrolloInicioNuevo."',
				desarrolloTermino = '".$desarrolloTerminoNuevo."',				
				evaluacion = '".$evaluacionNuevo."',				
				practicasVisitas = '".$practicasVisitasNuevo."',				
				recursosDidacticos = '".$recursosDidacticosNuevo."',
				fuentesInformacion = '".$fuentesInformacionNuevo."'		
				WHERE   idDosificacionPorUnidad = '$idUnidad'";


 		mysql_query($actualizaUnidad, $local)or die ("No guardo nada" .mysql_errno());

 echo "<script type='text/javascript'> 
	 alert('Operaci\u00F3n Exitosa'); window.location='Modificar_Dosificacion_Unidad.php?idUnidad=$idUnidad';
	  </script>";

?>