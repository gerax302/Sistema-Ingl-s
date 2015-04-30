<?php 
session_start();
$parametro=$_GET['parametro'];
$idGeneral=$_GET['id'];
$cantidad=$_GET['cantidad'];
$grupo="";

$nivel="";

if(isset($_GET['nivel'])){
$nivel=$_GET['nivel'];
}
if(isset($_GET['grupo'])){
	$grupo=$_GET['grupo'];
}

?>

<?php 
	
	require_once('../Connections/local.php');
	mysql_select_db($database_local, $local);
	$nombre="";
	if (isset($_SESSION["sesion"]))
	{
		$matricula=$_SESSION["sesion"];
		
		$consulta="select * from Profesor where matricula ='".$matricula."'";

$res=mysql_query($consulta, $local);


while($row = @mysql_fetch_array($res))
			{
		$nombre=$row['nombre']."  ".$row['apellidoPaterno']."  ".$row['apellidoMaterno'];
		
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
			<li><a href='DosificacionFormaGeneral.php'><span>Gestión del Curso</span></a></li>
			<li class='has-sub'><a href='#'><span>Ingresar Calificaciones</span></a>
				<ul>
					<li class='has'><a href='Alta_Calificaciones1.php'>Primera Oportunidad </a>
					</li>
					<li class='has'><a href='Alta_Calificaciones2.php'>Segunda Oportunidad </a>
					</li>
				</ul>      
			</li>

			<li class='has-sub'><a href='#'><span>Consultas</span></a>
				<ul>
					<li class='has'><a href='Consulta_Dosificacion.php'>Dosificación General</a>
					</li>
					<li class='has'><a href='Consulta_Dosificacion_Unidad.php'>Dosificación por Unidad</a>
					</li>
					<li class='has'><a href='Consulta_Calificaciones.php'>Calificaciones</a></li>
				</ul>      
			</li>

			<li class='has-sub'><a href='#'><span>Modificar</span></a>
				<ul>
					<li class='has'><a href='Modificar_Dosificacion.php'>Dosificación General</a>
					</li>
					<li class='has'><a href='Modificar_Dosificacion_Unidad.php'>Dosificación por Unidad</a>
					</li>
				</ul>      
			</li>
			<li class='last'><a href='#'><span>Ayuda</span></a></li>
			<li class='last'><a href='Salir.php'><span>Salir</span></a></li>
		</ul>
	</div>
  <!--Fin Menu izq --> 
  <!-- end .sidebar1 --></div>
<h1> <div align="center">Sistema Integral de Inglés</div></h1>
</head>
<body>
<section>
  <h2> <div align="center">Dosificación de Programa por Unidad</div></h2>
  <form method="post" action="Logica_Gestion_Unidad.php?id=<?php echo $idGeneral;?> &parametro=<?php echo $parametro;?>&cantidad=<?php echo $cantidad;?>
  &grupo=<?php echo $grupo;?>" name="form">
    <p>&nbsp;</p>
    <p>&nbsp;</p>

  <h3>CATEDRÁTICO : <?php echo $nombre; ?></h3>
   
    <p>&nbsp;</p>
    <p>&nbsp;</p>

    <table align="center">
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Asignatura:</td>
          <td><input type="text" name="asignatura" value="<?php echo $nivel;?>" size="10" maxlength="2"  required readonly/></td>
          <td>Unidad:</td>
          <td><input type="text" pattern="[0-9]*$"name="unidad" value="<?php echo $cantidad;?>" size="10" maxlength="2" placeholder="Ej. 1" required /><span class="poi">*</span></td>
          <td>Nombre:</td>
          <td><input type="text"  name="nombreUnidad" value="" size="35" placeholder="Ej. What is your name?" required /><span class="poi">*</span></td>
          
        </tr>
        <tr valign="baseline">
          <td align="right" valign="middle" nowrap="nowrap">Objetivo de Aprendizaje:</td>
        <!--<input type="text" name="nombre_completo" value="" size="15" />-->
          
<td colspan="7">          <textarea class="area" cols="95" rows="2" name="objetivoAprendizaje"  required> 
</textarea>
  <span class="poi">*</span></span> </td>
         
        </tr>
        <tr valign="baseline">
          <td  colspan="2"align="right" valign="middle" nowrap="nowrap"><p>Contenido (Temas y Subtemas)</p></td>
       <td  colspan="2" align="center" valign="middle">Estrategias Didácticas</td>
          <td  colspan="3" align="center" valign="middle">Estrategias de Aprendizaje</td>
      </tr>
      <tr valign="baseline">
          <td colspan="2"align="center" valign="top" nowrap="nowrap"><p> <span class="poi">*</span><textarea name="contenidoTemasSubtemas" class="area" cols="45" rows="15"required> </textarea></p></td>
          
       <td  colspan="2" align="center" valign="top">
       <span class="poi">*</span>
       <textarea name="estrategiasDidacticas" class="area" cols="30" rows="15" required> </textarea>
       </td>
       
          <td  colspan="3" align="center" valign="top">
          <span class="poi">*</span> 
          <textarea name="estrategiasDeAprendizaje" class="area" cols="45" rows="15" required> </textarea>
          </td>
      </tr>
            
        <tr valign="baseline">
          <td colspan="7" align="center" valign="middle"nowrap="nowrap">Desarrollo de Unidad</td>
                  
        </tr>
        <tr valign="baseline">
          <td colspan="2" align="center" valign="middle"nowrap="nowrap">No. Horas</td>
          <td colspan="2" align="center" valign="middle">Inicio</td>
          <td colspan="3" align="center" valign="middle">Termino</td>
         
      </tr>
        <tr valign="baseline">
          <td colspan="2" align="center" valign="middle"nowrap="nowrap">
          <input type="text" pattern="[0-9]*$" name="noHoras" value="" size="10" maxlength="10" placeholder="Ej. 12" required /> <span class="poi">*</span>
          </td>
          
          <td colspan="2" align="center" valign="middle"><input type="date"name="inicio" id="inicial" required /><span class="poi">*</span></td>
          <td colspan="3" align="center" valign="middle"><input type="date"name="termino" id="termino" required  onChange="date_click()" /><span class="poi">*</span></td>
         
        </tr>
        <tr>
         <td  align="right" valign="middle">
         Evaluación:
         </td>
         <td colspan="5">
          <textarea class="area" cols="95" rows="2" name="evaluacion" required></textarea><span class="poi">*</span>
         </td>
      </tr>
      <tr>
         <td  align="right" valign="middle">
         Prácticas / Visitas: 
         </td>
         <td colspan="5">
          <textarea class="area" cols="95" rows="2" name="practicasVisitas" required> </textarea><span class="poi">*</span>
        </td>
      </tr>
      </table>

    <p>&nbsp;</p>
    <p>&nbsp;</p>

    
    <table align="center">
    <tr valign="baseline">
      <td width="533"  colspan="3" align="center" valign="middle">Recursos Didácticos</td>
      <td width="533"  colspan="3" align="center" valign="middle">Fuentes de Información</td>
      
    </tr>
    
   <tr valign="baseline">
      <td  colspan="3" width="533">
      <span class="poi">*</span>
       <textarea  class="area" cols="65"rows="10" name="recursosDidacticos" required>
</textarea>
      </td>
      <td width="533"  colspan="3" ><textarea  class="area" cols="70" rows="10" name="fuentesDeInformacion" required> 
        </textarea></td>
      
    </tr>
    
     <style>
		textarea.area
		{
			resize:none;
		}
	</style>
    
    </table>
    
 
    
    <table width="200" border="0" align="center">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>     <input name="Guardar" type="submit" value="Guardar"></td>
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
function date_click()
{

//var fechaInicio=document.getElementById('incio').value;
//var fechaTermino=document.getElementById('termino').value;

var diferencia=Date.parse(document.getElementById('termino').value)
-Date.parse(document.getElementById('inicial').value);
	

if(diferencia<0){
	
	alert("La fecha de termino no puede ser menor a la fecha de inicio");
}

}
</script>

</p>
</section>

<section>

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
?>