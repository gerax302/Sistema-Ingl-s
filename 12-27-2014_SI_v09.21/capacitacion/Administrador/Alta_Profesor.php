<?php 
	session_start();
	require_once('../Connections/local.php');
	mysql_select_db($database_local, $local);

	//variables Niveles Impartidos
	$impartidos=""; 
	$ni1="I"; $ni2="II"; $ni3="III"; $ni4="IV"; 
	$ni5="V"; 	$ni6="VI"; 	$niCert="Cert."; 
	//variables Niveles Impartidos Actualmente
	$impartidosActualmente=""; 
	$nia1="I"; $nia2="II"; $nia3="III"; $nia4="IV"; 
	$nia5="V"; $nia6="VI"; $niaCert="Cert."; 	

	if (isset($_SESSION["sesion"]))
	{
		$recibido = $_SESSION["sesion"];
		$nombre = ($_SESSION['sesion']);
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
			<h2> <div align="center">Alta Profesor </div></h2>
			<p>  
			<form method="post" name="form1" action="Logica_Alta_Profesor.php">
				<!-- AQUÍ SE RESERVA PARA IMÁGEN-->
				<table align="center">
					<tr valign="baseline">
						<td nowrap align="right">Matrícula:</td>
						<td><input type="text" pattern="[a-z| A-Z |0-9]*$" name="matricula" value="" size="32" maxlength="45" placeholder="Ej. M11714" id="matricula" required>
							<span class="poi">*</span></td>
					</tr>
					<tr valign="baseline">
						<td nowrap align="right">Nombre:</td>
						<td><input type="text" title="El Nombre no debe llevar signos o números" pattern="[a-z| A-Z | | áéíóúñÁÉÍÓÚÑ]*$" name="nombre" value="" size="32" maxlength="45" placeholder="Ej. Isabel" required> <span class="poi">*</span></td>
					</tr>
					<tr valign="baseline">
						<td nowrap align="right">Apellido Paterno:</td>
						<td><input type="text" title="El Apellido Paterno no debe llevar signos o números" pattern="[a-z| A-Z| áéíóúñÁÉÍÓÚÑ]*$" name="apellidoPaterno" value="" size="32" maxlength="45" placeholder="Ej. Sanchéz" required> 
							<span class="poi">*</span></td>
					</tr>
					<tr valign="baseline">
						<td nowrap align="right">Apellido Materno:</td>
						<td><input type="text" title="El Apellido Materno no debe llevar signos o números" pattern="[a-z| A-Z| áéíóúñÁÉÍÓÚÑ]*$" name="apellidoMaterno" value="" size="32" maxlength="45" placeholder="Ej. Martínez" required> 
							<span class="poi">*</span></td>
					</tr>
					<tr valign="baseline">
						<td nowrap align="right">Contraseña:</td>
						<td><input type="text" name="contrasena" value="" size="32" maxlength="45" placeholder="Ej. contrasena123" required> 
							<span class="poi">*</span></td>
					</tr>
					<tr valign="baseline">
						<td nowrap align="right">Dirección:</td>
						<td><input type="text" pattern="[a-z|A-Z|0-9|"."|áéíóúñÁÉÍÓÚÑ]*$" name="direccion" value="" size="32" maxlength="100" placeholder="Ej. Calle las Flores No.33" required> <span class="poi">*</span></td>
					</tr>
					<tr valign="baseline">
						<td nowrap align="right">Teléfono:</td>
						<td><input type="text" title="El Teléfono debe contener 10 números" pattern="[0-9]{10}$" name="telefono" value="" size="32" maxlength="25" placeholder="Ej. 4371031689" required> <span class="poi">*</span></td>
					</tr>
					<tr valign="baseline">
						<td nowrap align="right">Correo:</td>
						<td><input type="email" name="correo" value="" size="32" maxlength="45" placeholder="Ej. personal@hotmail.com" required> <span class="poi">*</span></td>
					</tr>
					<tr valign="baseline">
						<td nowrap align="right">Certificaciones:</td>
						<td><input type="text" name="certificaciones" value="" size="32" maxlength="300" placeholder="Ej. TOEIC, etc." required> <span class="poi">*</span></td>
					</tr>
					<tr valign="baseline">
						<td nowrap align="right">Experiencia Laboral:</td>
						<td><input type="text" name="experiencia" value="" size="32" maxlength="300" placeholder="Ej. Ha laborado 3 años en la escuela Independencia..." required> <span class="poi">*</span></td>
					</tr>
					<tr valign="baseline">
						<td nowrap align="right">Fecha de Ingreso:</td>
						<td><input type="date" name="fechaIngreso" required></td>
					</tr>
					<tr valign="baseline">
						<td nowrap align="right">Niveles Impartidos:</td>
						<td>
							<span class="combix">I</span><input name="impartido[]" type="checkbox" value="I">
							<span class="combix">II</span><input name="impartido[]" type="checkbox" value="II">
							<span class="combix">III</span><input name="impartido[]" type="checkbox" value="III">
							<span class="combix">IV</span><input name="impartido[]" type="checkbox" value="IV">
							<span class="combix">V</span><input name="impartido[]" type="checkbox" value="V">
							<span class="combix">VI</span><input name="impartido[]" type="checkbox" value="VI">
							<span class="combix">Cert.</span><input name="impartido[]" type="checkbox" value="Cert." > 		        
						</td>
				</tr>
			<tr valign="baseline">
				<td nowrap align="right">Niveles Impartidos Actualmente:</td>
				<td> 
					<span class="combix">I</span><input name="impartidoActual[]" type="checkbox" value="I">
					<span class="combix">II</span><input name="impartidoActual[]" type="checkbox" value="II">
					<span class="combix">III</span><input name="impartidoActual[]" type="checkbox" value="III">
					<span class="combix">IV</span><input name="impartidoActual[]" type="checkbox" value="IV">
					<span class="combix">V</span><input name="impartidoActual[]" type="checkbox" value="V">
					<span class="combix">VI</span><input name="impartidoActual[]" type="checkbox" value="VI">
					<span class="combix">Cert.</span><input name="impartidoActual[]" type="checkbox" value="Cert." ></td>
			</tr>
			<tr valign="baseline">
				<td nowrap align="right">Período Laboral:</td>
				<td><select name="periodoLaboral" >
					<option value="rayitas" id="rayitas">------ </option>
					<option value="Agosto-Diciembre" id="1">Agosto-Diciembre </option>
					<option value="Enero-Junio" id="2">Enero-Junio </option>
					<option value="Verano" id="3">Verano </option>
					</select> <span class="poi">*</span></td>
		</tr>
	<tr valign="baseline">
		<td nowrap align="right">Estado Laboral:</td>
		<td><select name="estadoLaboral" id="select">
			<option value="1" id="1">
				Activo
			<option value="2" id="2">
				Inactivo
			</select></td>
	</tr>
	<tr>
		<td><label>
			<div align="right">Pregunta de Seguridad:</div>
			</label></td>
		<td><label for="select"></label>
			<select name="comboPreguntas" id="comboPreguntas">
				<option value="0" id="0">
					-----------------------
				<option value="1" id="1">
					¿Cuál es el nombre de  tu canción favorita?
				<option value="2" id="2">
					¿Cuál es el lugar de nacimiento de tu madre?
				<option value="3" id="3">
					¿Cuál es el nombre de  tu mejor amigo de la infancia?
				<option value="4" id="4">
					¿Cuál es el nombre de  tu primer mascota?
				<option value="5" id="5">
					¿Cuál fué tu primer trabajo?               
			</select><span class="poi">*</span></td>
	</tr> 
	<tr> <td><label>
		<div align="right">Respuesta:</div>
		</label></td>
		<td><input type="text" name="cajaRespuesta" id="cajaRespuesta"><span class="poi">*</span>
		</td> </tr>     
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
</p>
</section>

<script type="text/javascript">


	function cambiaImagen(){
		document.getElementById("imagenPerfil").src="../pic/Icon-user2.png";
	}
	function fueraImagen(){

		document.getElementById("imagenPerfil").src="../pic/Icon-user.png";


	}

	function cambiaFoto(){
		var fileSelector = document.createElement('input');
		fileSelector.setAttribute('type', 'file');

		var selectDialogueLink = document.createElement('a');
		selectDialogueLink.setAttribute('href', '');
		selectDialogueLink.innerText = "Select File";

		fileSelector.click();
		return false;


		document.body.appendChild(selectDialogueLink);

		var files = evt.target.files; // FileList object

		// Obtenemos la imagen del campo "file".
		for (var i = 0, f; f = files[i]; i++) {
			//Solo admitimos imágenes.
			if (!f.type.match('image.*')) {
				continue;
			}

			var reader = new FileReader();

			reader.onload = (function(theFile) {
				return function(e) {
					// Insertamos la imagen
					document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
				};
			})(f);

			reader.readAsDataURL(f);
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
