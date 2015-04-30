<?php
	session_start();
	require_once('../Connections/local.php');
	mysql_select_db($database_local, $local);
	$banderaPeriodo1=0;
	$banderaPeriodo2=0;
	$banderaPeriodo3=0;

	if (isset($_SESSION["sesion"]))
	{
		$recibido = $_SESSION["sesion"];
		$variablePhp="";
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
.boxing {
	font-size: 36%;
}
.combix {
	font-size: 70%;
}

-->
</style>
</head>

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
  <h2> <div align="center">Nuevo Nivel </div></h2>
		<p>&nbsp;</p>
   <?php
     $buscarPeriodo= "SELECT * from  nivel  where estadoNivel='Activo'";

	$buscandoNiveles = mysql_query($buscarPeriodo,  $local);
	$i=1;
	while($row = mysql_fetch_array($buscandoNiveles))
	{
	if($row['periodo']=='Enero-Junio'){
		$banderaPeriodo1=1;
	}
	if($row['periodo']=='Verano'){
		$banderaPeriodo2=1;
	}
	if($row['periodo']=='Agosto-Diciembre'){
		$banderaPeriodo3=1;
	}
	}
		?>
  <p>
  <form method="post" name="form1" action="Logica_Nuevo_Nivel.php">
<!-- AQUÍ SE RESERVA PARA IMÁGEN-->
    <table align="center">
      <tr valign="baseline">
        <td nowrap align="right">Nuevo Nivel:</td>
        <td><select name="Niveles" id="Niveles"  onChange="seleccionaPeriodo()">
<option name="0" value="0" > ------ </option>
<option name="1" value="Ingles I" > Inglés I </option>
<option name="2" value="Ingles II" > Inglés II </option>
<option name="3" value="Ingles III"> Inglés III </option>
<option name="4" value="Ingles IV" > Inglés IV</option>
<option name="5" value="Ingles V"> Inglés V </option>
<option name="6" value="Ingles VI"> Inglés VI </option>
<option name="7" value="Certificacion"> Certificación </option>
</select>
    <span class="poi">*</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Período:</td>
        <td><select name="Periodo" id="Periodo">
<option name="Rayitas" value="Rayitas" > ------ </option>
<option name="AgostoDiciembre" value="Agosto-Diciembre" id="per3" > Agosto-Diciembre </option>
<option name="EneroJunio" value="Enero-Junio" id="per1"> Enero-Junio </option>
<option name="Verano" value="Verano" id="per2"> Verano </option>
</select> <span class="poi">*</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Año:</td>
        <td><input type="text" pattern="[0-9]{4}$" name="anio"  maxlength="4" placeholder="Ej. 2014" required>
        <span class="poi">*</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td><input type="submit" value="Guardar"></td>
      </tr>
      <tr valign="baseline">
         <td nowrap align="right"><span class="poi">* Campos Obligatorios</span></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form1">
  </form>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>
		<input type="hidden" id="p1" value="<?php  echo $banderaPeriodo1; ?>">
  	<input type="hidden"  id="p2"  value="<?php  echo $banderaPeriodo2; ?>">
  	<input type="hidden"  id="p3"  value="<?php  echo $banderaPeriodo3; ?>" >
  <p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</p>
</section>

<script type="text/javascript">


function seleccionaPeriodo(){

 if(document.getElementById("p1").value=="1"){
	 document.getElementById("per2").disabled=true;
	   document.getElementById("per3").disabled=true;
 }
 if(document.getElementById("p2").value=="1"){
	 document.getElementById("per1").disabled=true;
	   document.getElementById("per3").disabled=true;
 }
  if(document.getElementById("p3").value=="1"){
	  document.getElementById("per1").disabled=true;
	   document.getElementById("per2").disabled=true;
 }

}

</script>

<section>

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
