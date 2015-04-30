<?php 

	require_once('../Connections/local.php'); 

	$db_seleccionada = mysql_select_db($database_local, $local);

	mysql_select_db("Ingles", $local);
	 $idNivel="";
	 $idGrupo="";
	 $noControl="";
	 $valorTabla1="";
	 $valorTabla2="";

	 if(isset($_GET['idNivel'])){
		 $idNivel=$_GET['idNivel'];

	 }
	 if(isset($_POST['trampaControl'])){
		 $noControl=$_POST['trampaControl'];
	 }
	 
	 if(isset($_POST['tabla1'])){
		 $valorTabla1=$_POST['tabla1'];
	 }
	 if(isset($_POST['tabla2'])){
		 $valorTabla2=$_POST['tabla2'];
	 }
	 

	$numeroAlumnos=1;

	if(isset($_POST['trampa'])){
		 $buscar= "SELECT * from  grupo where nombreGrupo='".$_POST['trampa']."' and nivel_idnivel='".$idNivel."'";
		$buscandoNiveles = mysql_query($buscar,  $local);
		$i=0;
		while($row = mysql_fetch_array($buscandoNiveles))
		{
			$idGrupo=$row['idGrupo'];
		}
	}	

		$buscaValor="SELECT * from alumno where idGrupo='".$idGrupo."'";

		$busquedaValor=mysql_query($buscaValor,  $local);
		$i=0;
		while($row = mysql_fetch_array($busquedaValor))
		{

			$numeroAlumnos=$numeroAlumnos+1;
		}
		
		$buscaValor="SELECT * from reinscripcion where idGrupo='".$idGrupo."'";

		$busquedaValor=mysql_query($buscaValor,  $local);
		$i=0;
		while($row = mysql_fetch_array($busquedaValor))
		{

			$numeroAlumnos=$numeroAlumnos+1;
		}
		

	$consultaGrupo="Update grupo set numAlumnos='".$numeroAlumnos."'where nombreGrupo='".$_POST['trampa']."' and nivel_idnivel='".$idNivel."'";
	mysql_query($consultaGrupo,  $local);
	if($valorTabla1>=1){
	echo "id grupo".$idGrupo."no control".$noControl;	
	$consultaActualiza="Update alumno set idGrupo='".$idGrupo."' where NoControl='".$noControl."' and idGrupo='vacio'";
	mysql_query($consultaActualiza,  $local);
	
	
	}
	if($valorTabla2>=1){
	$consultaActualiza="Update reinscripcion set idGrupo='".$idGrupo."' where NoControl='".$noControl."' and idGrupo='vacio'";
	mysql_query($consultaActualiza,  $local);
	}

	echo "<script type='text/javascript'>  
	  alert('El alumno esta inscrito');
		window.location='Asignar_Grupos.php?idNivel=$idNivel';</script>";

?>