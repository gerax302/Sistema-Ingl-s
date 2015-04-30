<?php 
require_once('../Connections/local.php');
mysql_select_db($database_local, $local);

$nivel="";
$periodo="";
$anio="";
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
		<li class='last'><a href='#'><span>Ayuda</span></a></li>
		<li class='last'><a href='../index.php'><span>Salir</span></a></li>
    </ul>
  </div>
  <!--Fin Menu izq --> 
  <!-- end .sidebar1 --></div>
		<h1>
  <div align="center">Sistema Integral de Inglés</div>
</h1>

<body>
<section>
  <h2>
    <div align="center">Inscripción Alumno Externo</div>
  </h2>
  <p>
  <form action="Logica_Inscripcion_Alumno_Externo.php" method="post" enctype="multipart/form-data" name="form1">
    <p>&nbsp;</p>
    <table align="center">
      <tr valign="baseline">
        <td nowrap align="right">Curp:</td>
        <td><input type="text" title="El Nombre no debe llevar signos " pattern="[a-z|A-Z |0-9 | áéíóúñÁÉÍÓÚÑ]*$" name="curp" value="" size="18" maxlength="18" placeholder="Ej. MECC020123HDFNRR04" required>
          <span class="poi">*</span></td>
      <tr valign="baseline">
        <td nowrap align="right">Nombre:</td>
        <td><input type="text" title="El Nombre no 	debe llevar signos o números" pattern="[a-z|A-Z | | áéíóúñÁÉÍÓÚÑ]*$" name="nombre" value="" size="32" maxlength="45" placeholder="Ej. Juan" required>
          <span class="poi">*</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Apellido Paterno:</td>
        <td><input type="text" title="El Apellido Paterno no debe llevar signos o números" pattern="[a-z| A-Z| áéíóúñÁÉÍÓÚÑ]*$" name="apellidoPaterno" value="" size="32" maxlength="45" placeholder="Ej. Romo" required>
          <span class="poi">*</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Apellido Materno:</td>
        <td><input type="text" title="El Apellido Materno no debe llevar signos o números" pattern="[a-z| A-Z| áéíóúñÁÉÍÓÚÑ]*$" name="apellidoMaterno" value="" size="32" maxlength="45" placeholder="Ej. Martínez" required>
          <span class="poi">*</span></td>
      </tr>
      <tr valign="baseline">
      <tr valign="baseline">
        <td nowrap align="right">Contraseña:</td>
        <td><input type="text" name="contraseña" value="" size="32" maxlength="45"
        placeholder="Ej. Contraseña123" required>
          <span class="poi">*</span></td>
      </tr>
      
        <td nowrap align="right">Dirección:</td>
        <td><input type="text" pattern="[a-z|A-Z|0-9|"."|áéíóúñÁÉÍÓÚÑ]*$" name="direccion" value="" size="32" maxlength="100" placeholder="Ej. Calle las flores No.33" required>
          <span class="poi">*</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Teléfono:</td>
        <td><input type="text" title="El Teléfono debe contener 10 números" pattern="[0-9]{10}$" name="telefono" value="" size="32" maxlength="25" placeholder="Ej. 4371031689" required>
          <span class="poi">*</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right"></a>Correo:</td>
        <td><input type="email" name="correo" value="" size="32" maxlength="45" placeholder="Ej. personal@hotmail.com" required>
          <span class="poi">*</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Edad:</td>
        <td><input title="El campo Edad esta vacio o tiene letras" type="text" pattern="[0-9]*$" name="edad" value="" size="32" maxlength="300" placeholder="Ej. 21" required>
          <span class="poi">*</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Nivel:</td>
        <td><select name="niveles" id="select">
            <option value="0" id="0"> ------
            <?php
			$buscarNivel= "SELECT * from  nivel where estadoNivel='Activo'";
			$buscandoNiveles = mysql_query($buscarNivel,  $local);
    		$nivelSeleccionado="";

			$valorIndex="";
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
            <option value="<?php echo $valorIndex;?>" id="<?php echo $i;?>"> <?php echo $nivelSeleccionado; ?>
            <?php
														$i=$i+1;
													}

													?>
          </select>
          <span class="poi">*</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Género:</td>
        <td><select name="genero" id="select">
            <option value="0" id="0"> ------
            <option value="1" id="1"> Masculino
            <option value="2" id="2"> Femenino
          </select>
          <span class="poi">*</span></td>
          </td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Plan de Estudios:</td>
        <td><input type="text" name="Plan" value="Externo"  ></td>
          </td>
          </td>
          </td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Estado:</td>
        <td><select name="estado" id="select">
            <option value="0" id="0"> ------
            <option value="1" id="1"> Activo
            <option value="2" id="2"> Inactivo
          </select>
          <span class="poi">*</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Forma de Pago:</td>
        <td><select name="formatoPago" id="formatoPago" onChange="Inhabilita()">
            <option value="0" id="0"> ------
            <option value="1" id="1"> Pagado
            <option value="2" id="2"> Prórroga
          </select>
          <span class="poi">*</span></td>
          </td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Número de recibo:</td>
        <td><input type="text" id="noRecibo" name="noRecibo" value="" size="32" maxlength="300" placeholder="Ej. 1233123" disabled="true" required></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Fecha Límite:</td>
        <td><input type="date" id="fechaLimite" name="fechaLimite" value="" size="32" maxlength="300" placeholder="Ej. TOEIC, etc." disa
        disabled="true" required></td>
      <tr valign="baseline">
        <td nowrap align="right">Pregunta de Seguridad:</td>
        <td><select name="pregunta" id="select">
            <option value="0" id="0" > ------
            <option value="1" id="1"> ¿Cuál es el nombre de  tu canción favorita?
            <option value="2" id="2" > ¿Cuál es el lugar de nacimiento de tu madre?
            <option value="3" id="3" > ¿Cuál es el nombre de  tu mejor amigo de la infancia?
            <option value="4" id="4" > ¿Cuál es el nombre de  tu primer mascota?
            <option value="5" id="5" > ¿Cuál fué tu primer trabajo?
          </select>
          <span class="poi">*</span>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Respuesta:</td>
        <td><input type="text"  name="respuesta" value="" size="32" maxlength="300"  required>
          <span class="poi">*</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td><input type="submit" value="Guardar" onClick="comboRayitas()"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right"><span class="poi">* Campos Obligatorios</span></td>
      </tr>
    </table>
     <input type="hidden" name="MM_insert" value="form1">
    <input type="text" name="trampaNivel" value="<?php echo $nivel?>" hidden>
    <input type="text" name="trampPeriodo" value="<?php echo $periodo?>" hidden>
    <input type="text" name="trampaAnio" value="<?php echo $anio?>" hidden>
  </form>
  <p>&nbsp;</p>
  </p>
</section>
<section> </section>
<script type="text/javascript">

function Inhabilita()
{

if(document.getElementById('formatoPago').value==1){
	document.getElementById('fechaLimite').disabled=true;
   document.getElementById('noRecibo').disabled=false;
}
if(document.getElementById('formatoPago').value==2){
   document.getElementById('noRecibo').disabled=true;
   document.getElementById('fechaLimite').disabled=false;
}

}
</script>
<footer>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</footer>
</body>
</html>
