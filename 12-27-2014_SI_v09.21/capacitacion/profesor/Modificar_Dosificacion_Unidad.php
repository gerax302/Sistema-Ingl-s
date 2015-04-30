<?php 
	session_start();
	require_once('../Connections/local.php');
	mysql_select_db($database_local, $local);
	if (isset($_SESSION["sesion"]))
	{
		//CREAR VARIABLE DE SESIÓN
        $matricula = ($_SESSION['sesion']);
		//OBTENER EL NOMBRE DEL USUARIO
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


$unidad1="";
$unidad2="";
$unidad3="";
$unidad4="";
$unidad5="";
$unidad6="";
$unidad7="";
$unidad8="";


$i=0;


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
if(isset($_GET['periodoBusqueda'])){
	$periodoBusqueda=$_GET['periodoBusqueda'];
}
	
if(isset($_GET['anio'])){
	$anio=$_GET['anio'];
	
}

if($i==0){
$periodoInicio="";
$periodoFin="";
$anio="";
	
}

if($unidad=="1"){
	$unidad1="selected";
}
if($unidad=="2"){
	$unidad2="selected";
}
if($unidad=="3"){
	$unidad3="selected";
}
if($unidad=="4"){
	$unidad4="selected";
}
if($unidad=="5"){
	$unidad5="selected";
}
if($unidad=="6"){
	$unidad6="selected";
}
if($unidad=="7"){
	$unidad7="selected";
}
if($unidad=="8"){
	$unidad8="selected";
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
</head>
<body>
<section>
  <h2> <div align="center">Modificar Dosificación por Unidad</div></h2>
 <form method="post" name="form" action="Logica_Consulta_Dosificacion_Unidad.php?identificaClase=modificar&nombre=<?php echo $nombre;?>">
    <p>&nbsp;</p>
    <table width="535" border="0" align="center">
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
           </select> </td>
        <td width="15">-</td>
        <td width="83"><input type="text" pattern="[0-9]{4}$" name="anio1" id="anio1"  size="10" maxlength="5" placeholder="Ej.2014" required /></td>
        <td align="center" valign="middle"><select name="asignatura1" id="asignatura1">
          <option name="Rayitas" value="Rayitas" > ------ </option>
          <option name="ingles I" value="Ingles I" > Inglés I </option>
          <option name="ingles II" value="Ingles II" > Inglés II </option>
          <option name="ingles III" value="Ingles III"> Inglés III </option>
          <option name="ingles VI" value="Ingles IV" > Inglés IV</option>
          <option name="ingles V" value="Ingles V"> Inglés V </option>
          <option name="ingles VI" value="Ingles VI"> Inglés VI </option>
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
    
    
    
    
    <form method="post" name="form" action="Logica_Modificar_Dosificacion_Unidad.php?id=<?php echo $idUnidad; ?>">
    <p>&nbsp;</p>
    <table width="838" border="0" align="center">
      <tr>
        <td width="264" height="44" align="right">Unidad : </td>
        <td width="127"><select name="unidad" id="unidad" >
          <option name="rayitas" id="rayas"> ------ </option>
          <option name="1" value="1" <?php echo $unidad1;?> id="13222"> 1 </option>
          <option name="2" value="2" <?php echo $unidad2;?> id="23222"> 2 </option>
          <option name="3" value="3" <?php echo $unidad3;?> id="33222"> 3 </option>
          <option name="4" value="4" <?php echo $unidad4;?> id="33222"> 4 </option>
          <option name="5" value="5" <?php echo $unidad5;?> id="33222"> 5 </option>
          <option name="6"  value="6" <?php echo $unidad6;?> id="33222"> 6 </option>
          <option name="7" value="7" <?php echo $unidad7;?> id="33222"> 7 </option>
          <option name="8" value="8" <?php echo $unidad8;?> id="33222"> 8 </option>
        </select></td>
        <td width="102" align="right">Nombre : </td>
        <td width="123"><input type="text"  name="nombre" size="20" value="<?php echo $nombreUnidad;?>" id="nombre" required></td>
        <td width="68" align="right">&nbsp;</td>
        <td width="128">&nbsp;</td>
      </tr>
      <tr>
        <td height="48" align="right">Objetivo de Aprendizaje:</td>
        <td height="48" colspan="5" valign="middle"><textarea class="area" cols="90" rows="2" name="objetivoAprendizaje"  required><?php echo $objetivoAprendizaje;?></textarea></td>
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
        <td><textarea name="contenidoTemasSubtemas" class="area" cols="45" rows="15" required> <?php echo $contenidoTemasSubtemas;?> </textarea></td>
        <td><textarea name="estrategiasDidacticas" class="area" cols="30" rows="15" required> <?php echo $estrategiasDidacticas;?> </textarea></td>
        <td><textarea name="estrategiasDeAprendizaje" class="area" cols="45" rows="15" required > <?php echo $estrategiasAprendizaje;?> </textarea></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <table width="759" border="0" align="center">
      <tr>
        <td height="33" colspan="6" align="center" valign="middle">Desarrollo de Unidad</td>
      </tr>
      <tr>
        <td width="181" height="40" align="center" valign="middle">No. Horas</td>
        <td width="54"><input type="text" pattern="[0-9]*$" name="noHoras" value="<?php echo $noHoras;?>" size="10" maxlength="3" required/></td>
        <td width="103" align="right" valign="middle">Inicio</td>
        <td width="106"><input type="text"  name="inicio" value="<?php echo $inicio;?>" size="25" maxlength="10"  id="inicio" readonly>
        <input type="date" name="fechaInicio1" id="fechaInicio" onChange="cambiaFecha()"></td>
        <td width="147" align="right">Termino</td>
        <td width="128"><input type="text" name="termino" value="<?php echo $termino;?>" size="25" maxlength="10"  id="termino" readonly>
        <input type="date" name="fechaTermino" id="fechaTermino" onChange="cambiaFecha()"></td>
      </tr>
      <tr>
        <td height="44" align="right" valign="middle">Evaluación:</td>
        <td colspan="5" valign="middle"><textarea class="area" cols="100" rows="2" name="evaluacion"   required > <?php echo $evaluacion;?> </textarea></td>
      </tr>
      <tr>
        <td height="47" align="right" valign="middle">Prácticas/Visitas:</td>
        <td colspan="5" valign="middle"><textarea class="area" cols="100" rows="2" name="practicasVisitas" required > <?php echo $practicasVisitas;?> </textarea></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <table width="769" height="212" border="0" align="center">
      <tr>
        <td width="407" align="center">Recursos Didácticos</td>
        <td width="415" align="center">Fuentes de Información</td>
      </tr>
      <tr>
        <td align="center" valign="middle"><textarea  class="area" cols="60"rows="10" name="recursosDidacticos" required> <?php echo $recursosDidacticos;?>
          </textarea></td>
        <td align="center" valign="middle"><textarea  class="area" cols="60" rows="10" name="fuentesDeInformacion" required> <?php echo $fuentesInformacion;?>
          </textarea></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>
      <input type="submit" value="Guardar" onClick="enciendeCaja()">
    </p>
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

function cambiaFecha()
{
    document.getElementById("inicio").value=document.getElementById("fechaInicio").value;
	
	document.getElementById("termino").value=document.getElementById("fechaTermino").value;

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