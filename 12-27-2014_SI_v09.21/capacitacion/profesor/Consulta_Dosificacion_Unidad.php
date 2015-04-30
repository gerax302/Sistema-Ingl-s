<?php 
	session_start();
	require_once('../Connections/local.php');
	mysql_select_db($database_local, $local);
	$idGeneral="";
	$nombre="";
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
$unidad="";
$nombreUnidad="";
$objetivoAprendizaje="";
$contenidoTemasSubtemas="";
$estrategiasDidacticas="";
$estrategiasAprendizaje="";
$noHoras="";
$inicio="";
$termino="";
$evaluacion="";
$practicasVisitas="";
$recursosDidacticos="";
$fuentesInformacion="";

$i=0;


if(isset($_GET['idGeneral'])){
	$idGeneral=$_GET['idGeneral'];
}

$consultaBuscador3="select * from dosificaciongeneral where idDosificacionGeneral='".$idGeneral."'";

$res3=mysql_query($consultaBuscador3, $local);


while($row = @mysql_fetch_array($res3))
			{
				$i=$i+1;
			
				
				$asignatura=$row['asignatura'];
				
				
				
				
			}




if(isset($_GET['idUnidad'])){
	$idUnidad=$_GET['idUnidad'];
	
	$consultaBuscador="select * from dosificacionunidad where idDosificacionPorUnidad='".$idUnidad."'";

$res1=mysql_query($consultaBuscador, $local);


while($row = @mysql_fetch_array($res1))
			{
				$i=$i+1;
			
				
				$unidad=$row['unidad'];
				$nombreUnidad=$row['nombreUnidad'];
				$objetivoAprendizaje=$row['objetivoAprendizaje'];
				$contenidoTemasSubtemas=$row['contenidoTemasSubtemas'];
				$estrategiasDidacticas=$row['estrategiasDidacticas'];
				$estrategiasAprendizaje=$row['estrategiasAprendizaje'];
				$noHoras=$row['desarrolloNoHoras'];
				$inicio=$row['desarrolloInicio'];
				$termino=$row['desarrolloTermino'];
				$evaluacion=$row['evaluacion'];
				$practicasVisitas=$row['practicasVisitas'];
				$recursosDidacticos=$row['recursosDidacticos'];
				$fuentesInformacion=$row['fuentesInformacion'];
				
				
				
				
			}

	
}
if(isset($_GET['periodoInicio'])){
	$periodoInicio=$_GET['periodoInicio'];
	
}
if(isset($_GET['periodoFin'])){
	$periodoFin=$_GET['periodoFin'];
	
}
if(isset($_GET['anio'])){
	$anio=$_GET['anio'];
	
}

