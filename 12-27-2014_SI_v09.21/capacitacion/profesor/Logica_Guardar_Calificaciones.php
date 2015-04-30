<?php 
require_once('../Connections/local.php'); 

$db_seleccionada = mysql_select_db($database_local, $local);

mysql_select_db("Ingles", $local);

mysql_select_db($database_local, $local);

$unidad="";
$arreImpartido="";
$grupo="";
$nivel="";
$grupillos="";


$noControl=$_POST['guardaControl'];
if(isset($_GET['unidad'])){
	$unidad=$_GET['unidad'];

}
if(isset($_GET['grupillos'])){
	$grupillos=$_GET['grupillos'];
	
	$nivel=substr($grupillos, 0, -1);

}
if(isset($_GET['grupo'])){
	$grupo=$_GET['grupo'];
	
	

}

//saber que es de primera o segunda
if(isset($_GET['tipoconsulta'])){
	if($_GET['tipoconsulta']=="alta1"){

$conta=0;
if($unidad==1){
	$arreImpartido = $_POST['guarda1'];
	
	$N = count($arreImpartido);
	$contaduria=1;
	$i=0;
	
	$consultaFechas="SELECT idCalificaciones from calificaciones";
		$res3=mysql_query($consultaFechas, $local);

		while($row = @mysql_fetch_array($res3))
			{
				 for($i=0; $i < $N; $i++)
	    {
			

                    if($row['idCalificaciones']==$noControl[$i].$grupo){
						$conta=$conta+1;
					}
		}
                       
                }


	   if($conta!=0){
		   for($i=0; $i < $N; $i++)
	    {
			
			if($arreImpartido[$i]==""){
		 $arreImpartido[$i]="NA";
		 }
		$insertarValor="Update Calificaciones set unidad1='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
	    }
		  
		   
	   }else if($conta==0){

	    //echo("Has seleccionado $N opciones: ");
    	for($i=0; $i < $N; $i++)
	    {
			
		
		 if($arreImpartido[$i]==""){
		 $arreImpartido[$i]="NA";
		 }
		 $insertarValor="INSERT INTO calificaciones 
		 (idCalificaciones,nivelAlumno, unidad1)  VALUES (
  		'".$noControl[$i].$grupo."',
		'".$nivel."',
		'".$arreImpartido[$i]."'
		)";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
	    }
	   }
		
}
if($unidad==2){
	
	$arreImpartido = $_POST['guarda2'];
	$N = count($arreImpartido);
	    //echo("Has seleccionado $N opciones: ");
		
		
    	for($i=0; $i < $N; $i++)
	    {
			
			if($arreImpartido[$i]==""){
		 $arreImpartido[$i]="NA";
		 }
		$insertarValor="Update Calificaciones set unidad2='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
	    }
}
if($unidad=="3"){
	
	$arreImpartido = $_POST['guarda3'];
	$N = count($arreImpartido);
	    //echo("Has seleccionado $N opciones: ");
		if($arreImpartido[$i]==""){
		 $arreImpartido[$i]="NA";
		 }
		
    	for($i=0; $i < $N; $i++)
	    {
		 
		 
		 
		 $insertarValor="Update Calificaciones set unidad3='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
		}
}
if($unidad=="4"){
	
	$arreImpartido = $_POST['guarda4'];
	$N = count($arreImpartido);
	    //echo("Has seleccionado $N opciones: ");
		if($arreImpartido[$i]==""){
		 $arreImpartido[$i]="NA";
		 }
    	for($i=0; $i < $N; $i++)
	    {
		 
		 $insertarValor="Update Calificaciones set unidad4='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
		}
}
if($unidad=="5"){
	
	$arreImpartido = $_POST['guarda5'];
	$N = count($arreImpartido);
	    //echo("Has seleccionado $N opciones: ");
    	for($i=0; $i < $N; $i++)
	    {
			if($arreImpartido[$i]==""){
		 $arreImpartido[$i]="NA";
		 }
		 
		 $insertarValor="Update Calificaciones set unidad5='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
		}
}
if($unidad=="6"){
	
	$arreImpartido = $_POST['guarda6'];
	$N = count($arreImpartido);
	    //echo("Has seleccionado $N opciones: ");
    	for($i=0; $i < $N; $i++)
	    {
		 if($arreImpartido[$i]==""){
		 $arreImpartido[$i]="NA";
		 }
		 
		 $insertarValor="Update Calificaciones set unidad6='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
		}
}
if($unidad=="7"){
	
	$arreImpartido = $_POST['guarda7'];
	$N = count($arreImpartido);
	    //echo("Has seleccionado $N opciones: ");
    	for($i=0; $i < $N; $i++)
	    {
			if($arreImpartido[$i]==""){
		 $arreImpartido[$i]="NA";
		 }
		 
		 $insertarValor="Update Calificaciones set unidad7='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
		}
}
if($unidad=="8"){
	
	$arreImpartido = $_POST['guarda8'];
	$N = count($arreImpartido);
	    //echo("Has seleccionado $N opciones: ");
    	for($i=0; $i < $N; $i++)
	    {
			if($arreImpartido[$i]==""){
		 $arreImpartido[$i]="NA";
		 }
		 
		 $insertarValor="Update Calificaciones set unidad8='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
		}
}
if($unidad=="9"){
	
	$arreImpartido = $_POST['guarda9'];
	$N = count($arreImpartido);
	    //echo("Has seleccionado $N opciones: ");
    	for($i=0; $i < $N; $i++)
	    {
			if($arreImpartido[$i]==""){
		 $arreImpartido[$i]="NA";
		 }
		 
		 $insertarValor="Update Calificaciones set unidad9='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
		}
}
if($unidad=="10"){
	
	$arreImpartido = $_POST['guarda10'];
	$N = count($arreImpartido);
	    //echo("Has seleccionado $N opciones: ");
    	for($i=0; $i < $N; $i++)
	    {
			if($arreImpartido[$i]==""){
		 $arreImpartido[$i]="NA";
		 }
		 
		 $insertarValor="Update Calificaciones set unidad10='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
		}
}

echo "<script type='text/javascript'>  
  alert('Las calificaciones se han guardado');
	window.location='Alta_Calificaciones1.php?idgr=$grupo&grupillos=$grupillos';</script>";
	}
	if($_GET['tipoconsulta']=="alta2"){
    
	$i=0;
		
	$arreImpartido = $_POST['guarda1'];
	
	$N = count($arreImpartido);
	
	
	
		   for($i=0; $i < $N; $i++)
	    {
			
			if($arreImpartido[$i]==""){
		 $arreImpartido[$i]="NA";
		 }
		$insertarValor="Update Calificaciones set unidad1='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
	    }
		  
		   	
	$arreImpartido = $_POST['guarda2'];
	$N = count($arreImpartido);
	    //echo("Has seleccionado $N opciones: ");
		
		
    	for($i=0; $i < $N; $i++)
	    {
			
		if($arreImpartido[$i]==""){
		 $arreImpartido[$i]="NA";
		 }
		$insertarValor="Update Calificaciones set unidad2='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
	    }

	
	$arreImpartido = $_POST['guarda3'];
	$N = count($arreImpartido);
	    //echo("Has seleccionado $N opciones: ");
		
		
    	for($i=0; $i < $N; $i++)
	    {
			
		if($arreImpartido[$i]==""){
		 $arreImpartido[$i]="NA";
		 }
		$insertarValor="Update Calificaciones set unidad3='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
	    }

	
	$arreImpartido = $_POST['guarda4'];
	$N = count($arreImpartido);
	    //echo("Has seleccionado $N opciones: ");
		
		
    	for($i=0; $i < $N; $i++)
	    {
			
		if($arreImpartido[$i]==""){
		 $arreImpartido[$i]="NA";
		 }
		$insertarValor="Update Calificaciones set unidad4='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
	    }


	
	$arreImpartido = $_POST['guarda5'];
	$N = count($arreImpartido);
	    //echo("Has seleccionado $N opciones: ");
    	for($i=0; $i < $N; $i++)
	    {
			if($arreImpartido[$i]==""){
		 $arreImpartido[$i]="NA";
		 }
		 
		 $insertarValor="Update Calificaciones set unidad5='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
		}

	
	$arreImpartido = $_POST['guarda6'];
	$N = count($arreImpartido);
	    //echo("Has seleccionado $N opciones: ");
    	for($i=0; $i < $N; $i++)
	    {
		 if($arreImpartido[$i]==""){
		 $arreImpartido[$i]="NA";
		 }
		 
		 $insertarValor="Update Calificaciones set unidad6='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
		}

	
	$arreImpartido = $_POST['guarda7'];
	$N = count($arreImpartido);
	    //echo("Has seleccionado $N opciones: ");
    	for($i=0; $i < $N; $i++)
	    {
			if($arreImpartido[$i]==""){
		 $arreImpartido[$i]="NA";
		 }
		 
		 $insertarValor="Update Calificaciones set unidad7='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
		}

	
	$arreImpartido = $_POST['guarda8'];
	$N = count($arreImpartido);
	    //echo("Has seleccionado $N opciones: ");
    	for($i=0; $i < $N; $i++)
	    {
			if($arreImpartido[$i]==""){
		 $arreImpartido[$i]="NA";
		 }
		 
		 $insertarValor="Update Calificaciones set unidad8='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
		}


	
	$arreImpartido = $_POST['guarda9'];
	$N = count($arreImpartido);
	    //echo("Has seleccionado $N opciones: ");
    	for($i=0; $i < $N; $i++)
	    {
			if($arreImpartido[$i]==""){
		 //$arreImpartido[$i]="NA";
		 }
		 
		 $insertarValor="Update Calificaciones set unidad9='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
		}


	
	$arreImpartido = $_POST['guarda10'];
	$N = count($arreImpartido);
	    //echo("Has seleccionado $N opciones: ");
    	for($i=0; $i < $N; $i++)
	    {
			if($arreImpartido[$i]==""){
		 //$arreImpartido[$i]="NA";
		 }
		 
		 $insertarValor="Update Calificaciones set unidad10='".$arreImpartido[$i]."'
		 where idCalificaciones='".$noControl[$i].$grupo."'";
		  //$impartidos = $impartidos." ".$arreImpartido[$i];
		  
		 mysql_query($insertarValor, $local) or die(mysql_error());
		}
				
		
echo "<script type='text/javascript'>  
  alert('Las calificaciones se han guardado');
	window.location='Alta_Calificaciones2.php?idgr=$grupo&grupillos=$grupillos';</script>";
	}
}

?>