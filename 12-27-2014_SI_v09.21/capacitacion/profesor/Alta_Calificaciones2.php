<?php 
	session_start();
	
	function interval_date($init,$finish){
    //formateamos las fechas a segundos tipo 1374998435
    $diferencia = strtotime($finish) - strtotime($init);
 
    //comprobamos el tiempo que ha pasado en segundos entre las dos fechas
    //floor devuelve el número entero anterior, si es 5.7 devuelve 5
   
        
        $tiempo = floor($diferencia/86400)*(-1);
    
    
    return $tiempo;

    }
	
	
	require_once('../Connections/local.php');
	mysql_select_db($database_local, $local);
	     $fecha="";
		
		$i=0;
	    $fecha= date ("Y-m-d");
		$edita1="";
		$edita2="";
		$edita3="";
		$edita4="";
		$edita5="";
		$edita6="";
		$edita7="";
		$edita8="";
		$edita9="";
		$edita10="";

		$guarda1="";
		$guarda2="";
		$guarda3="";
		$guarda4="";
		$guarda5="";
		$guarda6="";
		$guarda7="";
		$guarda8="";
		
		$fecha1Inicio="";
		$fecha1Fin="";
		$fecha2Inicio="";
		$fecha2Fin="";
		$fecha3Inicio="";
		$fecha3Fin="";
		$fecha4Inicio="";
		$fecha4Fin="";
		$fecha5Inicio="";
		$fecha5Fin="";
		$fecha6Inicio="";
		$fecha6Fin="";
		$fecha7Inicio="";
		$fecha7Fin="";
		$fecha8Inicio="";
		$fecha8Fin="";
		$fecha9Inicio="";
		$fecha9Fin="";
		$fecha10Inicio="";
		$fecha10Fin="";
		
		$grupillos="";
		$nivelado="";
		
		$parametro="";
		$guardaControl="";
		
		$idGrupo="";
		$agarraId="";
		if(isset($_GET['grupillos'])){
	  		$grupillos=$_GET['grupillos'];
	  	}
		
	if (isset($_SESSION["sesion"])){
		$matricula = ($_SESSION['sesion']);
	
		$consulta="select nombre,apellidoPaterno,apellidoMaterno from Profesor where matricula ='".$matricula."'";
		$respuestaNombre=mysql_query($consulta,$local);
		$row=mysql_fetch_array($respuestaNombre);
		$nombre=$row['nombre'].$row['apellidoPaterno'].$row['apellidoMaterno'];	
		$fechaMenor=1000000;
		$unidadAyuda="";
		$consultaFechas="select * from dosificacionunidad where  grupo='".$grupillos."'";
		$res3=mysql_query($consultaFechas, $local);

		while($row = @mysql_fetch_array($res3))
			{
				$i=$i+1;
				
				//echo $i;
		//tomar los valores de las fechas de inicio y fin de cada unidad 		
		if($row['unidad']=="1"){
		$fecha1Inicio=$row['desarrolloInicio'];
		$fecha1Fin=$row['desarrolloTermino'];
		}
		if($row['unidad']=="2"){
		$fecha2Inicio=$row['desarrolloInicio'];
		$fecha2Fin=$row['desarrolloTermino'];
		}
		if($row['unidad']=="3"){
		$fecha3Inicio=$row['desarrolloInicio'];
		$fecha3Fin=$row['desarrolloTermino'];
		}
		if($row['unidad']=="4"){
		$fecha4Inicio=$row['desarrolloInicio'];
		$fecha4Fin=$row['desarrolloTermino'];
		}
		if($row['unidad']=="5"){
		$fecha5Inicio=$row['desarrolloInicio'];
		$fecha5Fin=$row['desarrolloTermino'];
		}
		if($row['unidad']=="6"){
		$fecha6Inicio=$row['desarrolloInicio'];
		$fecha6Fin=$row['desarrolloTermino'];
		}
		if($row['unidad']=="7"){
		$fecha7Inicio=$row['desarrolloInicio'];
		$fecha7Fin=$row['desarrolloTermino'];
		}
		if($row['unidad']=="8"){
		$fecha8Inicio=$row['desarrolloInicio'];
		$fecha8Fin=$row['desarrolloTermino'];
		}
		if($row['unidad']=="9"){
		$fecha9Inicio=$row['desarrolloInicio'];
		$fecha9Fin=$row['desarrolloTermino'];
		}
		if($row['unidad']=="10"){
		$fecha10Inicio=$row['desarrolloInicio'];
		$fecha10Fin=$row['desarrolloTermino'];
		}
		
		//comparar las fechas para saber que unidad esta vigente
		
		if(interval_date($row['desarrolloTermino'], $fecha)<=$fechaMenor &&  interval_date($row['desarrolloTermino'], $fecha)>=0){
		$fechaMenor= interval_date($row['desarrolloTermino'], $fecha);
		$unidadAyuda=$row['unidad'];
		}
		
			}
			
		
		
			
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style type="text/css">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-color: #FFFFFF;
	margin: 0;
	padding: 0;
	color: #000;
}
ul, ol, dl {
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;
	padding-right: 15px;
	padding-left: 15px;
	text-align: center;
}
a img {
	border: none;
}
a:link {
	color: #FFFFFF;
	text-decoration: underline;
}
a:visited {
	color: #6E6C64;
	text-decoration: underline;
}
a:hover, a:active, a:focus {
	text-decoration: none;
}
.container {
	width: 960px;
	background-color: #FFFFFF;
	margin: 0 auto;
}
header {
	background-color: #003300;
}
.sidebar1 {
	float: left;
	width: 180px;
	background-color: #FFFFFF;
	padding-bottom: 10px;
}
.content {
	padding: 10px 0;
	width: 780px;
	float: right;
}
.content ul, .content ol {
	padding: 0 15px 15px 40px;
}
ul.nav {
	list-style: none; /* esto elimina el marcador de lista */
	border-top: 1px solid #666;
	margin-bottom: 15px;
}
ul.nav li {
	border-bottom: 1px solid #666; /* esto crea la separación de los botones  */
}
ul.nav a, ul.nav a:visited {
	padding: 5px 5px 5px 15px;
	display: block;
	width: 160px;
	text-decoration: none;
	background-color: #003300;
}
ul.nav a:hover, ul.nav a:active, ul.nav a:focus {
	background-color: #000000;
	color: #FFF;
}
/* ~~ El pie de página ~~ */
footer {
	padding: 0px 0;
	background-color: #003300;
	position: relative;/* esto da a IE6 el parámetro hasLayout para borrar correctamente */
	clear: both;
}
header, section, footer, aside, article, figure {
	display: block;
}
.poi {
	color: #F00;
}
-->
</style>

