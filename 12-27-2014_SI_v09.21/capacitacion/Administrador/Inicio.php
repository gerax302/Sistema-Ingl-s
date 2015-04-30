<?php
session_start();
require_once('../Connections/local.php');
mysql_select_db($database_local, $local);
$nombre="";
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
			-->
		</style>
	</head>

	<body>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/estiloMenuIzquierdo.css">
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="../script.js"></script>
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
			</div>

			<h1>
				<div align="center">Sistema Integral de Inglés </div>
			</h1>
			
		<body>
			<section>
				<h2>
					<div align="center">Instituto Tecnológico Superior Zacatecas Sur
						&nbsp;<br>
						&nbsp;<br>
						<img src="../pic/user.png" width="234" height="256"></div>
				</h2>
				<div align="center">
					<h2>Usuario: <?php echo($nombre);?> </h2>
				</div>
				&nbsp;<br>
				&nbsp;<br>
				&nbsp;<br>
				</p>
			</section>
		<footer>
			<p>&nbsp;<br>
			</p>
			<p>&nbsp;<br>
			</p>
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
