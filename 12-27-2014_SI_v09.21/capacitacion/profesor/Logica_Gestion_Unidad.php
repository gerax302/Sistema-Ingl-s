<?php 
session_start();
include('local.php'); 

$parametroUnidad=$_GET['parametro'];
$cantidad=$_GET['cantidad'];
$idGeneral=$_GET['id'];
$grupo="";
if(isset($_GET['grupo'])){
	$grupo=$_GET['grupo'];
}

mysql_select_db("Ingles", $local);

 $db_seleccionada = mysql_select_db($database_local, $local);


$nivel=$_POST['asignatura']; 	
	
$idSinEspacios=trim($_POST['unidad']);
$idSinEspacios=rtrim($idGeneral)."".$idSinEspacios;
	
$insertSQL = ("INSERT INTO `dosificacionunidad`(`idDosificacionPorUnidad`, `unidad`,`grupo`, `nombreUnidad`, `objetivoAprendizaje`, `contenidoTemasSubtemas`, `estrategiasDidacticas`, `estrategiasAprendizaje`, `desarrolloNoHoras`, `desarrolloInicio`, `desarrolloTermino`, `evaluacion`, `practicasVisitas`, `recursosDidacticos`, `fuentesInformacion`) 
VALUES ('".$idSinEspacios."',
'".$_POST['unidad']."',
'".$nivel.$grupo."',
'".$_POST['nombreUnidad']."',
'".$_POST['objetivoAprendizaje']."',
'".$_POST['contenidoTemasSubtemas']."',
'".$_POST['estrategiasDidacticas']."',
'".$_POST['estrategiasDeAprendizaje']."',
'".$_POST['noHoras']."',
'".$_POST['inicio']."',
'".$_POST['termino']."',
'".$_POST['evaluacion']."',
'".$_POST['practicasVisitas']."',
'".$_POST['recursosDidacticos']."',
'".$_POST['fuentesDeInformacion']."'
)");
	
mysql_query($insertSQL, $local) or die ("No se ha guardado nada" .mysql_errno());

$buscaIdUnidad="select * from dosificacionunidad where nombreUnidad='".$_POST['nombreUnidad']."'";

$res=mysql_query($buscaIdUnidad, $local);

while($row=@mysql_fetch_array($res)){
	
	$idUnidad=$row['idDosificacionPorUnidad'];
	
}

	


if($parametroUnidad>0){
   $parametroUnidad=$parametroUnidad-1;
   $cantidad=$cantidad+1;
   echo "<script type='text/javascript'> 
				alert('Unidad ingresada correctamente'); 
				window.location='DosificacionPorUnidad.php?id=$idGeneral&parametro=$parametroUnidad&nivel=$nivel&cantidad=$cantidad&grupo=$grupo';
				</script>";	
}
else{
	 echo "<script type='text/javascript'> 
				alert('Operaci\u00F3n Exitosa'); 
				window.location='Inicio.php';</script>";	
	
}

mysql_close($local);

?>