<style>
span.tab{
    padding: 0 -80px; /* Or desired space*/
}
span.tab1{
    padding: 0 10px; /* Or desired space*/
}

</style>
</head>
<style>
textarea.area
{
resize:none;
}

.letrasfechas {
	font-size: 16%;
}
.letrasfechas {
	font-size: 36%;
}
.letrasfechas {
	font-size: 70%;
}
</style>

<body>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/estiloMenuIzquierdo.css">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> 
<script src="../profesores/script.js"></script>
<header>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</header>
<div class="sidebar1"> 
  <!--Inicio Menu izq -->
	<div id='cssmenu'>
		<ul>
			<li><a href='Inicio.php'><span>Inicio</span></a></li>
			<li><a href='DosificacionFormaGeneral.php'><span>Gestión del Curso</span></a></li>
			<li class='has-sub'><a href='#'><span>Ingresar Calificaciones</span></a>
				<ul>
					<li class='has'><a href='Alta_Calificaciones1.php'>Primera Oportunidad </a>
					</li>
					<li class='has'><a href='Alta_Calificaciones2.php'>Segunda Oportunidad </a>
					</li>
				</ul>      
			</li>

			<li class='has-sub'><a href='#'><span>Consultas</span></a>
				<ul>
					<li class='has'><a href='Consulta_Dosificacion.php'>Dosificación General</a>
					</li>
					<li class='has'><a href='Consulta_Dosificacion_Unidad.php'>Dosificación por Unidad</a>
					</li>
					<li class='has'><a href='Consulta_Calificaciones.php'>Calificaciones</a></li>
				</ul>      
			</li>

			<li class='has-sub'><a href='#'><span>Modificar</span></a>
				<ul>
					<li class='has'><a href='Modificar_Dosificacion.php'>Dosificación General</a>
					</li>
					<li class='has'><a href='Modificar_Dosificacion_Unidad.php'>Dosificación por Unidad</a>
					</li>
				</ul>      
			</li>
			<li class='last'><a href='#'><span>Ayuda</span></a></li>
			<li class='last'><a href='Salir.php'><span>Salir</span></a></li>
		</ul>
	</div>
  <!--Fin Menu izq --> 
  <!-- end .sidebar1 --></div>
