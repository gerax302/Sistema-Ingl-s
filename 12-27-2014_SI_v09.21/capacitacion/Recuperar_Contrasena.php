<?php
include('local.php');
$contrasena="";
$visible="hidden";
$identificador = "";


if(isset($_GET["usuarioLogin"])) {
	$recibido = $_GET["usuarioLogin"];
	if ($recibido == "alumno"){
		$identificador = "Número de Control:";
	}
	if ($recibido == "profesor"){
		$identificador = "Matrícula:";
	}

	if ($recibido == "administrador" || $recibido == "secretaria" || $recibido == "subdireccion"){
		$identificador = "Usuario:";
	}	
}


if(isset($_GET["contrasena"])){
	$contrasena =$_GET["contrasena"];
}
if(isset($_GET["visible"])){
	if($_GET["visible"]=="true"){
		$visible ="";
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
		<script src="script.js"></script>
		<header>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
		</header>
		<div class="sidebar1">
			<!--Inicio Menu izq -->
			<div id='cssmenu'>
				<ul>
					<li><a href='index.php'><span>Regresar</span></a></li>
				</ul>
			</div>
			<!--Fin Menu izq -->
			<!-- end .sidebar1 --></div>
		<p>&nbsp;</p>
		<h1> <div align="center">Sistema de Control de Inglés del ITSZaS</div></h1>
		
	<body>
		<section>
			<h2> <div align="center">Recuperar Contraseña</div></h2>
			<p>
			<section>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</section>
			<div align="center">
				<form method="post" name="form1" action="Logica_Recuperar_Contrasena.php?usuarioLogin=<?php echo($recibido);?>">
					<table width="616">
						<tr>
							<td width="207"><label>
								<div align="right"><?php echo $identificador; ?></div>
								</label>
								<div align="left"></div></td>
							<td width="347"><label for="textfield"></label>
								<input type="text" name="cajaUsuario" id="textfield" required><span class="poi">*</span></td>
						</tr>
						<tr>
							<td><label>
								<div align="right">Pregunta de Seguridad:</div>
								</label></td>
							<td><label for="select"></label>
								<select name="comboPreguntas" id="comboPreguntas" required>
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
						<tr>
							<td><label>
								<div align="right">Respuesta:</div>
								</label></td>
							<td><input type="text" name="cajaRespuesta" id="cajaRespuesta" required><span class="poi">*</span>
						</form></td>
					</tr>
				<tr>
					<td align="right"><label <?php echo $visible;?> >Su contraseña es:</label></td>
					<td><label><?php echo $contrasena;?></label>&nbsp;</td>
				</tr>
				<tr valign="baseline">
					<td nowrap align="right">&nbsp;</td>
					<td>
						<input type="submit" name="button" id="button" value="Recuperar Contraseña">
					</td>
				</tr>
				<tr valign="baseline">
					<td nowrap align="right"><div align="right"><span class="poi">* Campos Obligatorios</span></div></td>

				</tr>
				</table>
			</form>
		</p>
	</div>
<p></p>
</section>
<section>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</section>
<footer>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</footer>
</body>
</html>
