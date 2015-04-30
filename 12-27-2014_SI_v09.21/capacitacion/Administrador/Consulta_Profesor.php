<!--INICIO CODIGO PHP BUSQUEDA -->
<?php 
	session_start();
	require_once('../Connections/local.php');
	mysql_select_db($database_local, $local);

	if (isset($_SESSION["sesion"]))
	{
		$nombre = ($_SESSION['sesion']);
?>

<?php
	$cuenta=isset($_GET['cuenta']);

	if (!function_exists("GetSQLValueString")) {
		function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
		{
			if (PHP_VERSION < 6) {
				$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
			}

			$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

			switch ($theType) {
				case "text":
				$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
				break;    
				case "long":
				case "int":
				$theValue = ($theValue != "") ? intval($theValue) : "NULL";
				break;
				case "double":
				$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
				break;
				case "date":
				$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
				break;
				case "defined":
				$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
				break;
			}
			return $theValue;
		}
	}

	$colname_busquedaprofesor = "-1";
	if (isset($_GET['buscar'])) {
		$colname_busquedaprofesor = $_GET['buscar'];
	}
	mysql_select_db($database_local, $local);
	$query_busquedaprofesor = sprintf("SELECT * FROM profesor WHERE nombre LIKE %s ORDER BY nombre ASC", GetSQLValueString("%" . $colname_busquedaprofesor . "%", "text"));
	$busquedaprofesor = mysql_query($query_busquedaprofesor, $local) or die(mysql_error());
	$row_busquedaprofesor = mysql_fetch_assoc($busquedaprofesor);
	$totalRows_busquedaprofesor = mysql_num_rows($busquedaprofesor);
?>
<!-- FIN CODIGO PHP BUSCAR -->


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
			color: #000000;
			text-decoration: underline;
			}
			a:visited {
			color: #003300;
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
			<h2> <div align="center">Consulta Profesor </div></h2>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<form id="form1" name="form1" method="get" action="Consulta_Profesor.php">
				<p>&nbsp;</p>
				<p align="center">
					<label for="buscar">Búsqueda</label>
					<input name="buscar" pattern="[a-z| A-Z | | áéíóúñÁÉÍÓÚÑ]*$" type="text" id="buscar" maxlength="100" size="80" />
					<input type="submit" name="Buscar" id="Buscar" value="Buscar" />
				</p>
			</form>
			<div>Su búsqueda 
				ha devuelto <?php echo $totalRows_busquedaprofesor ?> resultados:</div>
			<p>&nbsp;</p>
			<table width="100%" border="1" cellspacing="1" cellpadding="1">
				<tr>
					<th scope="col">Matrícula</th>
					<th scope="col">Nombre</th>
					<th scope="col">Apellido Paterno</th>
					<th scope="col">Apellido Materno</th>
					<th scope="col">Dirección</th>
					<th scope="col">Teléfono</th>
					<th scope="col">Correo</th>
					<th scope="col">Certificaciones</th>
					<th scope="col">Experiencia</th>
					<th scope="col">Fecha de Ingreso</th>
					<th scope="col">Niveles Impartidos</th>
					<th scope="col">Nivel Impartido Actualmente</th>
					<th scope="col">Período Laboral</th>
					<th scope="col">Estado Laboral</th>
				</tr>
				<?php 
		$activo="";
	$inactivo="";

	if(isset($_GET['matricula'])){
		$matricula=$_GET['matricula'];
	}else{
		$matricula="";
	}
	if(isset($_GET['nombre'])){
		$nombre=$_GET['nombre'];
	}else{
		$nombre="";
	}
	if(isset($_GET['apellidoPaterno'])){
		$apellidoPaterno=$_GET['apellidoPaterno'];
	}else{
		$apellidoPaterno="";
	}
	if(isset($_GET['apellidoMaterno'])){
		$apellidoMaterno=$_GET['apellidoMaterno'];
	}else{
		$apellidoMaterno="";
	}
	if(isset($_GET['direccion'])){
		$direccion=$_GET['direccion'];
	}else{
		$direccion="";
	}
	if(isset($_GET['telefono'])){
		$telefono=$_GET['telefono'];
	}else{
		$telefono="";
	}
	if(isset($_GET['correo'])){
		$correo=$_GET['correo'];
	}else{
		$correo="";
	}
	if(isset($_GET['certificaciones'])){
		$certificaciones=$_GET['certificaciones'];
	}else{
		$certificaciones="";
	}
	if(isset($_GET['experiencia'])){
		$experiencia=$_GET['experiencia'];
	}else{
		$experiencia="";
	}
	if(isset($_GET['fechaIngreso'])){
		$fechaIngreso=$_GET['fechaIngreso'];
	}else{
		$fechaIngreso="";
	}
	if(isset($_GET['nivelesImpartidos'])){
		$nivelesImpartidos=$_GET['nivelesImpartidos'];
	}else{
		$nivelesImpartidos="";
	}
	if(isset($_GET['nivelImpartidoActualmente'])){
		$nivelImpartidoActualmente=$_GET['nivelImpartidoActualmente'];
	}else{
		$nivelImpartidoActualmente="";
	}
	if(isset($_GET['periodoLaboral'])){
		$periodoLaboral=$_GET['periodoLaboral'];
	}else{
		$periodoLaboral="";
	}
	if(isset($_GET['estadoLaboral'])){
		$estadoLaboral=$_GET['estadoLaboral'];
		if($estadoLaboral=="1"){
			$activo="selected";
		}
		if($estadoLaboral=="2"){
			$inactivo="selected";
		}
	}else{
		$estadoLaboral="";
	}


	do { ?>
				<tr>
					<td><?php echo $row_busquedaprofesor['matricula']; ?></td>
					<td><?php echo $row_busquedaprofesor['nombre']; ?></td>
					<td><?php echo $row_busquedaprofesor['apellidoPaterno']; ?></td>
					<td><?php echo $row_busquedaprofesor['apellidoMaterno']; ?></td>
					<td><?php echo $row_busquedaprofesor['direccion']; ?></td>
					<td><?php echo $row_busquedaprofesor['telefono']; ?></td>
					<td><?php echo $row_busquedaprofesor['correo']; ?></td>
					<td><?php echo $row_busquedaprofesor['certificaciones']; ?></td>
					<td><?php echo $row_busquedaprofesor['experiencia']; ?></td>
					<td><?php echo $row_busquedaprofesor['fechaIngreso']; ?></td>
					<td><?php echo $row_busquedaprofesor['nivelesImpartidos']; ?></td>
					<td><?php echo $row_busquedaprofesor['nivelImpartidoActualmente']; ?></td> 
					<td><?php echo $row_busquedaprofesor['periodoLaboral']; ?></td>
					<td><?php if ($row_busquedaprofesor['estadoLaboral'] == 1) echo "Activo"; else echo "Inactivo"; ?></td>
				</tr>
				<?php } while ($row_busquedaprofesor = mysql_fetch_assoc($busquedaprofesor)); ?>
			</table>
			<p>&nbsp;</p>   
			<p>  

			<form method="post" name="form1" action="Logica_Modifica_Profesor.php?matricula=<?php echo $matricula;?>">
				<input type="hidden" name="MM_insert" value="form1">
			</form>
			<p>&nbsp;</p>
			</p>
		</section>


	<section>

	</section>


	<footer>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
	</footer>
	</body>
</html>
<?php
	mysql_free_result($busquedaprofesor);

}
else
{
	echo("<script type='text/javascript'> 
		  alert('No existe ninguna sesi\u00F3n abierta, favor de AUTENTIFICARSE'); 
	  	window.location='Salir.php';</script>");	
}
?>