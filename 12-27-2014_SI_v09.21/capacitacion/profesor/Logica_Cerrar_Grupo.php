<?php 
require_once('../Connections/local.php'); 

$db_seleccionada = mysql_select_db($database_local, $local);

mysql_select_db("Ingles", $local);

mysql_select_db($database_local, $local);

 $grupillos="";
 $idnivel="";
 $cantidadNiveles=0;
 $cantidadNivelesInactivos=0;
 
if(isset($_GET['grupillo'])){
	
	 $grupillos=trim($_GET['grupillo']);
}


	$insertarValor="Update grupo set estadoGrupo='"."Inactivo"."'
		 where idGrupo='".$grupillos."'";
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
		
		//consultar el nivel
	$consulta="select * from grupo where idGrupo ='".$grupillos."'";

$res=mysql_query($consulta, $local);


while($row = @mysql_fetch_array($res))
			{ 
		 		$idnivel=$row['nivel_idnivel'];	
			}
			
			
			
			
			
			//consultar los grupos de ese nivel
			$consultaNiveles="select * from grupo where nivel_idnivel ='".$idnivel."'";
			$res1=mysql_query($consultaNiveles, $local);
			while($row = @mysql_fetch_array($res1))
			{ 
		 		$cantidadNiveles=$cantidadNiveles+1;	
			}
			
			//consultar los grupos de ese nivel que esten inactivos
			$consultaNivelesInactivos="select * from grupo where nivel_idnivel ='".$idnivel."' and estadoGrupo='Inactivo'";
			$res2=mysql_query($consultaNivelesInactivos, $local);
			while($row = @mysql_fetch_array($res2))
			{ 
		 		$cantidadNivelesInactivos=$cantidadNivelesInactivos+1;	
			}
			
			
			
			if($cantidadNivelesInactivos==$cantidadNiveles){
					$insertarValorNivel="Update nivel set estadoNivel='"."Inactivo"."'
		 where idnivel='".$idnivel."'";
		  
		 mysql_query($insertarValorNivel, $local) or die(mysql_error());
				
			}
			
				echo "<script type='text/javascript'>  
	window.location='Inicio.php';</script>";
			
			


?>