if($i==0){
$periodoInicio="";
$periodoFin="";
$anio="";
	
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
<link rel="stylesheet" href="../css/estiloMenuIzquierdo.css">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> 
<script src="file:///C|/xampp/htdocs/profesores/script.js"></script>
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

<body>
<section>
  <h2> <div align="center">Consulta Dosificación por Unidad</div></h2>
 <form method="post" name="form" action="Logica_Consulta_Dosificacion_Unidad.php?identificaClase=consultar&nombre=<?php echo $nombre;?>">
    <p>&nbsp;</p>
    <table width="583" border="0" align="center">
      <tr>
        <td width="162" colspan="1" align="center">Período</td>
        <td colspan="2" align="center">Año</td>
        <td width="113" align="center">Nivel</td>
        <td width="68" align="center">Grupo</td>
        <td width="68" align="center">Unidad</td>
      </tr>
      <tr>
        <td align="center"><select name="periodoBusqueda" id="periodoBusqueda"   onChange="Inhabilita()" ma>
             <option value="Rayitas" id="Rayitas2"> ------ </option>
             <option name="AgostoDiciembre" value="Agosto-Diciembre"  id="12"> Agosto - Diciembre </option>
             <option name="EneroJunio" value="Enero-Junio" id="22"> Enero - Junio</option>
            <option name="Verano" value="Verano" id="32" > Verano </option>
           </select></td>
        <td width="15">-</td>
        <td width="83"><input type="text" pattern="[0-9]{4}$" name="anio1" id="anio1"  size="10" maxlength="5" placeholder="Ej.2014" required /></td>
        <td align="center" valign="middle"><select name="asignatura1" id="asignatura1">
          <option name="Rayitas" value="Rayitas" > ------ </option>
          <option name="ingles I" value="ingles I" > Inglés I </option>
          <option name="ingles II" value="ingles II" > Inglés II </option>
          <option name="ingles III" value="ingles III"> Inglés III </option>
          <option name="ingles VI" value="ingles IV" > Inglés IV</option>
          <option name="ingles V" value="ingles V"> Inglés V </option>
          <option name="ingles VI" value="ingles VI"> Inglés VI </option>
          <option name="ce
rtificacion" value="certificacion"> Certificación </option>
        </select></td>
        
        <td align="center"><select name="grupo1" id="grupo1" >
  <option name="rayitas" id="rayas"> ------ </option>
  <option name="A" id="grupoA"> A </option>
  <option name="B" id="grupoB"> B </option>
  <option name="C" id="grupoC"> C </option>
  <option name="D" id="grupoD"> D </option>
  <option name="E" id="grupoE"> E </option>
</select>
        </td>
        
        <td align="center"><select name="unidad1" id="unidad1" >
          <option name="rayitas" id="rayas"> ------ </option>
          <option name="1" id="1322"> 1 </option>
          <option name="2" id="2322"> 2 </option>
          <option name="3" id="3322"> 3 </option>
          <option name="4" id="3322"> 4 </option>
          <option name="5" id="3322"> 5 </option>
          <option name="6" id="3322"> 6 </option>
          <option name="7" id="3322"> 7 </option>
          <option name="8" id="3322"> 8 </option>
        </select></td>
      </tr>
<tr>
        <td colspan="8"><p>&nbsp;</p>
        <p>
          <input type="submit" name="Consultar" id="Consultar" value="Consultar" />
        </p></td>
      </tr>
    </table>
    
    
    </form>
    <form method="post" name="form1" action="formato2/formatoUnidad.php?asignatura=<?php echo $asignatura ?>&nombre=<?php echo $nombre ?>">
    <p>&nbsp;</p>
    <table width="838" border="0" align="center">
      <tr>
        <td width="264" height="44" align="right">Unidad : </td>
        <td width="127"><input type="text"  name="unidad1" size="20" value="<?php echo $unidad;?>" readonly id="unidad1"></td>
        <td width="102" align="right">Nombre : </td>
        <td width="123"><input type="text"  name="nombre" size="20" value="<?php echo $nombreUnidad;?>" readonly id="nombre"></td>
        <td width="68" align="right">&nbsp;</td>
        <td width="128">&nbsp;</td>
      </tr>
      <tr>
        <td height="48" align="right">Objetivo de Aprendizaje:</td>
        <td height="48" colspan="5" valign="middle"><textarea class="area" cols="90" rows="2" name="objetivoAprendizaje"  required readonly><?php echo $objetivoAprendizaje;?></textarea></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <table width="770" border="0" align="center">
      <tr>
        <td width="270" align="center" valign="middle">Contenido (Temas y Subtemas)</td>
        <td width="219" align="center" valign="middle">Estrategias Didácticas</td>
        <td width="267" align="center" valign="middle">Estrategias de Aprendizaje</td>
      </tr>
      <tr>
        <td><textarea name="contenidoTemasSubtemas" class="area" cols="45" rows="15"required readonly> <?php echo $contenidoTemasSubtemas;?> </textarea></td>
        <td><textarea name="estrategiasDidacticas" class="area" cols="30" rows="15" required readonly> <?php echo $estrategiasDidacticas;?> </textarea></td>
        <td><textarea name="estrategiasDeAprendizaje" class="area" cols="45" rows="15" readonly required> <?php echo $estrategiasAprendizaje;?> </textarea></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <table width="759" border="0" align="center">
      <tr>
        <td height="33" colspan="6" align="center" valign="middle">Desarrollo de Unidad</td>
      </tr>
      <tr>
        <td width="181" height="40" align="center" valign="middle">No. Horas</td>
        <td width="54"><input type="text" pattern="[0-9]*$"  name="noHoras" value="<?php echo $noHoras;?>" readonly size="10" maxlength="10" required /></td>
        <td width="103" align="right" valign="middle">Inicio</td>
        <td width="106"><input type="text" pattern="[0-9]*$" name="inicio" value="<?php echo $inicio;?>" readonly size="25" maxlength="10" required id="inicio" /></td>
        <td width="147" align="right">Termino</td>
        <td width="128"><input type="text" pattern="[0-9]*$" name="termino" value="<?php echo $termino;?>" readonly size="25" maxlength="10" required id="termino" /></td>
      </tr>
      <tr>
        <td height="44" align="right" valign="middle">Evaluación:</td>
        <td colspan="5" valign="middle"><textarea class="area" cols="100" rows="2" name="evaluacion" required readonly > <?php echo $evaluacion;?> </textarea></td>
      </tr>
      <tr>
        <td height="47" align="right" valign="middle">Prácticas/Visitas:</td>
        <td colspan="5" valign="middle"><textarea class="area" cols="100" rows="2" name="practicasVisitas" required readonly> <?php echo $practicasVisitas;?> </textarea></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <table width="769" height="212" border="0" align="center">
      <tr>
        <td width="407" align="center">Recursos Didácticos</td>
        <td width="415" align="center">Fuentes de Información</td>
      </tr>
      <tr>
        <td align="center" valign="middle"><textarea  class="area" cols="60"rows="10" name="recursosDidacticos" required readonly> <?php echo $recursosDidacticos;?>
          </textarea></td>
        <td align="center" valign="middle"><textarea  class="area" cols="60" rows="10" name="fuentesDeInformacion" required readonly> <?php echo $fuentesInformacion;?>
          </textarea></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    
    
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

</script></section>
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