<h1> <div align="center">Sistema Integral de Inglés</div></h1>
</head>
<body>
<section>
  <h2> <div align="center">Ingresar Calificaciones de Segunda Oportunidad</div></h2>
 <form method="post" name="form" action="Logica_Alta_Calificaciones1.php?tipoconsulta=alta2">
    <p>&nbsp;</p>
    
    
    <table align="center">
       <tr valign="baseline">
        <td colspan="1" align="center">&nbsp;</td>
       <td colspan="1" align="center">&nbsp;</td>
       <td colspan="2" align="center">Buscar por grupo</td>
       
       <td colspan="1" align="center">&nbsp;</td>
       
        
      </tr>
<tr valign="baseline">
<td colspan="2" >&nbsp;</td>

<td colspan="2" align="center">
<select name="grupos" id="grupos1" onChange="asignaId()" >
<option name="Rayitas" value="Rayitas" > ------ </option>
<?php
$valorIndex="";
        $buscarNivel= "SELECT * from  nivel,grupo where  grupo.profesor_matricula='".$matricula."' and nivel.idnivel=grupo.nivel_idnivel and nivel.estadoNivel='Activo'";
	
	$buscandoNiveles = mysql_query($buscarNivel,  $local);
	$nivelSeleccionado="";

	
	$i=1;
	while($row = mysql_fetch_array($buscandoNiveles))
	{
		
		
	?>
        
        <option value="<?php echo $row['idGrupo'];?>" id="<?php echo $row['nivelIngles'].$row['nombreGrupo'];?>">
                <?php echo $row['nivelIngles']."  ".$row['nombreGrupo'];?>
     
        <?php
		$i=$i+1;
	}
	
		?>
</select>
</td>

<td colspan="2" >&nbsp;</td>
      </tr>
        
        </tr>
<tr valign="baseline">
<td colspan="10" align="center" >
<p>&nbsp;</p>
 
	<input type="submit" name="Consultar" id="Consultar" value="Consultar" />
    
   
</td>

</tr>
<tr valign="baseline">
<td colspan="10" align="center" >
<input type="text" name="grp" id="gr" value="" hidden>
<input type="text" name="nivgr" id="nivgr" value="" hidden>
        </td>


        </td>

