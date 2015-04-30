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

$uno="";
$dos="";
$tres="";
$cuatro="";
$cinco="";
$seis="";
$siete="";


$periodo1="";
$periodo2="";
$periodo3="";

$grupo1="";
$grupo2="";
$grupo3="";
$grupo4="";
$grupo5="";


$periodoBusqueda="";
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
$peri="";
$an="";
$nivelillo="";

$i=0;


if(isset($_GET['idGeneral'])){
	$idGeneral=$_GET['idGeneral'];
	
	$consultaBuscador="select * from dosificaciongeneral,nivel where idDosificacionGeneral='".$idGeneral."' and dosificaciongeneral.asignatura=nivel.nivelIngles";

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
				
				/////////////////////////////////////
				
				$peri=$row['periodo'];
				$an=$row['anio'];
				$nivelillo=$row['nivelIngles'];
			}

	
}
if(isset($_GET['periodoBusqueda'])){
	$periodoBusqueda=$_GET['periodoBusqueda'];
	
	if($periodoBusqueda=="AgostoDiciembre"){
		$periodo1="selected";
		
	}
	if($periodoBusqueda=="EneroJunio"){
		$periodo2="selected";
		
	}
	if($periodoBusqueda=="Verano"){
		$periodo3="selected";
		
	}
	
}

if(isset($_GET['anio'])){
	$anio=$_GET['anio'];
	
}

if($i==0){
$periodoInicio="";
$periodoFin="";
$anio="";
	
}


