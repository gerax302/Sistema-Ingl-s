<?php 
include('local.php'); 

mysql_select_db("Ingles", $local);


$id="";
 $db_seleccionada = mysql_select_db($database_local, $local);
 
 
 $saltoAreaObjetivo="";
 $saltoAreaAportacion="";
 $varObjetivo="";
 $varAportacion="";
 $varGrupo="";
 
 $varGrupo=$_POST['grupo'];
 $varObjetivo=$_POST['objetivoDelCurso'];
 $varAportacion=$_POST['aportacionDelCurso'];
 
 $saltoAreaObjetivo = str_replace("\n", "<br>", $varObjetivo);
 $saltoAreaAportacion = str_replace("\n", "<br>", $varAportacion);

$altaGeneral= ("INSERT INTO dosificaciongeneral(idDosificacionGeneral, formato, responsable, codigoDosificacion, revision, fechaDosificacion,
asignatura, horasTeoricas, horasPracticas, creditos, grupo, periodo, objetivoCurso, aportacionCurso, temaAnterior, temaPosterior, asignaturaAnterior, asignaturaPosterior) VALUES 
('".$_POST['responsable']."".$_POST['trampaPeriodo']."".$_POST['anio'].$_POST['trampaNivel'].$_POST['grupos']."',
'"."Dosificación de programa"."',
'".$_POST['responsable']."',
'".$_POST['codigo']."',
'".$_POST['revision']."',
'".$_POST['fecha']."',
'".$_POST['trampaNivel']."',
'".$_POST['horasTeoricas']."',
'".$_POST['horasPracticas']."',
'".$_POST['creditos']."',
'".$_POST['grupo']."',
'".$_POST['trampaPeriodo']."".$_POST['anio']."',
'".$_POST['objetivoDelCurso']."',
'".$_POST['aportacionDelCurso']."',
'".$_POST['temaAnterior']."',
'".$_POST['temaPosterior']."',
'".$_POST['asignaturaAnterior']."',
'".$_POST['asignaturaPosterior']."'
)");

mysql_query($altaGeneral, $local) or die ("No hace ninguna operación" .mysql_errno());

$buscaIdUnidad="select * from dosificaciongeneral where codigoDosificacion='".$_POST['codigo']."'";

$res=mysql_query($buscaIdUnidad, $local);



while($row=@mysql_fetch_array($res)){
	
	$id=$row['idDosificacionGeneral'];
	$nivel=$row['asignatura'];
	
}

   echo "<script type='text/javascript'> 
				alert('Operaci\u00F3n Exitosa'); 
				window.location='DosificacionPorUnidad.php?id=$id&parametro=7&cantidad=1&nivel=$nivel&grupo=$varGrupo';</script>";	

mysql_close($local);

?>