</tr>
    </table>
    
    <?php 
	
	
	if(isset($_GET['idgr'])){
	$agarraId=$_GET['idgr'];
	$parametro=$_GET['idgr'];
	?>
    
    </form>
     <form method="post" name="form1" action="Logica_Guardar_Calificaciones.php?unidad=<?php echo $unidadAyuda; ?>
     &grupo=<?php echo $agarraId;?>&nivel=<?php echo $nivelado;?>&grupillos=<?php echo $grupillos;?>&tipoconsulta=alta2">
    <p>&nbsp;</p>
     <div class="CSSTableGenerator" align="center" >
    <table align="center" width="70%" border="1" cellspacing="1" cellpadding="1">
    <tr>
    <td align="center">No.Control</td>
    <td align="center">Nombre    </td>
    <td align="center" onClick="aplazaTiempo()">Unidad 1&nbsp;</td>  
    <td align="center">Unidad 2&nbsp;</td>
    <td align="center">Unidad 3&nbsp;</td> 
    <td align="center">Unidad 4&nbsp;</td>
    <td align="center">Unidad 5&nbsp;</td>  
    <td align="center" >Unidad 6&nbsp;</td>  
    <td align="center">Unidad 7&nbsp;</td>
    <td align="center">Unidad 8&nbsp;</td> 
    <td align="center">Unidad 9&nbsp;</td>
    <td align="center">Unidad 10&nbsp;</td>        
     </tr>
    
     <?php
	 $buscar="";
	 $buscando="";
	 $variableIdNivel="";
	 $noControl="";
	 
	 $numA=0;
	 $numB=0;
	 $numC=0;
	 $numD=0;
	 $numE=0;
	 $numF=0;
	
    $buscar= "SELECT * from  alumno where alumno.idGrupo='".$agarraId."'";
	$buscando = mysql_query($buscar,  $local);

	$i=1;
	while($row = mysql_fetch_array($buscando))
	{
     $noControl=$row["NoControl"];
     ?>
      <tr>
     <td align="center"><input type="text" align="middle" name="guardaControl[]" id="<?php echo "a".$i;?>"
     value="<?php echo $noControl; ?>"  size="11" readonly></td>
    <td align="center"><input type="text" align="middle" name="eti2" id="<?php echo "b".$i;?>"
     value="<?php echo $row["nombre"]." ".$row["apellidoPaterno"]." ".$row["apellidoMaterno"]; ?>" readonly></td>
    <?php
	$calificacion="";
    $consultaCali="select unidad1 from calificaciones where idCalificaciones='".$noControl.$agarraId."' and unidad1='NA'";
		$respuestaCali=mysql_query($consultaCali,$local);
		$row=mysql_fetch_array($respuestaCali);
		$calificacion=$row['unidad1'];
		if($calificacion==""){
			 $consultaCali="select unidad1 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali=mysql_query($consultaCali,$local);
		$row=mysql_fetch_array($respuestaCali);
		$calificacion=$row['unidad1'];
			
		}

    ?>
    <td align="center" ><input type="text" align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda1[]" id="<?php echo "c".$i;?>"
     placeholder="NA" value="<?php echo $calificacion;?>" size="9" <?php echo $edita1;?>></td>
     <?php
	$calificacion2="";
    $consultaCali2="select unidad2 from calificaciones where idCalificaciones='".$noControl.$agarraId."'and unidad2='NA'";
		$respuestaCali2=mysql_query($consultaCali2,$local);
		$row=mysql_fetch_array($respuestaCali2);
		$calificacion2=$row['unidad2'];	
		if($calificacion2==""){
			$consultaCali2="select unidad2 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali2=mysql_query($consultaCali2,$local);
		$row=mysql_fetch_array($respuestaCali2);
		$calificacion2=$row['unidad2'];	
		}
    ?>
     
    <td align="center"><input type="text"  align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda2[]" id="<?php echo "d".$i;?>"
     placeholder="NA" value="<?php echo $calificacion2;?>" size="9"  <?php echo $edita2;?>></td> 
   
   <?php
	$calificacion3="";
    $consultaCali3="select unidad3 from calificaciones where idCalificaciones='".$noControl.$agarraId."'and unidad3='NA'";
		$respuestaCali3=mysql_query($consultaCali3,$local);
		$row=mysql_fetch_array($respuestaCali3);
		$calificacion3=$row['unidad3'];	
		if($calificacion3==""){
			 $consultaCali3="select unidad3 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali3=mysql_query($consultaCali3,$local);
		$row=mysql_fetch_array($respuestaCali3);
		$calificacion3=$row['unidad3'];	
		}
    ?>
    <td align="center"><input type="text" align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda3[]" id="<?php echo "e".$i;?>"
    placeholder="NA" value="<?php echo $calificacion3;?>" size="9" <?php echo $edita3;?>> </td>
    
    <?php
	$calificacion4="";
    $consultaCali4="select unidad4 from calificaciones where idCalificaciones='".$noControl.$agarraId."'and unidad4='NA'";
		$respuestaCali4=mysql_query($consultaCali4,$local);
		$row=mysql_fetch_array($respuestaCali4);
		$calificacion4=$row['unidad4'];	
		if($calificacion4==""){
			 $consultaCali4="select unidad4 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali4=mysql_query($consultaCali4,$local);
		$row=mysql_fetch_array($respuestaCali4);
		$calificacion4=$row['unidad4'];	
		}
    ?>
    
     <td align="center"><input type="text" align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda4[]" id="<?php echo "c".$i;?>"
     placeholder="NA" value="<?php echo $calificacion4;?>" size="9" <?php echo $edita4;?> ></td>
    <?php
	$calificacion5="";
    $consultaCali5="select unidad5 from calificaciones where idCalificaciones='".$noControl.$agarraId."'and unidad5='NA'";
		$respuestaCali5=mysql_query($consultaCali5,$local);
		$row=mysql_fetch_array($respuestaCali5);
		$calificacion5=$row['unidad5'];	
		if($calificacion5==""){
			 $consultaCali5="select unidad5 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali5=mysql_query($consultaCali5,$local);
		$row=mysql_fetch_array($respuestaCali5);
		$calificacion5=$row['unidad5'];	
		}
    ?>
    
    <td align="center"><input type="text" align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda5[]" id="<?php echo "d".$i;?>"
     placeholder="NA" value="<?php echo $calificacion5;?>" size="9" <?php echo $edita5;?>></td> 
   <?php
	$calificacion6="";
    $consultaCali6="select unidad6 from calificaciones where idCalificaciones='".$noControl.$agarraId."'and unidad6='NA'";
		$respuestaCali6=mysql_query($consultaCali6,$local);
		$row=mysql_fetch_array($respuestaCali6);
		$calificacion6=$row['unidad6'];	
		if($calificacion6==""){
			$consultaCali6="select unidad6 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali6=mysql_query($consultaCali6,$local);
		$row=mysql_fetch_array($respuestaCali6);
		$calificacion6=$row['unidad6'];	
		}
    ?>
   
    <td align="center"><input type="text" align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda6[]" id="<?php echo "e".$i;?>"
     placeholder="NA" value="<?php echo $calificacion6;?>" size="9" <?php echo $edita6;?> > </td>
   <?php
	$calificacion7="";
    $consultaCali7="select unidad7 from calificaciones where idCalificaciones='".$noControl.$agarraId."'and unidad7='NA'";
		$respuestaCali7=mysql_query($consultaCali7,$local);
		$row=mysql_fetch_array($respuestaCali7);
		$calificacion7=$row['unidad7'];	
		if($calificacion7==""){
			 $consultaCali7="select unidad7 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali7=mysql_query($consultaCali7,$local);
		$row=mysql_fetch_array($respuestaCali7);
		$calificacion7=$row['unidad7'];	
		}
    ?>
   
   <td align="center"><input type="text" align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda7[]" id="<?php echo "c".$i;?>"
     placeholder="NA" value="<?php echo $calificacion7;?>"  size="9"  <?php echo $edita7;?>></td>
   <?php
	$calificacion8="";
    $consultaCali8="select unidad8 from calificaciones where idCalificaciones='".$noControl.$agarraId."'and unidad8='NA'";
		$respuestaCali8=mysql_query($consultaCali8,$local);
		$row=mysql_fetch_array($respuestaCali8);
		$calificacion8=$row['unidad8'];	
		if($calificacion8==""){
			  $consultaCali8="select unidad8 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali8=mysql_query($consultaCali8,$local);
		$row=mysql_fetch_array($respuestaCali8);
		$calificacion8=$row['unidad8'];	
		}
    ?>
   
    <td align="center"><input type="text" align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda8[]" id="<?php echo "d".$i;?>"
     placeholder="NA" value="<?php echo $calificacion8;?>"  size="9"  <?php echo $edita8;?>></td> 
   <?php
	$calificacion9="";
    $consultaCali9="select unidad9 from calificaciones where idCalificaciones='".$noControl.$agarraId."'and unidad9='NA'";
		$respuestaCali9=mysql_query($consultaCali9,$local);
		$row=mysql_fetch_array($respuestaCali9);
		$calificacion9=$row['unidad9'];	
		if($calificacion9==""){
			 $consultaCali9="select unidad9 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali9=mysql_query($consultaCali9,$local);
		$row=mysql_fetch_array($respuestaCali9);
		$calificacion9=$row['unidad9'];	
		}
    ?>
   
   
    <td align="center"><input type="text" align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda9[]" id="<?php echo "e".$i;?>"
     placeholder="NA" value="<?php echo $calificacion9;?>"  size="9"  <?php echo $edita9;?>> </td>
    
    <?php
	$calificacion10="";
    $consultaCali10="select unidad10 from calificaciones where idCalificaciones='".$noControl.$agarraId."'and unidad10='NA'";
		$respuestaCali10=mysql_query($consultaCali10,$local);
		$row=mysql_fetch_array($respuestaCali10);
		$calificacion10=$row['unidad10'];	
		if($calificacion10==""){
			$consultaCali10="select unidad10 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali10=mysql_query($consultaCali10,$local);
		$row=mysql_fetch_array($respuestaCali10);
		$calificacion10=$row['unidad10'];	
		}
		
    ?>
    
     <td align="center"><input type="text" align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda10[]" id="<?php echo "e".$i;?>"
     placeholder="NA" value="<?php echo $calificacion10;?>" size="9"  <?php echo $edita10;?>> </td>
	
		<?php
	}
	
	?>
     <?php
	 $buscar="";
	 $buscando="";
	 $variableIdNivel="";
	 $noControl="";
	 
	 $numA=0;
	 $numB=0;
	 $numC=0;
	 $numD=0;
	 $numE=0;
	 $numF=0;
	
    $buscar= "SELECT * from  reinscripcion where reinscripcion.idGrupo='".$agarraId."'";
	$buscando = mysql_query($buscar,  $local);

	$i=1;
	while($row = mysql_fetch_array($buscando))
	{
     $noControl=$row["NoControl"];
     ?>
      <tr>
     <td align="center"><input type="text" align="middle" name="guardaControl[]" id="<?php echo "a".$i;?>"
     value="<?php echo $noControl; ?>"  size="11" readonly></td>
    <td align="center"><input type="text" align="middle" name="eti2" id="<?php echo "b".$i;?>"
     value="<?php echo $row["nombre"]." ".$row["apellidoPaterno"]." ".$row["apellidoMaterno"]; ?>" readonly></td>
   <?php
	$calificacion="";
    $consultaCali="select unidad1 from calificaciones where idCalificaciones='".$noControl.$agarraId."' and unidad1='NA'";
		$respuestaCali=mysql_query($consultaCali,$local);
		$row=mysql_fetch_array($respuestaCali);
		$calificacion=$row['unidad1'];
		if($calificacion==""){
			 $consultaCali="select unidad1 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali=mysql_query($consultaCali,$local);
		$row=mysql_fetch_array($respuestaCali);
		$calificacion=$row['unidad1'];
			
		}

    ?>
    <td align="center" ><input type="text" align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda1[]" id="<?php echo "c".$i;?>"
     placeholder="NA" value="<?php echo $calificacion;?>" size="9" <?php echo $edita1;?>></td>
     <?php
	$calificacion2="";
    $consultaCali2="select unidad2 from calificaciones where idCalificaciones='".$noControl.$agarraId."'and unidad2='NA'";
		$respuestaCali2=mysql_query($consultaCali2,$local);
		$row=mysql_fetch_array($respuestaCali2);
		$calificacion2=$row['unidad2'];	
		if($calificacion2==""){
			$consultaCali2="select unidad2 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali2=mysql_query($consultaCali2,$local);
		$row=mysql_fetch_array($respuestaCali2);
		$calificacion2=$row['unidad2'];	
		}
    ?>
     
    <td align="center"><input type="text"  align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda2[]" id="<?php echo "d".$i;?>"
     placeholder="NA" value="<?php echo $calificacion2;?>" size="9"  <?php echo $edita2;?>></td> 
   
   <?php
	$calificacion3="";
    $consultaCali3="select unidad3 from calificaciones where idCalificaciones='".$noControl.$agarraId."'and unidad3='NA'";
		$respuestaCali3=mysql_query($consultaCali3,$local);
		$row=mysql_fetch_array($respuestaCali3);
		$calificacion3=$row['unidad3'];	
		if($calificacion3==""){
			 $consultaCali3="select unidad3 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali3=mysql_query($consultaCali3,$local);
		$row=mysql_fetch_array($respuestaCali3);
		$calificacion3=$row['unidad3'];	
		}
    ?>
    <td align="center"><input type="text" align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda3[]" id="<?php echo "e".$i;?>"
    placeholder="NA" value="<?php echo $calificacion3;?>" size="9" <?php echo $edita3;?>> </td>
    
    <?php
	$calificacion4="";
    $consultaCali4="select unidad4 from calificaciones where idCalificaciones='".$noControl.$agarraId."'and unidad4='NA'";
		$respuestaCali4=mysql_query($consultaCali4,$local);
		$row=mysql_fetch_array($respuestaCali4);
		$calificacion4=$row['unidad4'];	
		if($calificacion4==""){
			 $consultaCali4="select unidad4 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali4=mysql_query($consultaCali4,$local);
		$row=mysql_fetch_array($respuestaCali4);
		$calificacion4=$row['unidad4'];	
		}
    ?>
    
     <td align="center"><input type="text" align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda4[]" id="<?php echo "c".$i;?>"
     placeholder="NA" value="<?php echo $calificacion4;?>" size="9" <?php echo $edita4;?> ></td>
    <?php
	$calificacion5="";
    $consultaCali5="select unidad5 from calificaciones where idCalificaciones='".$noControl.$agarraId."'and unidad5='NA'";
		$respuestaCali5=mysql_query($consultaCali5,$local);
		$row=mysql_fetch_array($respuestaCali5);
		$calificacion5=$row['unidad5'];	
		if($calificacion5==""){
			 $consultaCali5="select unidad5 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali5=mysql_query($consultaCali5,$local);
		$row=mysql_fetch_array($respuestaCali5);
		$calificacion5=$row['unidad5'];	
		}
    ?>
    
    <td align="center"><input type="text" align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda5[]" id="<?php echo "d".$i;?>"
     placeholder="NA" value="<?php echo $calificacion5;?>" size="9" <?php echo $edita5;?>></td> 
   <?php
	$calificacion6="";
    $consultaCali6="select unidad6 from calificaciones where idCalificaciones='".$noControl.$agarraId."'and unidad6='NA'";
		$respuestaCali6=mysql_query($consultaCali6,$local);
		$row=mysql_fetch_array($respuestaCali6);
		$calificacion6=$row['unidad6'];	
		if($calificacion6==""){
			$consultaCali6="select unidad6 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali6=mysql_query($consultaCali6,$local);
		$row=mysql_fetch_array($respuestaCali6);
		$calificacion6=$row['unidad6'];	
		}
    ?>
   
    <td align="center"><input type="text" align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda6[]" id="<?php echo "e".$i;?>"
     placeholder="NA" value="<?php echo $calificacion6;?>" size="9" <?php echo $edita6;?> > </td>
   <?php
	$calificacion7="";
    $consultaCali7="select unidad7 from calificaciones where idCalificaciones='".$noControl.$agarraId."'and unidad7='NA'";
		$respuestaCali7=mysql_query($consultaCali7,$local);
		$row=mysql_fetch_array($respuestaCali7);
		$calificacion7=$row['unidad7'];	
		if($calificacion7==""){
			 $consultaCali7="select unidad7 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali7=mysql_query($consultaCali7,$local);
		$row=mysql_fetch_array($respuestaCali7);
		$calificacion7=$row['unidad7'];	
		}
    ?>
   
   <td align="center"><input type="text" align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda7[]" id="<?php echo "c".$i;?>"
     placeholder="NA" value="<?php echo $calificacion7;?>"  size="9"  <?php echo $edita7;?>></td>
   <?php
	$calificacion8="";
    $consultaCali8="select unidad8 from calificaciones where idCalificaciones='".$noControl.$agarraId."'and unidad8='NA'";
		$respuestaCali8=mysql_query($consultaCali8,$local);
		$row=mysql_fetch_array($respuestaCali8);
		$calificacion8=$row['unidad8'];	
		if($calificacion8==""){
			  $consultaCali8="select unidad8 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali8=mysql_query($consultaCali8,$local);
		$row=mysql_fetch_array($respuestaCali8);
		$calificacion8=$row['unidad8'];	
		}
    ?>
   
    <td align="center"><input type="text" align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda8[]" id="<?php echo "d".$i;?>"
     placeholder="NA" value="<?php echo $calificacion8;?>"  size="9"  <?php echo $edita8;?>></td> 
   <?php
	$calificacion9="";
    $consultaCali9="select unidad9 from calificaciones where idCalificaciones='".$noControl.$agarraId."'and unidad9='NA'";
		$respuestaCali9=mysql_query($consultaCali9,$local);
		$row=mysql_fetch_array($respuestaCali9);
		$calificacion9=$row['unidad9'];	
		if($calificacion9==""){
			 $consultaCali9="select unidad9 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali9=mysql_query($consultaCali9,$local);
		$row=mysql_fetch_array($respuestaCali9);
		$calificacion9=$row['unidad9'];	
		}
    ?>
   
   
    <td align="center"><input type="text" align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda9[]" id="<?php echo "e".$i;?>"
     placeholder="NA" value="<?php echo $calificacion9;?>"  size="9"  <?php echo $edita9;?>> </td>
    
    <?php
	$calificacion10="";
    $consultaCali10="select unidad10 from calificaciones where idCalificaciones='".$noControl.$agarraId."'and unidad10='NA'";
		$respuestaCali10=mysql_query($consultaCali10,$local);
		$row=mysql_fetch_array($respuestaCali10);
		$calificacion10=$row['unidad10'];	
		if($calificacion10==""){
			$consultaCali10="select unidad10 from calificaciones where idCalificaciones='".$noControl.$agarraId."'";
		$respuestaCali10=mysql_query($consultaCali10,$local);
		$row=mysql_fetch_array($respuestaCali10);
		$calificacion10=$row['unidad10'];	
		}
		
    ?>
    
     <td align="center"><input type="text" align="middle" pattern="[[N][A]|[7-9][0-9]||[1][0-0][0]$" name="guarda10[]" id="<?php echo "e".$i;?>"
     placeholder="NA" value="<?php echo $calificacion10;?>" size="9"  <?php echo $edita10;?>> </td>
	
		<?php
	
	}
	
	
	?>
    
    <?php 
	}
	?>
    
     
     
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        
              
    <table align="center">
      <tr valign="baseline">
     
    </tr>
    </table>
    </div>

    <table width="200" border="0" align="center">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td></td>
       <td>&nbsp;</td>
      <td>&nbsp;</td>
     <td align="center"><input type="submit" value="Guardar" name="Guardar" > </td>
      <td >&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><a href="Logica_Cerrar_Grupo.php?grupillo=<?php echo $parametro;?>"><input type="button" value="Cerrar Grupo" name="Cerrar"></a></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
     <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
  </table>
        
        
 </form>
 <script type="text/javascript">
function asignaId()
{
document.getElementById('gr').value=document.getElementById('grupos1').value;
document.getElementById('nivgr').value=document.getElementById('grupos1').options[document.getElementById('grupos1').selectedIndex].id;


}

function guardaGrupo()
{
	

}


</script>

 
</section>
<footer>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</footer>
</body>
</html>

<?php
}
else
{
	echo("<script type='text/javascript'> 
		  alert('No existe ninguna sesi\u00F3n abierta, favor de AUTENTIFICARSE'); 
	  	window.location='Salir.php';</script>");	
}
?>