<?php
	session_start();
	require_once('../Connections/local.php');
	mysql_select_db($database_local, $local);

	if (isset($_SESSION["sesion"]))
	{
		$nombre = ($_SESSION["sesion"]); //la mat
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
			<h2> <div align="center">Modificar Profesor </div></h2>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<form id="form1" name="form1" method="get" action="Modificar_Profesor.php">
				<p>&nbsp;</p>
				<p align="center">
					<label for="buscar">Búsqueda</label>
					<input name="buscar" type="text" id="buscar" size="75" />
					<input type="submit" name="Buscar" id="Buscar" value="Mostrar Resultados" />
				</p>
			</form>
			<div>Su búsqueda
				ha devuelto <?php echo $totalRows_busquedaprofesor ?> resultados:</div>
			<p>&nbsp;</p>
			<table width="95%" border="1" cellspacing="1" cellpadding="1" align="center">
				<tr>
					<th scope="col">Matrícula</th>
					<th scope="col">Nombre</th>
					<th scope="col">Opciones</th>
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
					<td align="center"><?php echo $row_busquedaprofesor['matricula']; ?></td>
					<td align="center"><?php echo $row_busquedaprofesor['nombre']; ?></td>
					<td align="center">
						<a href="Modificar_Profesor.php?matricula=<?php echo $row_busquedaprofesor['matricula']; ?>&nombre=<?php echo $row_busquedaprofesor['nombre']; ?>&apellidoPaterno=<?php echo $row_busquedaprofesor['apellidoPaterno'];?>&apellidoMaterno=<?php echo $row_busquedaprofesor['apellidoMaterno'];?>&direccion=<?php echo $row_busquedaprofesor['direccion'];?>&telefono=<?php echo $row_busquedaprofesor['telefono'];?>&correo=<?php echo $row_busquedaprofesor['correo'];?>&certificaciones=<?php echo $row_busquedaprofesor['certificaciones'];?>&experiencia=<?php echo $row_busquedaprofesor['experiencia'];?>&fechaIngreso= <?php echo $row_busquedaprofesor['fechaIngreso'];?>&nivelesImpartidos=<?php echo $row_busquedaprofesor['nivelesImpartidos'];?>&nivelImpartidoActualmente=<?php echo $row_busquedaprofesor['nivelImpartidoActualmente'];?>&periodoLaboral=<?php echo $row_busquedaprofesor['periodoLaboral'];?>&estadoLaboral=<?php echo $row_busquedaprofesor['estadoLaboral'];?>">Editar</a>
					</td>
				</tr>

				<?php } while ($row_busquedaprofesor = mysql_fetch_assoc($busquedaprofesor)); ?>
			</table>
			<p>&nbsp;</p>
			<p>

			<form method="post" name="form1" action="Logica_Modifica_Profesor.php?matricula=<?php echo $matricula;?>">
				<table align="center" >
					<td width="243">
				<tr valign="baseline">
					<td nowrap align="right">Nombre:</td>
					<td width="188"><input type="text" title="El Nombre no debe llevar signos o números" pattern="[a-z| A-Z | | áéíóúñÁÉÍÓÚÑ]*$" name="nombre" value="<?php echo $nombre; ?>" size="32" required></td>
				</tr>
				<tr valign="baseline">
					<td nowrap align="right">Apellido Paterno:</td>
					<td><input type="text" title="El Apellido Paterno no debe llevar signos o números" pattern="[a-z| A-Z| áéíóúñÁÉÍÓÚÑ]*$" name="apellidoPaterno" value="<?php echo $apellidoPaterno; ?>" size="32" required></td>
				</tr>
				<tr valign="baseline">
					<td nowrap align="right">Apellido Materno:</td>
					<td><input type="text" title="El Apellido Materno no debe llevar signos o números" pattern="[a-z| A-Z| áéíóúñÁÉÍÓÚÑ]*$" name="apellidoMaterno" value="<?php echo $apellidoMaterno; ?>" size="32" required></td>
				</tr>
				<tr valign="baseline">
					<td nowrap align="right">Dirección:</td>
					<td><input type="text"  pattern="[a-z|A-Z|0-9|"."|áéíóúñÁÉÍÓÚÑ]*$" name="direccion" value="<?php echo ($direccion); ?>" size="32" maxlength="45" required></td>
				</tr>
				<tr valign="baseline">
					<td nowrap align="right">Teléfono:</td>
					<td><input type="text" title="El Teléfono debe contener 10 numeros" pattern="[0-9]{10}$" name="telefono" value="<?php echo $telefono; ?>" size="32" maxlength="10" required></td>
				</tr>
				<tr valign="baseline">
					<td nowrap align="right">Correo:</td>
					<td><input type="mail" name="correo" value="<?php echo $correo; ?>" size="32" required></td>
				</tr>
				<tr valign="baseline">
					<td nowrap align="right">Certificaciones:</td>
					<td><input type="text" name="certificaciones" value="<?php echo $certificaciones; ?>" size="32" required></td>
				</tr>
				<tr valign="baseline">
					<td nowrap align="right">Experiencia:</td>
					<td><input type="text" name="experiencia" value="<?php echo $experiencia; ?>" size="32" required></td>
				</tr>
				<tr valign="baseline">
					<td nowrap align="right">Fecha de Ingreso:</td>
					<td><input type="text" id="fechaIngreso" name="fechaIngreso" value="<?php echo $fechaIngreso; ?>" size="10"  disabled="true" required>
						<input type="date" id="fechaModificada" name="fechaModificada" size="10" onChange="date_click()">
					</td>
				</tr>
				<tr valign="baseline">
					<td nowrap align="right">Niveles Impartidos:</td>
					<td><input type="text" name="nivelesImpartidos" value="<?php echo $nivelesImpartidos; ?>" size="32" required></td>
				</tr>
				<tr valign="baseline">
					<td nowrap align="right">Nivel Impartido Actualmente:</td>
					<td><input type="text" name="nivelImpartidoActualmente" value="<?php echo $nivelImpartidoActualmente; ?>" size="32" required></td>
				</tr>
				<tr valign="baseline">
					<td nowrap align="right">Período Laboral:</td>
					<td><input type="text" name="periodoLaboral" value="<?php echo $periodoLaboral; ?>" size="32" required></td>
				</tr>
				<tr valign="baseline">
					<td nowrap align="right">Estado Laboral:</td>
					<td><select name="estadoLaboral" id="select" >

						<option value="1" id="1" <?php echo $activo; ?>>
							Activo

						<option value="2" id="2" <?php echo $inactivo; ?>>
							Inactivo

						</select>
					</td>
				</tr>
				<tr valign="baseline">
					<td nowrap align="right">&nbsp;</td>
					<td><input type="submit" value="Guardar" onClick="enciendeCaja()"></td>
				</tr>
				</table>
			<input type="hidden" name="MM_insert" value="form1">
			</form>
		<p>&nbsp;</p>
		</p>
	</section>

<script type="text/javascript">

	function date_click()
	{
		document.getElementById('fechaIngreso').value=document.getElementById('fechaModificada').value;
		document.getElementById('fechaIngreso').disabled=false;
	}

	function enciendeCaja()
	{
		document.getElementById('fechaIngreso').disabled=false;
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
	mysql_free_result($busquedaprofesor);
}
else
{
	echo("<script type='text/javascript'>
	alert('No existe ninguna sesi\u00F3n abierta, favor de AUTENTIFICARSE');
	window.location='Salir.php';</script>");
}
?>
