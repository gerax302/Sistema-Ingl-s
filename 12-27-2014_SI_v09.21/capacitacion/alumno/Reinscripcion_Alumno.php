<?php
	session_start();
	require_once('../Connections/local.php');
	mysql_select_db($database_local, $local);
	
	$nivelillo="";
	$bandera=0;
	$tabla1="";
	$tabla2="";
	$parametroIgualador="";
	
  if (isset($_SESSION["sesion"]))
  {
    //CREAR VARIABLE DE SESIÓN
    $numeroControl = ($_SESSION['sesion']);
    $consultaNombre="select nombre from Alumno where NoControl ='".$numeroControl."'";
    $respuesta=mysql_query($consultaNombre,$local);
    $row=mysql_fetch_array($respuesta);
    $nombre=$row['nombre']; 
	
	///Empieza el codigo fuerte para buscar si esta inscrito al menos una vez 
	$buscarAlumno= "SELECT * FROM `ingles`.`alumno`
   WHERE `alumno`.`NoControl`="."'".$numeroControl."'" ;
   
   $buscandoAlumno = mysql_query($buscarAlumno,  $local);
   
   while($row = @mysql_fetch_array($buscandoAlumno))
			{
				$bandera=$bandera+1;
				$tabla1=$row['idGrupo'];
			}
			
			$buscarAlumno1= "SELECT * FROM `ingles`.`reinscripcion`
   WHERE `reinscripcion`.`NoControl`="."'".$numeroControl."'" ;
   
   $buscandoAlumno1 = mysql_query($buscarAlumno1,  $local);
   
   while($row = @mysql_fetch_array($buscandoAlumno1))
			{
				$bandera=$bandera+1;
				$tabla2=$row['idGrupo'];
			}
			
			
	if($bandera==1){
		$parametroIgualador=$tabla1;
	}else if($bandera>1){
		$parametroIgualador=$tabla2;
	}
   
		
	//SE REALIZA LA CONSULTA DEL NUMERO DE CONTROL MEDIANTE EL  NOMBRE Y CONTRASEÑA DEL USUARIO LOGEADO
	
	
	
	$i=0;
	$nivelillo[]="Ingles I";
	$nivelillo[]="Ingles II";
	$nivelillo[]="Ingles III";
	$nivelillo[]="Ingles IV";
	$nivelillo[]="Ingles V";
	$nivelillo[]="Ingles VI";
	$nivelillo[]="Certificacion";
	
	$N = count($nivelillo);
	  $ultima="";
	  $parametro="";
	  $buscarNivel= "SELECT * from  calificaciones where idCalificaciones=
		'".$numeroControl.$parametroIgualador."'";

				$buscandoNiveles = mysql_query($buscarNivel,  $local);
				while($row = mysql_fetch_array($buscandoNiveles))
				  {	
				  if($row['unidad1']!="NA" & $row['unidad2']!="NA" &$row['unidad3']!="NA"
					&$row['unidad4']!="NA" & $row['unidad5']!="NA" &$row['unidad6']!="NA"
					&$row['unidad7']!="NA" & $row['unidad8']!="NA" ){
				  		for($i=0; $i < $N; $i++)
	    				{   
							if($row['nivelAlumno']==$nivelillo[$i]){
							$ultima=$nivelillo[$i+1];
							$parametro=$nivelillo[$i+1];
						    }
					    }
								
				   }else{
					   
					   $ultima=$row['nivelAlumno']."  (Repeticion)";
					   $parametro=$nivelillo[$i];
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
<script src="../profesores/script.js"></script>
<header>
  <p>&nbsp;</p>
  <p></p>
 </header>
<div class="sidebar1"> 
  <!--Inicio Menu izq -->
	<div id='cssmenu'>
		<ul>
			<li><a href='Inicio.php'><span>Inicio</span></a></li>
			<li><a href='Reinscripcion_Alumno.php'><span>Reinscripción</span></a></li>
			<li class='last'><a href='Modificar_Alumno.php'><span>Modificar</span></a></li>
			<li class='last'><a href='Alumno_Calificaciones.php'><span>Calificaciones</span></a></li>
			<li class='last'><a href='#'><span>Ayuda</span></a></li>
			<li class='last'><a href='Salir.php'><span>Salir</span></a></li>
		</ul>
	</div>
  <!--Fin Menu izq --> 
  <!-- end .sidebar1 --></div>
<h1> <div align="center">Sistema Integral de Inglés</div></h1>

<body>
<section>
  <h2> <div align="center">Reinscripción Alumno </div></h2> 
  <form method="post" name="form1" action="Logica_Reinscripcion_Alumno.php">
    <table align="center"> 
            
      <tr valign="baseline">
        <td nowrap align="right">Número de Control:</td>
        <td><input type="text" name="numeroControl" value="<?php echo $numeroControl; ?>" readonly /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Nivel:</td>
        <td><select name="niveles" id="select">
        
        <?php 
        $buscarNivel= "SELECT * from  nivel where nivelIngles='$parametro' and estadoNivel='Activo'";

												$buscandoNiveles = mysql_query($buscarNivel,  $local);
												
												while($row = mysql_fetch_array($buscandoNiveles))
												{
													?>
													<option value="0" id="0">
												------
											<option value=" <?php echo $row['nivelIngles'];?>" id="0">
                                            <?php echo $row['nivelIngles'];?>
												</select>
													<?php
												}
                                                ?>
											
											
        <span class="poi">*</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Forma de Pago:</td>
        <td><select name="formatoPago" id="formatoPago" onChange="Inhabilita()">
        <option value="0" id="0">
                ------
        <option value="1" id="1">
                Pagado
        <option value="2" id="2">
                Prórroga
        </select> <span class="poi">*</span></td></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Número de Recibo:</td>
        <td><input type="text" id="noRecibo" name="noRecibo" value="" size="32" maxlength="300" placeholder="Ej. 1233123" disabled="true" required></td>
      </tr>
       <tr valign="baseline">
        <td nowrap align="right">Fecha Límite:</td>
        <td><input type="date" id="fechaLimite" name="fechaLimite" value="" size="32" maxlength="300" placeholder="Ej. TOEIC, etc." disa
        disabled="true" required></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td><input type="submit" value="Guardar" onClick="comboRayitas()"></td>
      </tr>
      <tr valign="baseline">
         <td nowrap align="right"><span class="poi">* Campos Obligatorios</span></td>
		  
      </tr>
          <p>&nbsp;</p>
  	            <p>&nbsp;</p>     
    </table>
    <input type="hidden" name="MM_insert" value="form1">
  </form>
  <p>&nbsp;</p>
  
</p>
</section>

<p>&nbsp; </p> 
<p>&nbsp; </p>
<p>&nbsp; </p>
<section>

</section>


<!-- CÓDIGO PARA LA VERIFICACION DE LOS CAMPOS FORMA DE PAGO Y PAGADO-->
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


<?php 
// ESTA LLAVE CIERRA EL CICLO WHILE QUE SE EJECUTA AL INICIO 
}
?>

<section>
<p>&nbsp;</p>
  <p>&nbsp;</p>

</section>

<footer>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</footer>
</body>
</html>