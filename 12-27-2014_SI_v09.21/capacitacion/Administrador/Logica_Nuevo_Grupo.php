<?php 

  # CONEXION A LA BASE DE DATOS
  include('../Connections/local.php'); 
  mysql_select_db($database_local, $local);
  
  $matricula=$_POST['matricula'];
  $nivel=$_POST['nivel'];
  $anio=$_POST['anio'];
  $grupo=$_POST['grupo'];

  ####### CONSULTA PARA SELECCIONAR EL NIVEL CORRESPONDIENTE Y POSTERIOMENTE REALIZAR LA INSERCCION DE GRUPO ###########
  $idNivel=("select `idnivel` from `nivel` where `nivelIngles`='$nivel'");
  

  $resultaNivel= mysql_query($idNivel, $local) or die("Error al consultar id del nivel:   ".mysql_error());

  
    $rowNivel = mysql_fetch_assoc($resultaNivel);
    
	
	
	$cuentaRepetidas=0;
	$llavenueva=$nivel.$anio.$grupo;
	$llaves= "SELECT  idGrupo FROM `ingles`.`grupo`";
	
	$buscandollaves = mysql_query($llaves,  $local);
	
	while ($row = mysql_fetch_array($buscandollaves)) 
              {  
			  
			  if($row['idGrupo']==$llavenueva){
				 $cuentaRepetidas=$cuentaRepetidas+1; 
			  }
	
			  }
	
	
			 
	$insertarGrupo = ("INSERT INTO `grupo`(`idGrupo`, `nombreGrupo`, `nivel_idnivel`, `profesor_matricula`,`estadoGrupo`)
					 VALUES (  
					  '".$nivel.$anio.$grupo."',
  					  '".$grupo."',
  					  '".$rowNivel['idnivel']."',
   					  '".$matricula."',
					  '"."Activo"."'
                      )"); 
					  



 

  
	
	if($cuentaRepetidas==0){
		
		
		
	$resultadoInsertarGrupo= mysql_query($insertarGrupo, $local) or die("Error al crear grupo:  ".mysql_error());
	#################### CODIGO PARA ASIGNAR LOS VALORES DE LO CHECKBOX ############################
  ## VARIABLE QUE ALMACEMA CADA UNO DE LOS DIAS
	$dia=""; 
	$lunes="Lunes";
	$martes="Martes";
	$miercoles="Miercoles";
	$jueves="Jueves";
	$viernes="Viernes";
	$sabado="Sabado";
   $arreInicio="";
   $arreFin="";
  ##RECORRE CADA UNO DE LOS NIVELES IMPARTIDOS
	$arreDias = $_POST['dia'];
	$arreInicio=$_POST['horaInicio'];
	$arreFin=$_POST['horaFin'];
	$arreInicio1=$_POST['horaInicio1'];
	$arreFin1=$_POST['horaFin1'];
	$arreInicio2=$_POST['horaInicio2'];
	$arreFin2=$_POST['horaFin2'];
	$arreInicio3=$_POST['horaInicio3'];
	$arreFin3=$_POST['horaFin3'];
	$arreInicio4=$_POST['horaInicio4'];
	$arreFin4=$_POST['horaFin4'];
	$arreInicio5=$_POST['horaInicio5'];
	$arreFin5=$_POST['horaFin5'];

	$inicio="";
	$fin="";
	
	if(empty($arreDias)){ 
    
	}
  	else
  	{
    	$N = count($arreDias);
	
    	for($i=0; $i < $N; $i++)
	    {
		$dia=$arreDias[$i];
	 
		  
		  if($dia=="Lunes"){
			  $inicio=$arreInicio[0];
			  $fin=$arreFin[0]; 
			   $agregarHorario=("INSERT INTO `dias`(`idDia`, `nombreDia`, `horaInicio`, `horaFin`, `grupo_idGrupo`)  VALUES  (
  					  'null',
					  '".$dia."',
  					  '".$inicio."',
   					  '".$fin."',
   					  '".$nivel.$anio.$grupo."'
					  )");

			   
			  $resultadoInsertarGrupoDias= mysql_query($agregarHorario, $local) or die("Error co el horario". mysql_error());	
		  }
		   if($dia=="Martes"){
			  $inicio=$arreInicio1[0];
			  $fin=$arreFin1[0];
			   $agregarHorario=("INSERT INTO `dias`(`idDia`, `nombreDia`, `horaInicio`, `horaFin`, `grupo_idGrupo`)  VALUES  (
  					  'null',
					  '".$dia."',
  					  '".$inicio."',
   					  '".$fin."',
   					  '".$nivel.$anio.$grupo."'
					  )");
					  
			   $resultadoInsertarGrupoDias= mysql_query($agregarHorario, $local) or die("Error co el horario". mysql_error());	
		   }
		    if($dia=="Miercoles"){
			  $inicio=$arreInicio2[0];
			  $fin=$arreFin2[0];
			  $agregarHorario=("INSERT INTO `dias`(`idDia`, `nombreDia`, `horaInicio`, `horaFin`, `grupo_idGrupo`)  VALUES  (
  					  'null',
					  '".$dia."',
  					  '".$inicio."',
   					  '".$fin."',
   					  '".$nivel.$anio.$grupo."'
					  )");

			   
			  $resultadoInsertarGrupoDias= mysql_query($agregarHorario, $local) or die("Error co el horario". mysql_error());	
		  }
		   if($dia=="Jueves"){
			  $inicio=$arreInicio3[0];
			  $fin=$arreFin3[0];
			  
			   $agregarHorario=("INSERT INTO `dias`(`idDia`, `nombreDia`, `horaInicio`, `horaFin`, `grupo_idGrupo`)  VALUES  (
  					  'null',
					  '".$dia."',
  					  '".$inicio."',
   					  '".$fin."',
   					  '".$nivel.$anio.$grupo."'
					  )");

			   
			  $resultadoInsertarGrupoDias= mysql_query($agregarHorario, $local) or die("Error co el horario". mysql_error());	
		  }
		   if($dia=="Viernes"){
			  $inicio=$arreInicio4[0];
			  $fin=$arreFin4[0];
			   $agregarHorario=("INSERT INTO `dias`(`idDia`, `nombreDia`, `horaInicio`, `horaFin`, `grupo_idGrupo`)  VALUES  (
  					  'null',
					  '".$dia."',
  					  '".$inicio."',
   					  '".$fin."',
   					  '".$nivel.$anio.$grupo."'
					  )");

			   
			  $resultadoInsertarGrupoDias= mysql_query($agregarHorario, $local) or die("Error co el horario". mysql_error());	
		  }
		   if($dia=="Sabado"){
			  $inicio=$arreInicio5[0];
			  $fin=$arreFin5[0];
			   $agregarHorario=("INSERT INTO `dias`(`idDia`, `nombreDia`, `horaInicio`, `horaFin`, `grupo_idGrupo`)  VALUES  (
  					  'null',
					  '".$dia."',
  					  '".$inicio."',
   					  '".$fin."',
   					  '".$nivel.$anio.$grupo."'
					  )");

			   
			  $resultadoInsertarGrupoDias= mysql_query($agregarHorario, $local) or die("Error co el horario". mysql_error());	
		  }
		   
 			
        
	    }
	}

	echo "<script type='text/javascript'> 
				alert('Operaci\u00F3n Exitosa'); 
				window.location='Inicio.php';</script>";	 
}else{
	echo "<script type='text/javascript'> 
				alert('Este grupo ya fue creado favor de introducir los datos de nuevo'); 
				window.location='Nuevo_Grupo.php';</script>";	
	
}


    

?>