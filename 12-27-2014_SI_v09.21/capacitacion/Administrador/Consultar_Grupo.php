<?php 
	session_start();
	require_once('../Connections/local.php');
	mysql_select_db($database_local, $local);
	$idGrupo="";
	if (isset($_SESSION["sesion"]))
	{
		$nombre = ($_SESSION['sesion']);
		if(isset($_GET['idgrupo'])){
			$idGrupo=$_GET['idgrupo'];
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
			<h2> <div align="center">Consultar Grupo</div></h2>
			<form method="post" name="form" action="Logica_Consultar_Grupo.php">
				<p>&nbsp;</p>


				<table align="center">
					<tr valign="baseline">
						<td colspan="1" align="center">&nbsp;</td>
						<td colspan="1" align="center">&nbsp;</td>
						<td colspan="2" align="center">Buscar Grupo</td>

						<td colspan="1" align="center">&nbsp;</td>


					</tr>
					<tr valign="baseline">
						<td colspan="2" >&nbsp;</td>

						<td colspan="2" align="center">
							<select name="niveles" id="niveles" onChange="tomaId()">
								<option name="Rayitas" value="Rayitas" > ------ </option>
								<?php
	$valorIndex="";
	$buscarNivel= "SELECT * from  grupo, nivel where grupo.nivel_idnivel=nivel.idnivel";

	$buscandoNiveles = mysql_query($buscarNivel,  $local);
	$nivelSeleccionado="";


	$i=1;
	while($row = mysql_fetch_array($buscandoNiveles))
	{

								?>

								<option value="<?php echo $row['idGrupo'];?>" id="<?php echo $row['nombreGrupo'];?>">
									<?php echo $row['nivelIngles']."  ".$row['nombreGrupo']; ?>

									<?php
		$i=$i+1;
	}

									?>
							</select>
						</td>

						<td colspan="2" >&nbsp;</td>
					</tr>

					</tr>
				<tr valign="baseline">
					<td colspan="10" align="center" >
						<p>&nbsp;</p>

						<input type="submit" name="Consultar" id="Consultar" value="Consultar" />


					</td>
				</tr>
				<tr>
					<td>
					</td>
				</tr>

				</table>
			<input type="text" name="idgrupo" id="idgrupo"  hidden>

			</form>
		<form method="post" name="form1" action="Guardar_Alumno_Grupo.php?idNivel=<?php echo  $variableIdNivel; ?>">
			<p>&nbsp;</p>
			<div class="CSSTableGenerator" >
				<table align="center" width="70%" border="1" cellspacing="1" cellpadding="1">
					<tr>
						<td align="center">No.Control</td>
						<td align="center">Nombre    </td>
						<td align="center">Apellido Paterno</td>
						<td align="center">Apellido Materno</td> 
						<td align="center">Carrera </td>
						<td align="center">Correo</td>      
					</tr>

					<?php




	$buscar="";
	$buscando="";
	$variableIdNivel="";
	$noControl="";



	$buscar= "SELECT * from  alumno where idGrupo='".$idGrupo."'";
	$buscando = mysql_query($buscar,  $local);


	$nivelSeleccionado="";


	$i=1;
	while($row = mysql_fetch_array($buscando))
	{
		$noControl=$row["NoControl"];
					?>
					<tr>
						<td align="center"><input type="text" name="eti1" id="<?php echo "a".$i;?>"
												  value="<?php echo $noControl; ?>" readonly></td>
						<td align="center"><input type="text" name="eti2" id="<?php echo "b".$i;?>"
												  value="<?php echo $row["nombre"]; ?>" readonly></td>
						<td align="center"><input type="text" name="eti3" id="<?php echo "c".$i;?>"
												  value="<?php echo $row["apellidoPaterno"]; ?>" readonly></td>
						<td align="center"><input type="text" name="eti4" id="<?php echo "d".$i;?>"
												  value="<?php echo $row["apellidoMaterno"]; ?>" readonly></td> 
						<td align="center"><input type="text" name="eti5" id="<?php echo "e".$i;?>"
												  value="<?php echo $row["carrera"];?>" size="40" readonly> </td>
						<td align="center"><input type="text" name="eti5" id="<?php echo "e".$i;?>"
												  value="<?php echo $row["correo"];?>" readonly> </td>

					</tr>
					<?php
		$i=$i+1;
	}

					?>

				</table>
				<p>&nbsp;</p>
				<p>&nbsp;</p>


				<table align="center">
					<tr valign="baseline">

					</tr>
				</table>
			</div>

			<table width="200" border="0" align="center">
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
			function tomaId()
			{
				document.getElementById('idgrupo').value=document.getElementById('niveles').value;
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