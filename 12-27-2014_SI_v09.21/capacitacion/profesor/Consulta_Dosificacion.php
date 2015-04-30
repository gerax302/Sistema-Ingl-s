<?php 
	session_start();
	require_once('../Connections/local.php');
	mysql_select_db($database_local, $local);
	if (isset($_SESSION["sesion"]))
	{
		
		$matricula=$_SESSION["sesion"];
		
			$consulta="select * from Profesor where matricula ='".$matricula."'";

$res=mysql_query($consulta, $local);


while($row = @mysql_fetch_array($res))
			{
		$nombre=$row['nombre']."  ".$row['apellidoPaterno']."  ".$row['apellidoMaterno'];
		
			}
?>

<?php 
include('local.php'); 
$db_seleccionada = mysql_select_db($database_local, $local);

mysql_select_db("Ingles", $local);





$periodoInicio="";
$periodoFin="";
$anio="";
$responsable="";
$codigoDosificacion="";
$revision="";
$fechaDosificacion="";
$asignatura="";
$horasTeoricas="";
$horasPracticas="";
$creditos="";
$grupo="";
$objetivoCurso="";
$aportacionCurso="";
$temaAnterior="";
$temaPosterior="";
$asignaturaAnterior="";
$asignaturaPosterior="";

$i=0;


if(isset($_GET['idGeneral'])){
	$idGeneral=$_GET['idGeneral'];
	
	//echo $idGeneral;
	
	$consultaBuscador="select * from dosificaciongeneral where idDosificacionGeneral='".$idGeneral."'";

$res1=mysql_query($consultaBuscador, $local);


while($row = @mysql_fetch_array($res1))
			{
				$i=$i+1;
			
				
				$responsable=$row['responsable'];
				$codigoDosificacion=$row['codigoDosificacion'];
				$revision=$row['revision'];
				$fechaDosificacion=$row['fechaDosificacion'];
				$asignatura=$row['asignatura'];
				$horasTeoricas=$row['horasTeoricas'];
				$horasPracticas=$row['horasPracticas'];
				$creditos=$row['creditos'];
				$grupo=$row['grupo'];
				$objetivoCurso=$row['objetivoCurso'];
				$aportacionCurso=$row['aportacionCurso'];
				$temaAnterior=$row['temaAnterior'];
				$temaPosterior=$row['temaPosterior'];
				$asignaturaAnterior=$row['asignaturaAnterior'];
				$asignaturaPosterior=$row['asignaturaPosterior'];
				
				
				
				
			}

	
}
if(isset($_GET['periodoBusqueda'])=="AgostoDiciembre"){
	$periodoInicio="Agosto";
$periodoFin="Diciembre";
}
if(isset($_GET['anio'])){
	$anio=$_GET['anio'];
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
  <h2> <div align="center">Consulta Dosificación General</div></h2>
 <form method="post" name="form" action="Logica_Consulta_Dosificacion.php?identificaClase=consultar&nombre=<?php echo $nombre ?>">
    <p>&nbsp;</p>
    
    
    <table align="center">
       <tr valign="baseline">
        <td colspan="1" align="center">
        Período 
        </td>
       <td colspan="1" align="center">
       Año 
       </td>
       <td colspan="2" align="center">
        Nivel
       </td>
       
       <td colspan="1" align="center">
       <span class="tab">Grupo</span>
       </td>
       
        
      </tr>
<tr valign="baseline">
<td colspan="2" >
           <select name="periodoBusqueda" id="periodoBusqueda"   onChange="Inhabilita()" ma>
             <option value="Rayitas" id="Rayitas2"> ------ </option>
             <option name="Agosto-Diciembre" value="Agosto-Diciembre"  id="12"> Agosto - Diciembre </option>
             <option name="Enero-Junio" value="EneroJunio" id="22"> Enero - Junio</option>
             <option name="Verano" value="Verano" id="32" > Verano </option>
           </select>
 - 
<input type="text" pattern="[0-9]{4}$" name="anio1" id="anio1"  size="10" maxlength="4" placeholder="Ej.2014" required /></td>

<td colspan="2" >
<select name="asignatura1" id="nivel1">
<option name="Rayitas" value="Rayitas" > ------ </option>
<option name="ingles I" value="ingles I" > Inglés I </option>
<option name="ingles II" value="ingles II" > Inglés II </option>
<option name="ingles III" value="ingles III"> Inglés III </option>
<option name="ingles VI" value="ingles IV" > Inglés IV</option>
<option name="ingles V" value="ingles V"> Inglés V </option>
<option name="ingles VI" value="ingles VI"> Inglés VI </option>
<option name="ce
rtificacion" value="certificacion"> Certificación </option>
</select>
</td>

<td colspan="2" ><select name="grupo1" id="grupo1" >
  <option name="rayitas" id="rayas"> ------ </option>
  <option name="A" id="grupoA"> A </option>
  <option name="B" id="grupoB"> B </option>
  <option name="C" id="grupoC"> C </option>
  <option name="D" id="grupoD"> D </option>
  <option name="E" id="grupoE"> E </option>
</select></td>
      </tr>
        
        </tr>
<tr valign="baseline">
<td colspan="10" align="center" >
<p>&nbsp;</p>

	<input type="submit" name="Consultar" id="Consultar" value="Consultar" />

   <!-- <input type="button" name="Consultar" value="Consultar" align="center" onClick="guardaValores()">-->
   
</td>
</tr>
        
    </table>
    
    </form>
     <form method="post" name="form1" action="formato1/formatoGeneral.php">
    <p>&nbsp;</p>
    <table align="center">
      <tr valign="baseline">
        <td colspan="5" align="left">
         Código :
           <input type="text"  name="codigo" size="20" value="<?php echo $codigoDosificacion;?>" readonly>
         Revisión :
         <input type="text"  name="revision" size="20" value="<?php echo $revision;?>" readonly>
         Fecha :
         <input type="text"  name="fecha" size="20" value="<?php echo $fechaDosificacion;?>" readonly>
        </td>
        </tr>
        <tr valign="baseline">
        <td colspan="5" align="left">
         Responsable :
         <input type="text"  name="responsable" size="20" value="<?php echo $responsable?>" readonly>
        </td>
        </tr>
        </table>

        <p>&nbsp;</p>
        
    <table align="center">
        <tr valign="baseline">
        <td colspan="5" align="left">
         Asignatura :
         <input type="text"  name="asignatura" size="14" value="<?php echo $asignatura;?>" readonly>
         HT :
         <input type="text"  name="horasTrabajo" size="14" value="<?php echo $horasTeoricas;?>" readonly>
          HP :
         <input type="text"  name="horasPracticas" size="14" value="<?php echo $horasPracticas;?>" readonly>
         C :
         <input type="text"  name="creditos" size="13" value="<?php echo $creditos;?>" readonly>
        </td>
        </tr>
        </table>
        
        <table align="center">
        <tr valign="baseline">
        <td colspan="5" align="left">
         Período :
           <input type="text"  name="periodoInicio" size="17" value="<?php echo $periodoInicio?>" readonly>
         -
         <input type="text"  name="periodoFin" size="17" value="<?php echo $periodoFin?>" readonly>
         -
         <input type="text"  name="anio" size="14" value="<?php echo $anio?>" readonly>
         Grupo :
         <input type="text"  name="grupo" size="13" value="<?php echo $grupo;?>" readonly>
        </td>
        </tr>
        </table>
        
    <table align="center">
        <tr valign="baseline">
        <td align="right" valign="middle" nowrap="nowrap">Objetivo del Curso:</td>
        <td colspan="5" align="left">
         
            <textarea class="area" cols="83" rows="5" name="objetivoDelCurso" readonly > <?php echo $objetivoCurso;?>
</textarea>
         
        </td>
        </tr>
        </table>
        
    <table align="center">
        <tr valign="baseline">
        <td align="left" valign="middle" nowrap="nowrap"><p>Aportación del Curso </p>
          <p>al Perfil Profesional:</p></td>
        <td colspan="5" align="left">
         
            <textarea class="area" cols="79" rows="5" name="perfilProfesional" readonly> <?php echo $aportacionCurso;?>
</textarea>
         
        </td>
        </tr>
        </table>
        
    <table align="center">
        
        <td align="left" valign="middle" nowrap="nowrap">
          <td colspan="3" align="center" valign="middle" nowrap="nowrap">Relación con otras asignaturas:</td>
    <tr valign="baseline">
          <td colspan="2" nowrap="nowrap" align="center">Temas: </td>
          <td width="228" align="center">Asignatura:</td>
         
        </tr>      
        
        <tr valign="baseline">
          <td width="108" align="right" nowrap="nowrap">Anteriores </td>
          <td width="181" align="center"><input type="text" name="temaAnterior" id="temaAnterior" value="<?php echo $temaAnterior;?>" readonly></td>
          <td align="center">
<input type="text" name="asignaturaAnterior" value="<?php echo $asignaturaAnterior;?>" readonly>
</td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Posteriores</td>
          <td align="center">
          <input type="text" name="temaPosterior" value="<?php echo $temaPosterior;?>" readonly>
</td>
          <td align="center">
<input type="text" name="asignaturaPosterior" value="<?php echo $asignaturaPosterior;?>" readonly>
</td>
        </tr>
         
        </tr>
        
 
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        
              
    <table align="center">
      <tr valign="baseline">
     
    </tr>
    </table>

    <table width="200" border="0" align="center">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td> <input name="Guardar" type="submit" value="Imprimir" ></td>
      <td>&nbsp;</td>
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
function Inhabilita()
{

if(document.getElementById('periodoInicio1').value=="Agosto" && document.getElementById('periodoFin1').value!="Diciembre" && document.getElementById('periodoFin1').value!="Rayitas"){
	alert('No puedes seleccionar este periodo');
	

}
if(document.getElementById('periodoInicio1').value=="Enero" && document.getElementById('periodoFin1').value!="Junio" && document.getElementById('periodoFin1').value!="Rayitas"){
	alert('No puedes seleccionar este periodo');
	

}


if(document.getElementById('periodoInicio1').value=="Verano" && document.getElementById('periodoFin1').value!="Julio" && document.getElementById('periodoFin1').value!="Rayitas"){
   alert('No puedes seleccionar este periodo');
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