if($asignatura=="inglesI"){
	$uno="selected";
}
if($asignatura=="inglesII"){
	$dos="selected";
}
if($asignatura=="inglesIII"){
	$tres="selected";
}
if($asignatura=="inglesIV"){
	$cuatro="selected";
}
if($asignatura=="inglesV"){
	$cinco="selected";
}
if($asignatura=="inglesVI"){
	$seis="selected";
}
if($asignatura=="certificacion"){
	$siete="selected";
}
 
 if($grupo=="A"){
	 $grupo1="selected";
 }
 if($grupo=="B"){
	 $grupo2="selected";
 }
 if($grupo=="C"){
	 $grupo3="selected";
 }
 if($grupo=="D"){
	 $grupo4="selected";
 }
 if($grupo=="E"){
	 $grupo5="selected";
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
  <h2> <div align="center">Modificar Dosificación General</div></h2>
 <form method="post" name="form" action="Logica_Consulta_Dosificacion.php?identificaClase=modificar&nombre=<?php echo $nombre;?>">
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
             <option name="Enero-Junio" value="Enero-Junio" id="22"> Enero - Junio</option>
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
    
    
     <form method="post" name="form" action="Logica_Modificar_Dosificacion.php?nombre=<?php echo $nombre; ?>">
    
    <p>&nbsp;</p>
    <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td>C&oacute;digo:</td>
        <td><input type="text" name="codigo" value="<?php echo $codigoDosificacion; ?>" size="10" placeholder="Ej. COD1" required />
          <span class="poi"><span class="poi">*</span></span></td>
        <td>Revisi&oacute;n: </td>
        <td><input type="text" pattern="[0-9]*$" name="revision" value="<?php echo $revision; ?>" size="5" placeholder="Ej. 2" required/>
          <span class="poi">*</span></td>
        <td>Fecha:</td>
        <td>
        <input type="text" name="auxFecha" id="fecha" value="<?php echo $fechaDosificacion; ?>" size="20" >
        <input type="date" name="fecha2" id="fecha2" onChange="cambiaFecha()" >
          <span class="poi">*</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Responsable: </td>
        <td colspan="3"><input name="responsable" id="responsable" pattern="[a-z| A-Z | | áéíóúñÁÉÍÓÚÑ]*$" type="text"  size="30" required value="<?php echo $nombre;?>" readonly ></td>
        <!-- <td colspan="3">Subdirección Académica</td> --> 
        
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="1036" align="center">
      <tr valign="baseline">
        <td width="276" align="right" nowrap="nowrap">Asignatura:</td>
        <td width="214"><select name="grupos" id="grupos1" onChange="colocaGrupo()" >
            
            
            <option value="<?php echo $grupo;?>" id="<?php echo $asignatura;?>" selected> <?php echo $asignatura."  ".$grupo;?>
          
         
           
          </select>
          <span class="poi">*</span></td>
        <td width="34">HT:</td>
        <td width="122"><input type="text" pattern="[0-9]*$" name="horasTeoricas" value="<?php echo $horasTeoricas; ?>" size="10" maxlength="11" id="ht" required onChange="suma()"/>
          <span class="poi" >*</span></td>
        <td width="37">HP:</td>
        <td width="120"><input type="text" pattern="[0-9]*$" name="horasPracticas" value="<?php echo $horasPracticas; ?>" size="10" maxlength="11" id="hp" required onChange="suma()"/>
          <span class="poi" >*</span></td>
        <td width="55" align="right">C:</td>
        <td width="142"><input type="text" pattern="[0-9]*$" name="creditos" value="<?php echo $creditos; ?>" size="10" maxlength="11" id="creditos" required  readonly onChange="suma()" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Período:</td>
        <td colspan="5"><select name="periodos" id="periodo1" onChange="colocaAnio()" >
            
            <?php

		
	?>
            <option  value="<?php echo $an;?>" id="<?php echo $peri;?>" selected> <?php echo $peri;?>
            <?php
		
		

	
		?>
          </select>
          -
          <input type="text" pattern="[0-9]{4}$" name="anio" id="a1" size="10" readonly value="<?php echo $an; ?>"/>
          <span class="poi">*</span></td>
        <td>Grupo:</td>
        <td><input type="text" name="grupo2" id="g1"  size="10" value="<?php echo $grupo;?>" readonly>
          <span class="poi">*</span></td>
      </tr>
      
        <td>&nbsp; </td>
      <tr valign="baseline">
        <td align="right" valign="middle" nowrap="nowrap"><p> Objetivo del Curso: <span class="poi">*</span></p></td>
        <!--<input type="text" name="nombre_completo" value="" size="15" />-->
        
        <td colspan="7"><textarea class="area" cols="95" rows="5" name="objetivoDelCurso" placeholder="Ej. Preparar a los estudiantes en el uso de adjetivos calificativos." required> <?php echo $objetivoCurso; ?> 
</textarea>
      </td>
      </tr>
      
        <td >&nbsp; </td>
      <tr valign="baseline">
        <td align="right" valign="middle" nowrap="nowrap"><p> Aportaci&oacute;n del Curso al </p>
        <p>Perfil Profesional: <span class="poi">*</span> </p></td>
        <td colspan="7">
        <textarea class="area"  cols="95" rows="5" name="aportacionDelCurso"  placeholder="Ej. Desarrollar  las habilidades gramaticales en el alumno." required> <?php echo $aportacionCurso; ?>   
</textarea>
          </td>
      </tr>
      <style>
textarea.area
{
resize:none;
}

</style>
    </table>
    <p>&nbsp;</p>
    <table align="center">
      <tr valign="baseline">
        <td width="533"><table width="711" align="center">
            <tr valign="baseline">
              <td colspan="3" align="center" valign="middle" nowrap="nowrap">Relación con otras asignaturas:</td>
            </tr>
            <tr valign="baseline">
              <td colspan="2" nowrap="nowrap" align="center">Temas: </td>
              <td width="228" align="center">Asignatura:</td>
            </tr>
            <tr valign="baseline">
              <td width="108" align="right" nowrap="nowrap">Anteriores </td>
              <td width="181" align="center"><select name="temaAnterior">
                  <option name="ninguna" > Ninguna </option>
                  <option name="inglesI" > Inglés I </option>
                  <option name="inglesII" > Inglés II </option>
                  <option name="inglesIII"> Inglés III </option>
                  <option name="inglesVI" > Inglés IV</option>
                  <option name="inglesV"> Inglés V </option>
                  <option name="inglesVI"> Inglés VI </option>
                  <option name="certificacion"> Certificación </option>
                </select></td>
              <td align="center"><select name="asignaturaAnterior">
                  <option name="ninguna" > Ninguna </option>
                  <option name="inglesI" > Inglés I </option>
                  <option name="inglesII" > Inglés II </option>
                  <option name="inglesIII"> Inglés III </option>
                  <option name="inglesVI" > Inglés IV</option>
                  <option name="inglesV"> Inglés V </option>
                  <option name="inglesVI"> Inglés VI </option>
                  <option name="certificacion"> Certificación </option>
                </select></td>
            </tr>
            <tr valign="baseline">
              <td height="27" align="right" nowrap="nowrap">Posteriores</td>
              <td align="center"><select name="temaPosterior">
                  <option name="ninguna" > Ninguna </option>
                  <option name="inglesI" > Inglés I </option>
                  <option name="inglesII" > Inglés II </option>
                  <option name="inglesIII"> Inglés III </option>
                  <option name="inglesVI" > Inglés IV</option>
                  <option name="inglesV"> Inglés V </option>
                  <option name="inglesVI"> Inglés VI </option>
                  <option name="certificacion"> Certificación </option>
                </select></td>
              <td align="center"><select name="asignaturaPosterior">
                  <option name="ninguna" > Ninguna </option>
                  <option name="inglesI" > Inglés I </option>
                  <option name="inglesII" > Inglés II </option>
                  <option name="inglesIII"> Inglés III </option>
                  <option name="inglesVI" > Inglés IV</option>
                  <option name="inglesV"> Inglés V </option>
                  <option name="inglesVI"> Inglés VI </option>
                  <option name="certificacion"> Certificación </option>
                </select></td>
            </tr>
          </table></td>
      </tr>
    </table>
    <table align="center">
      <tr valign="baseline"> </tr>
    </table>
    <table width="200" border="0" align="center">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input name="Guardar" type="submit" value="Guardar" onClick="Deshabilita()"></td>
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
        <td><input type="text" name="trampaNivel" id="tNivel" value="" hidden></td>
        <td><input type="text" name="trampaPeriodo" id="tPeriodo" value=""  hidden></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    
       </table>
        
        <p>&nbsp;</p>
        <p>
        
          
       <td><input type="text" name="trampaNivel" id="tNivel" value="<?php echo $nivelillo;?>" hidden></td>
        <td><input type="text" name="trampaPeriodo" id="tPeriodo" value="<?php echo $peri;?>"  hidden></td>
          
          
        </p>
 </form>
 
<script type="text/javascript">
function suma(){
	
	
var num1=parseInt((document.getElementById('ht').value));
var num2=parseInt((document.getElementById('hp').value));

document.getElementById('creditos').value=num1+num2;


}
</script> 
<script type="text/javascript">

function cambiaFecha()
{
    document.getElementById("fecha").value=document.getElementById("fecha2").value;

}

function colocaGrupo(){

document.getElementById('g1').value=
document.getElementById('grupos1').value;

if(document.getElementById('Ingles I').id){
document.getElementById('tNivel').value=
document.getElementById('Ingles I').id;
}

if(document.getElementById('Ingles III').id){
document.getElementById('tNivel').value=
document.getElementById('Ingles III').id;
}

if(document.getElementById('Ingles IV').id){
document.getElementById('tNivel').value=
document.getElementById('Ingles I').id;
}

if(document.getElementById('Ingles IV').id){
document.getElementById('tNivel').value=
document.getElementById('Ingles II').id;
}

if(document.getElementById('Ingles V').id){
document.getElementById('tNivel').value=
document.getElementById('Ingles V').id;
}

if(document.getElementById('Ingles VI').id){
document.getElementById('tNivel').value=
document.getElementById('Ingles VI').id;
}

if(document.getElementById('Certificacion').id){
document.getElementById('tNivel').value=
document.getElementById('Certificacion').id;
}

}

function colocaAnio(){
	
document.getElementById('a1').value=
document.getElementById('periodo1').value;




if(document.getElementById('Agosto-Diciembre').id){
document.getElementById('tPeriodo').value=
document.getElementById('Agosto-Diciembre').id;
}
if(document.getElementById('Enero-Junio').id){
document.getElementById('tPeriodo').value=
document.getElementById('Enero-Junio').id;
}

if(document.getElementById('Verano').id){
document.getElementById('tPeriodo').value=
document.getElementById('Verano').id;
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