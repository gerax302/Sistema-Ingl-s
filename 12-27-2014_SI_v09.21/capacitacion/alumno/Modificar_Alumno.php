<?php 
	session_start();
	require_once('../Connections/local.php');
	mysql_select_db($database_local, $local);
	
	if (isset($_SESSION["sesion"]))
	{
		//CREAR VARIABLE DE SESIÓN
        $numeroControl = ($_SESSION['sesion']);
		$consultaNombre="select nombre from Alumno where NoControl ='".$numeroControl."'";
		$respuesta=mysql_query($consultaNombre,$local);
		$row=mysql_fetch_array($respuesta);
		$nombre=$row['nombre'];	
	
	//SE REALIZA LA CONSULTA A LA DB DE ACUERDO AL NOMBRE  CONTRASEÑA DEL USUARIO LOGEADO
	$buscarAlumno= "SELECT *  
	FROM `ingles`.`alumno`
	WHERE `alumno`.`NoControl`="."'".$numeroControl."'" ;
	
	$buscandoAlumno = mysql_query($buscarAlumno,  $local);
	
	$i=0;
	while($row = mysql_fetch_array($buscandoAlumno))
	{
				$i=$i+1;

	if (isset($_SESSION["sesion"]))
	{

?>


<!--Inicia codigo html-->
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
  <h2> <div align="center">Modificar Alumno </div></h2>

    
    <!--INICIA EL FORMULARIO DONDE SE MOSTRARAN LOS DATOS PERSONALES DEL USUARIO LOGEADO-->
  <form method="post" name="form1" action="Logica_Modificar_Alumno.php">
    
    
    <table align="center">
    <tr>
    <td>
   <!-- <input type='file' id="imagenNueva" align="left" />-->
    </td>
  <!-- <img src="imagenes/usuario_1.jpg" id="imagen" width="150" height="160" alt="" onMouseOver="cambiaImagen()" onMouseOut="fueraImagen()">-->
    </tr>
    
    <?php 
	  $masculino="";
	  $femenino="";
	  $vacia="";
	  $escolarizado="";
	  $semiEscolarizadoTlaltenango="";
	  $semiEscolarizadoTeul="";
	  $externo="";
	  $nivel="";
	  
	  $sistemas="";
	  $electro="";
	  $gestion="";
	  $admin="";
	  $conta="";
	  
	  $cancionFavorita="";
	  $nacimientoDeMadre="";
	  $nombreAmigoInfancia="";
	  $nombrePrimeraMascota="";
	  $primerTrabajo="";

	/*COMENTE ESTE BLOQUE DE BUSQUEDA YA QUE NO EXISTE EL CAMPO NIVEL EN LA TABLA ALUMNO*/
	  //BUSQUEDA EN LA  DB EL NIVEL DE INGLES IMPARTIDO Y SE GUARDA EN UNA VARIABLE 
		/*
	  if($row['nivel']==0){
         $nivel="-----";
	  }else if($row['nivel']==1 ){
         $nivel="Inglés I";
	  }
	  else if($row['nivel']==2 ){
         $nivel="Inglés II";
		
	  }
	  else if($row['nivel']==3 ){
         $nivel="Inglés III";
	  }
	  else if($row['nivel']==4 ){
         $nivel="Inglés IV";
	  }
	   else if($row['nivel']==5 ){
         $nivel="Inglés V";
	  }
	   else if($row['nivel']==6 ){
         $nivel="Inglés VI";
	  }
	  else if($row['nivel']==7 ){
         $nivel="Certificación";
	  }
	  */
	    
  	  //BUSQUEDA EN LA  DB EL SEXO DEL ALUMNO SE GUARDA EN UNA VARIABLE 
  	  if ($row['sexo']=="1"){
		  $masculino="selected";
	  }else{
		  $femenino="selected";
	  }
		  
	  //BUSQUEDA EN LA  DB EL NIVEL DE INGLES IMPARTIDO SE GUARDA EN UNA VARIABLE 
      if ($row['planEstudios']=="0")
	  {
		  $vacia="selected";
	  } 
	  else if ($row['planEstudios']=="1")
	  {
		  $escolarizado="selected";
	  }
	  else if ($row['planEstudios']=="2")
	  {
		  $semiEscolarizadoTlaltenango="selected";
	  }
	  else if ($row['planEstudios']=="3")
	  {
		  $semiEscolarizadoTeul="selected";
	  }
	  else if ($row['planEstudios']=="4")
	  {
		  $externo="selected";
	  }

	  //SE GUARDA EN UNA VARIABLE DE ACUERDO A LA DB LA CARRERA DEL ALUMNO
		if ($row['carrera']=="Ingeniería en Sistemas Computacionales")
		{
		    $sistemas="selected";
	  	}
		else if($row['carrera']=="Ingeniería en Electromecánica")
		{
		    $electro="selected";
		}	
		else if($row['carrera']=="Ingeniería en Gestión Empresarial")
		{
		    $gestion="selected";
		}
		else if($row['carrera']=="Ingeniería en Administración")
		{
		   $admin="selected";
		}
		else if($row['carrera']=="Contador Público")
		{		
		   $conta="selected";
		}
		
	  //SE GUARDA EN UNA VARIABLE DE ACUERDO A LA DB LA PREGUNTA DE SEGURIDAD DEL ALUMNO
		if ($row['preguntaSeguridad']=="¿Cuál es el nombre de tu canción favorita?")
		{
		   $cancionFavorita="selected";
	  	}
		else if($row['preguntaSeguridad']=="¿Cuál es el lugar de nacimiento de tu madre?")
		{
		   $nacimientoDeMadre="selected";
		}
		else if($row['preguntaSeguridad']=="¿Cuál es el nombre de tu mejor amigo de la infancia?")
		{
		   $nombreAmigoInfancia="selected";
		}
		else if($row['preguntaSeguridad']=="¿Cuál es el nombre de tu primer mascota?")
		{
		   $nombrePrimeraMascota="selected";
		}
		else if($row['preguntaSeguridad']=="¿Cuál fué tu primer trabajo?")
		{
		   $primerTrabajo="selected";
		}
	  
	?>
    
    
 <tr valign="baseline">  
<td nowrap align="right">Número de Control:</td>
  <td>   <input type="text" name="ncontrol" value="<?php echo $row['NoControl']; ?>" readonly /> </td>
</tr>

<tr valign="baseline">
  <td nowrap align="right">Nombre:</td>
  <td>
  <input type="text" title="El Nombre no debe llevar signos o números" pattern="[a-z| A-Z | | áéíóúñÁÉÍÓÚÑ]*$" name="nombre" value="<?php echo $row['nombre']; ?>" size="32" maxlength="45" required>
  </td>
</tr>

<tr valign="baseline">
  <td nowrap align="right">Apellido Paterno:</td>
  <td><input type="text" title="El Apellido Paterno no debe llevar signos o números" pattern="[a-z| A-Z| áéíóúñÁÉÍÓÚ]*$" name="apellidoPaterno" value="<?php echo $row['apellidoPaterno']; ?>" size="32" maxlength="45" required>
  </td>
</tr>

<tr valign="baseline">
  <td nowrap align="right">Apellido Materno:</td>
  <td><input type="text" title="El Apellido Materno no debe llevar signos o números" pattern="[a-z| A-Z| áéíóúñÁÉÍÓÚÑ]*$" name="apellidoMaterno" value="<?php echo $row['apellidoMaterno']; ?>" size="32" maxlength="45" required></td>
</tr>

<tr valign="baseline">
  <td nowrap align="right">Dirección:</td>
  <td><input type="text" pattern="[a-z|A-Z|0-9|"."|áéíóúñÁÉÍÓÚÑ]*$" name="domicilio" value="<?php echo $row['domicilio']; ?>" size="32" maxlength="45" required></td>
</tr>

<tr valign="baseline">
  <td nowrap align="right">Teléfono:</td>
  <td><input type="text" title="El teléfono debe contener 10 dígitos." pattern="[0-9]{10}$" name="telefono" value="<?php echo $row['telefono']; ?>" size="32" maxlength="10" required></td>
</tr>

<tr valign="baseline">
  <td nowrap align="right">Correo:</td>
  <td><input type="email" name="correo" value="<?php echo $row['correo']; ?>" size="32" maxlength="45" required></td>
</tr>

<tr valign="baseline">
  <td nowrap align="right">Edad:</td>
  <td><input title="El campo Edad esta vacio o tiene letras" type="text" pattern="[0-9]*$" name="edad" value="<?php echo $row['edad']; ?>" size="32" maxlength="3" required></td>
</tr>

<tr valign="baseline">
  <td nowrap align="right">Nivel:</td>
  <td><!--<select name="nivel" id="select">
    <option value="0" id="0"> ------
      <option value="1" id="1"> Ingles I
        <option value="2" id="2"> Ingles II
          <option value="3" id="3"> Ingles III
            <option value="4" id="4"> Ingles IV
            <option value="5" id="5"> Ingles V
            <option value="6" id="6"> Ingles VI      
            <option value="7" id="7"> Certificación                   
            </select>-->
            <input name="nivel" type="text"  id="nivel" value="<?php echo $nivel; ?>" size="10"  readonly />
            
     </td>
</tr>

<tr valign="baseline">
 <td nowrap align="right">Género:</td>
  <td><select name="genero" id="select">
    <option value="0" id="0" > ----- </option>
      <option value="1" id="1" <?php echo $masculino; ?> > Masculino</option>
        <option value="2" id="2"<?php echo $femenino; ?> > Femenino</option>
        </select>   
  </td>
</tr>

<tr valign="baseline">
  <td nowrap align="right">Plan de Estudios:</td>
  <td><select name="planEstudios" id="select">
    <option value="0" id="0" <?php echo $vacia; ?>> -----</option>
      <option value="1" id="1" <?php echo $escolarizado; ?>> Escolarizado</option>
        <option value="2" id="2" <?php echo $semiEscolarizadoTlaltenango; ?>> Semi-escolarizado Tlaltenango</option>
          <option value="3" id="3" <?php echo $semiEscolarizadoTeul; ?> > Semi-escolarizado Teúl</option>
            <option value="4" id="4" <?php echo $externo; ?>> Externo </option>
            </select></td>
</tr>

 <tr valign="baseline">
        <td nowrap align="right">Carrera:</td>
        <td><select name="carrera" id="carrera" >
         <option > -----</option>
          <option <?php echo $sistemas; ?>>Ingeniería en Sistemas Computacionales</option>
          <option <?php echo $electro; ?>>Ingeniería en Electromecánica</option>
          <option <?php echo $gestion; ?>>Ingeniería en Gestión Empresarial</option>
          <option <?php echo $admin; ?>>Ingeniería en Administración</option>
          <option <?php echo $conta; ?>>Contador Público</option>
           
        </select> 
        </td>
        </td>
      </tr>
      
      
<tr valign="baseline">
  <td nowrap align="right">Pregunta de Seguridad:</td>
  <td><select name="preguntaSeguridad" id="preguntaSeguridad">
    <option > -----</option>
      <option  <?php echo $cancionFavorita; ?>>¿Cuál es el nombre de tu canción favorita?</option>
        <option  <?php echo $nacimientoDeMadre; ?>>¿Cuál es el lugar de nacimiento de tu madre?</option>
          <option  <?php echo $nombreAmigoInfancia; ?> >¿Cuál es el nombre de tu mejor amigo de la infancia?</option>
            <option  <?php echo $nombrePrimeraMascota; ?>>¿Cuál es el nombre de tu primer mascota?   </option>
	|          <option <?php echo $primerTrabajo; ?>>¿Cuál fué tu primer trabajo?</option>
            </select></td>
</tr>

<tr valign="baseline">
  <td nowrap align="right">Respuesta de Seguridad:</td>
  <td><input title="El campo Respuesta de Seguridad esta vacio" type="text" pattern="[a-z|A-Z|0-9|"."|áéíóúñÁÉÍÓÚÑ]*$" name="respuestaSeguridad" value="<?php echo $row['respuestaSeguridad']; ?>" size="32" maxlength="50" required></td>
</tr>


<tr valign="baseline">
  <td nowrap align="right">&nbsp;</td>
  <td>	<!--<input type="submit" value="Guardar" onClick="habilita()">-->
  <input type="submit" name="boton_guardarFondo" id="boton_guardarFondo" value="Guardar"  />
              <?php
#AQUI SE HACE MENCION AL JAVASCRIPT PARA PODER GUARDAR LA IMAGEN NUEVA Y LOS DATOS DEL ALUMNO ACTUALIZADO 
			  
	/*				if (isset($_POST['boton_guardarFondo'])) {
						require('foto.php');
						GuardarFoto();
						require('Logica_Modificar_Alumno.php');
						GuardarAlumno();
					}*/
                ?>
  
  </td>
</tr>
</table>

    <input type="hidden" name="MM_insert" value="form1">
  </form>

</section>

<section>

</section>
<p>&nbsp;</p>

<!--java script-->

<footer>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</footer>
</body>


<script>

function habilita(){
	document.getElementById('nivel').disabled=false;
}
</script>
</html>


<?php
}
else {
echo("<script type='text/javascript'> 
    alert('No existe ninguna sesi\u00F3n abierta, favor de AUTENTIFICARSE'); 
  	window.location='Salir.php';</script>");
}
}
}
?>


