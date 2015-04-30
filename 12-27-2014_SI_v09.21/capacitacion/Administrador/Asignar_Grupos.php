<?php 
	session_start();
	require_once('../Connections/local.php');
	mysql_select_db($database_local, $local);
	$nivel="";
	$variableIdNivel="";
	$periodo="";
	$anio="";
	$numeroTotal="";
	$tabla1=0;
	$tabla2=0;
	if (isset($_SESSION["sesion"]))
	{
		$nombre = ($_SESSION['sesion']);
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
			<li class='has-sub'><a href='#'><span>Profesores</span></a>
				<ul>
					<li class='has'><a href='Alta_Profesor.php'><span>Alta</span></a> </li>
					<li class='has'><a href='Modificar_Profesor.php'><span>Modificar</span></a> </li>
					<li class='has'><a href='Consulta_Profesor.php'><span>Consultar</span></a> </li>
				</ul>
			</li>
			<li><a href='Nuevo_Nivel.php'>
				<span>Nuevo Nivel</span></a></li>
			<li class='has-sub'><a href='#'><span>Grupos</span></a>
				<ul>
					<li class='has'><a href='Nuevo_Grupo.php'><span>Nuevo</span></a> </li>
					<li class='has'><a href='Asignar_Grupos.php'><span>Asignar</span></a> </li>
					<li class='has'><a href='Modificar_Grupo.php'><span>Modificar</span></a> 
					<li class='has'><a href='Consultar_Grupo.php'><span>Consultar</span></a> 
					</li>
				</ul>
			<li class='last'><a href='#'><span>Ayuda</span></a></li>						
			<li class='last'><a href='../index.php'><span>Salir</span></a></li>
		</ul>
	</div>
  <!--Fin Menu izq --> 
  <!-- end .sidebar1 --></div>
<h1> <div align="center">Sistema Integral de Inglés</div></h1>

<body>
<section>
  <h2> <div align="center">Asignar Grupo</div></h2>
 <form method="post" name="form" action="Logica_Asignar_Grupo.php">
    <p>&nbsp;</p>
    
    
    <table align="center">
       <tr valign="baseline">
        <td colspan="1" align="center">&nbsp;</td>
       <td colspan="1" align="center">&nbsp;</td>
       <td colspan="2" align="center">Buscar por nivel</td>
       
       <td colspan="1" align="center">&nbsp;</td>
       
        
      </tr>
<tr valign="baseline">
<td colspan="2" >&nbsp;</td>

<td colspan="2" align="center">
<select name="niveles" id="niveles" >
<option name="Rayitas" value="Rayitas" > ------ </option>
<?php
$valorIndex="";
        $buscarNivel= "SELECT * from  nivel";
	
	$buscandoNiveles = mysql_query($buscarNivel,  $local);
	$nivelSeleccionado="";

	
	$i=1;
	while($row = mysql_fetch_array($buscandoNiveles))
	{
		if($row['nivelIngles']=="Ingles I"){
		      	$nivelSeleccionado="Inglés I";
				$valorIndex="Ingles I";
			
        }
		if($row['nivelIngles']=="Ingles II"){
		      	$nivelSeleccionado="Inglés II";
				$valorIndex="Ingles II";
        }
		if($row['nivelIngles']=="Ingles III"){
		      	$nivelSeleccionado="Inglés III";
				$valorIndex="Ingles III";
        }
		if($row['nivelIngles']=="Ingles IV"){
		      	$nivelSeleccionado="Inglés IV";	
				$valorIndex="Ingles IV";
        }
		if($row['nivelIngles']=="Ingles V"){
		      	$nivelSeleccionado="Inglés V";
				$valorIndex="Ingles V";
        }
		if($row['nivelIngles']=="Ingles VI"){
		      	$nivelSeleccionado="Inglés VI";
				$valorIndex="Ingles VI";
        }
		if($row['nivelIngles']=="Certificacion"){
		      	$nivelSeleccionado="Certificación";
				$valorIndex="Certificacion";
        }
		
	
	?>
        
        <option value="<?php echo $valorIndex;?>" id="<?php echo $valorIndex;?>">
                <?php echo $nivelSeleccionado; ?>
     
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
        
    </table>
    
    </form>
     <form method="post" name="form1" action="Guardar_Alumno_Grupo.php?idNivel=<?php echo  $_GET['idNivel']; ?>">
    <p>&nbsp;</p>
     <div class="CSSTableGenerator" >
    <table align="center" width="70%" border="1" cellspacing="1" cellpadding="1">
    <tr>
    <td align="center">No.Control</td>
    <td align="center">Nombre    </td>
    <td align="center">Apellido Paterno</td>
    <td align="center">Apellido Materno</td> 
    <td align="center">Nivel </td>
    <td align="center">Grupo</td> 
    <td align="center">Asignar Grupo</td>      
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
	 if(isset($_GET['idNivel'])){
		 $variableIdNivel=$_GET['idNivel'];
    $buscar= "SELECT * from  alumno,nivel where alumno.idnivel='".$_GET['idNivel']."' and alumno.idGrupo='vacio'  and alumno.idnivel=nivel.idnivel";
	$buscando = mysql_query($buscar,  $local);
	 
	
	$nivelSeleccionado="";

	
	$i=1;
	while($row = mysql_fetch_array($buscando))
	{
     $noControl=$row["NoControl"];
	 $tabla1=$tabla1+1;
     ?>
      <tr>
     <td align="center"><input type="text" name="eti1" id="<?php echo "a".$i;?>"
     value="<?php echo $noControl; ?>" readonly></td>
    <td align="center"><input type="text" name="eti2" id="<?php echo "b".$i;?>"
     value="<?php echo $row["nombre"]; ?>" readonly></td>
    <td align="center"><input type="text" name="eti3" id="<?php echo "c".$i;?>"
     value="<?php echo $row["apellidoPaterno"]; ?>" readonly></td>
    <td align="center"><input type="text" name="eti4" id="<?php echo "d".$i;?>"
     value="<?php echo $row["apellidoMaterno"]; ?>" readonly></td> 
    <td align="center"><input type="text" name="eti5" id="<?php echo "e".$i;?>"
     value="<?php echo $row["nivelIngles"];?>" readonly> </td>
    <td align="center"><select name="grupos" id="grupos" onChange="asignaId()">
<option name="Rayitas" value="Rayitas" id="def" > ------ </option>
<?php
	




        $buscarNivel= "SELECT  * from  grupo where nivel_idnivel='".$_GET['idNivel']."'";
	
	$buscandoNiveles = mysql_query($buscarNivel,  $local);
	$nivelSeleccionado="";

	

	while($row = mysql_fetch_array($buscandoNiveles))
	{
		if($row['nombreGrupo']=="A"){
		      	$nivelSeleccionado="A";
				$numA=$row['numAlumnos'];
        }
		if($row['nombreGrupo']=="B"){
		      	$nivelSeleccionado="B";
				$numB=$row['numAlumnos'];
        }
		if($row['nombreGrupo']=="C"){
		      	$nivelSeleccionado="C";
				$numC=$row['numAlumnos'];
        }
		if($row['nombreGrupo']=="D"){
		      	$nivelSeleccionado="D";
				$numD=$row['numAlumnos'];
        }
		if($row['nombreGrupo']=="E"){
		      	$nivelSeleccionado="E";
				$numE=$row['numAlumnos'];
        }
		if($row['nombreGrupo']=="F"){
		      	$nivelSeleccionado="F";
			    $numF=$row['numAlumnos'];
        }
		
		
		
		
	?>
        
        <option value="<?php echo $nivelSeleccionado;?>" id="<?php echo $i;?>">
                <?php echo $nivelSeleccionado; ?>
     
        <?php
		$i=$i+1;
		
	}
	
		?>
</select> </td> 
<td align="center"><input name="Guardar" type="submit" value="Guardar" ></td> </td>  
       </tr>
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
		 $variableIdNivel=$_GET['idNivel'];
    $buscar= "SELECT * from  reinscripcion,nivel where reinscripcion.idnivel='".$_GET['idNivel']."' and reinscripcion.idGrupo='vacio'  and reinscripcion.idnivel=nivel.idnivel";
	$buscando = mysql_query($buscar,  $local);
	 
	
	$nivelSeleccionado="";

	
	$i=1;
	while($row = mysql_fetch_array($buscando))
	{
		 $tabla2=$tabla2+1;
		
     $noControl=$row["NoControl"];
     ?>
      <tr>
     <td align="center"><input type="text" name="eti1" id="<?php echo "a".$i;?>"
     value="<?php echo $noControl; ?>" readonly></td>
    <td align="center"><input type="text" name="eti2" id="<?php echo "b".$i;?>"
     value="<?php echo $row["nombre"]; ?>" readonly></td>
    <td align="center"><input type="text" name="eti3" id="<?php echo "c".$i;?>"
     value="<?php echo $row["apellidoPaterno"]; ?>" readonly></td>
    <td align="center"><input type="text" name="eti4" id="<?php echo "d".$i;?>"
     value="<?php echo $row["apellidoMaterno"]; ?>" readonly></td> 
    <td align="center"><input type="text" name="eti5" id="<?php echo "e".$i;?>"
     value="<?php echo $row["nivelIngles"];?>" readonly> </td>
    <td align="center"><select name="grupos" id="grupos" onChange="asignaId()">
<option name="Rayitas" value="Rayitas" id="def" > ------ </option>
<?php
	




        $buscarNivel= "SELECT  * from  grupo where nivel_idnivel='".$_GET['idNivel']."'";
	
	$buscandoNiveles = mysql_query($buscarNivel,  $local);
	$nivelSeleccionado="";

	

	while($row = mysql_fetch_array($buscandoNiveles))
	{
		if($row['nombreGrupo']=="A"){
		      	$nivelSeleccionado="A";
				$numA=$row['numAlumnos'];
        }
		if($row['nombreGrupo']=="B"){
		      	$nivelSeleccionado="B";
				$numB=$row['numAlumnos'];
        }
		if($row['nombreGrupo']=="C"){
		      	$nivelSeleccionado="C";
				$numC=$row['numAlumnos'];
        }
		if($row['nombreGrupo']=="D"){
		      	$nivelSeleccionado="D";
				$numD=$row['numAlumnos'];
        }
		if($row['nombreGrupo']=="E"){
		      	$nivelSeleccionado="E";
				$numE=$row['numAlumnos'];
        }
		if($row['nombreGrupo']=="F"){
		      	$nivelSeleccionado="F";
			    $numF=$row['numAlumnos'];
        }
		
		
		
		
	?>
        
        <option value="<?php echo $nivelSeleccionado;?>" id="<?php echo $i;?>">
                <?php echo $nivelSeleccionado; ?>
     
        <?php
		$i=$i+1;
		
	}
	
		?>
</select> </td> 
<td align="center"><input name="Guardar" type="submit" value="Guardar" ></td> </td>  
       </tr>
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
      <td><input type="text" name="numAlumno1" id="NA" value="<?php echo $numA;?>" hidden></td>
      <td><input type="text" name="numAlumno2" id="NB" value="<?php echo $numB;?>" hidden></td>
      <td><input type="text" name="numAlumno3" id="NC" value="<?php echo $numC;?>" hidden></td>
      <td><input type="text" name="numAlumno4" id="ND" value="<?php echo $numD;?>" hidden></td>
      <td><input type="text" name="numAlumno5" id="NE" value="<?php echo $numE;?>" hidden></td>
      <td><input type="text" name="numAlumno6" id="NF" value="<?php echo $numF;?>" hidden> </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="text" name="trampaNumAlumnos" id="numTotal" value="<?php echo $totalAlumnos;?>" hidden></td>
      <td><input type="text" name="trampaControl" id="control" hidden></td>
      
      <td><input type="text" name="trampa" id="t1" hidden></td>
      <td><input type="text" value="<?php echo $variableIdNivel;?>" name="caja1" id="c1" hidden></td>
      <td><input type="text" value="<?php echo $tabla1;?>" name="tabla1" id="c1" hidden></td>
      <td><input type="text" value="<?php echo $tabla2;?>" name="tabla2" id="c1" hidden></td>
    </tr>
    
  </table>
        
        
 </form>
 <script type="text/javascript">
function asignaId()
{
	
document.getElementById('t1').value=document.getElementById('grupos').value;
document.getElementById('control').value=document.getElementById('a1').value;


if(document.getElementById('grupos').value=="A"){
	
	if(document.getElementById('NA').value==document.getElementById('numTotal').value){
		alert("Este grupo esta lleno"); 
		window.location='Inicio.php';
		
		document.getElementById('1').disabled=true;
		document.getElementById('def').selected=true;
	}
}
if(document.getElementById('grupos').value=="B"){
	if(document.getElementById('NB').value==document.getElementById('numTotal').value){
		alert("Este grupo esta lleno");
		document.getElementById('2').disabled=true;
		document.getElementById('def').selected=true;
	}

}
if(document.getElementById('grupos').value=="C"){
	if(document.getElementById('NC').value==document.getElementById('numTotal').value){
		alert("Este grupo esta lleno");
		document.getElementById('3').disabled=true;
		document.getElementById('def').selected=true;
	}

}
if(document.getElementById('grupos').value=="D"){
	if(document.getElementById('ND').value==document.getElementById('numTotal').value){
		alert("Este grupo esta lleno");
		document.getElementById('4').disabled=true;
		document.getElementById('def').selected=true;
	}

}
if(document.getElementById('grupos').value=="E"){
	if(document.getElementById('ND').value==document.getElementById('numTotal').value){
		alert("Este grupo esta lleno");
		document.getElementById('5').disabled=true;
		document.getElementById('def').selected=true;
	}

}
if(document.getElementById('grupos').value=="F"){
	if(document.getElementById('NF').value==document.getElementById('numTotal').value){
		alert("Este grupo esta lleno");
		document.getElementById('6').disabled=true;
		document.getElementById('def').selected=true;
	}

}

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