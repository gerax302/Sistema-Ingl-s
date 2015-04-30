<?php 
	session_start();
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
<h1>
  <div align="center">Sistema Integral de Inglés</div>
</h1>
</head>
<body>
<section>
  <h2>
    <div align="center">Dosificación del Programa</div>
  </h2>
  <form method="post" name="form" action="Logica_Gestion_General.php">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <h3>CATEDRÁTICO:<?php echo $nombre;?></h3>
    <p>&nbsp;</p>
    <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td>C&oacute;digo:</td>
        <td><input type="text" name="codigo" value="" size="10" placeholder="Ej. COD1" required />
          <span class="poi"><span class="poi">*</span></span></td>
        <td>Revisi&oacute;n: </td>
        <td><input type="text" pattern="[0-9]*$" name="revision" value="" size="5" placeholder="Ej. 2" required/>
          <span class="poi">*</span></td>
        <td>Fecha:</td>
        <td><input type="date" name="fecha" required>
          <span class="poi">*</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Responsable: </td>
        <td colspan="3"><input name="responsable" id="responsable" pattern="[a-z| A-Z | | áéíóúñÁÉÍÓÚÑ]*$" type="text"  size="30" required value="<?php echo $nombre;?>" readonly ></td>
        <!-- <td colspan="3">Subdirección Académica</td> --> 
        
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="1036" align="center">
      <tr valign="baseline">
        <td width="276" align="right" nowrap="nowrap">Asignatura:</td>
        <td width="214"><select name="grupos" id="grupos1" onChange="colocaGrupo()" >
            <option name="Rayitas" value="Rayitas" > ------ </option>
            <?php
$valorIndex="";
        $buscarNivel= "SELECT * from  nivel,grupo where  grupo.profesor_matricula='".$matricula."' and nivel.idnivel=grupo.nivel_idnivel";
	
	$buscandoNiveles = mysql_query($buscarNivel,  $local);
	$nivelSeleccionado="";

	$var="";
	$grupillo="";
	$nivelillo="";
	$yaesta="";
	$i=1;
	while($row = mysql_fetch_array($buscandoNiveles))
	{
		
	?>
    <?php
	$buscarDosificacion= "SELECT * from dosificaciongeneral where asignatura!=''
	and grupo!='' ";
	$buscandoDosificacion = mysql_query($buscarDosificacion,  $local);
	$grupillo=$row['nombreGrupo'];
	$nivelillo=$row['nivelIngles'];
	
	while($row = mysql_fetch_array($buscandoDosificacion))
	{
		
   	if($row['asignatura'].$row['grupo']==$nivelillo.$grupillo){
		
   				$yaesta=$row['asignatura'].$row['grupo'];
		
		}
			
		
	}
	  if($nivelillo.$grupillo!=$yaesta){
		   $var="no tengo nada";
	?>
  
            <option value="<?php echo $grupillo;?>" id="<?php echo $nivelillo;?>"> <?php echo $nivelillo."  ".$grupillo;?>
          
         
            <?php
	  }
		$i=$i+1;
	}
	
		?>
          </select>
          <span class="poi">*</span></td>
        <td width="34">HT:</td>
        <td width="122"><input type="text" pattern="[0-9]*$" name="horasTeoricas" value="0" size="10" maxlength="11" id="ht" required onChange="suma()"/>
          <span class="poi" >*</span></td>
        <td width="37">HP:</td>
        <td width="120"><input type="text" pattern="[0-9]*$" name="horasPracticas" value="0" size="10" maxlength="11" id="hp" required onChange="suma()"/>
          <span class="poi" >*</span></td>
        <td width="55" align="right">C:</td>
        <td width="142"><input type="text" pattern="[0-9]*$" name="creditos" value="" size="10" maxlength="11" id="creditos" required  readonly /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Período:</td>
        <td colspan="5"><select name="periodos" id="periodo1" onChange="colocaAnio()" >
            <option name="Rayitas" value="Rayitas" > ------ </option>
            <?php
$valorIndex="";
        $buscarNivel= "SELECT * from  nivel,grupo where  grupo.profesor_matricula='".$matricula."' and nivel.idnivel=grupo.nivel_idnivel";
	
	$buscandoNiveles = mysql_query($buscarNivel,  $local);
	$nivelSeleccionado="";

	
	$i=1;
	while($row = mysql_fetch_array($buscandoNiveles))
	{
	if($i==1){	
	?>
            <option  value="<?php echo $row['anio'];?>" id="<?php echo $row['periodo'];?>" > <?php echo $row['periodo'];?>
            <?php
	}
		$i=$i+1;
	}
	
		?>
          </select>
          -
          <input type="text" pattern="[0-9]{4}$" name="anio" id="anio1" size="10" readonly />
          <span class="poi">*</span></td>
        <td>Grupo:</td>
        <td><input type="text" name="grupo" id="g1"  size="10" readonly>
          <span class="poi">*</span></td>
      </tr>
      
        <td>&nbsp; </td>
      <tr valign="baseline">
        <td align="right" valign="middle" nowrap="nowrap"><p> Objetivo del Curso: <span class="poi">*</span></p></td>
        <!--<input type="text" name="nombre_completo" value="" size="15" />-->
        
        <td colspan="7"><textarea class="area" cols="95" rows="5" name="objetivoDelCurso" placeholder="Ej. Preparar a los estudiantes en el uso de adjetivos calificativos." required> 
</textarea>
      </td>
      </tr>
      
        <td >&nbsp; </td>
      <tr valign="baseline">
        <td align="right" valign="middle" nowrap="nowrap"><p> Aportaci&oacute;n del Curso al </p>
        <p>Perfil Profesional: <span class="poi">*</span> </p></td>
        <td colspan="7">
        <textarea class="area"  cols="95" rows="5" name="aportacionDelCurso"  placeholder="Ej. Desarrollar  las habilidades gramaticales en el alumno." required>   
</textarea>
          </td>
      </tr>
      <style>
textarea.area
{
resize:none;
}

</style>
    </table>
    <p>&nbsp;</p>
    <table align="center">
      <tr valign="baseline">
        <td width="533"><table width="711" align="center">
            <tr valign="baseline">
              <td colspan="3" align="center" valign="middle" nowrap="nowrap">Relación con otras asignaturas:</td>
            </tr>
            <tr valign="baseline">
              <td colspan="2" nowrap="nowrap" align="center">Temas: </td>
              <td width="228" align="center">Asignatura:</td>
            </tr>
            <tr valign="baseline">
              <td width="108" align="right" nowrap="nowrap">Anteriores </td>
              <td width="181" align="center"><select name="temaAnterior">
                  <option name="ninguna" > Ninguna </option>
                  <option name="inglesI" > Inglés I </option>
                  <option name="inglesII" > Inglés II </option>
                  <option name="inglesIII"> Inglés III </option>
                  <option name="inglesVI" > Inglés IV</option>
                  <option name="inglesV"> Inglés V </option>
                  <option name="inglesVI"> Inglés VI </option>
                  <option name="certificacion"> Certificación </option>
                </select></td>
              <td align="center"><select name="asignaturaAnterior">
                  <option name="ninguna" > Ninguna </option>
                  <option name="inglesI" > Inglés I </option>
                  <option name="inglesII" > Inglés II </option>
                  <option name="inglesIII"> Inglés III </option>
                  <option name="inglesVI" > Inglés IV</option>
                  <option name="inglesV"> Inglés V </option>
                  <option name="inglesVI"> Inglés VI </option>
                  <option name="certificacion"> Certificación </option>
                </select></td>
            </tr>
            <tr valign="baseline">
              <td height="27" align="right" nowrap="nowrap">Posteriores</td>
              <td align="center"><select name="temaPosterior">
                  <option name="ninguna" > Ninguna </option>
                  <option name="inglesI" > Inglés I </option>
                  <option name="inglesII" > Inglés II </option>
                  <option name="inglesIII"> Inglés III </option>
                  <option name="inglesVI" > Inglés IV</option>
                  <option name="inglesV"> Inglés V </option>
                  <option name="inglesVI"> Inglés VI </option>
                  <option name="certificacion"> Certificación </option>
                </select></td>
              <td align="center"><select name="asignaturaPosterior">
                  <option name="ninguna" > Ninguna </option>
                  <option name="inglesI" > Inglés I </option>
                  <option name="inglesII" > Inglés II </option>
                  <option name="inglesIII"> Inglés III </option>
                  <option name="inglesVI" > Inglés IV</option>
                  <option name="inglesV"> Inglés V </option>
                  <option name="inglesVI"> Inglés VI </option>
                  <option name="certificacion"> Certificación </option>
                </select></td>
            </tr>
          </table></td>
      </tr>
    </table>
    <table align="center">
      <tr valign="baseline"> </tr>
    </table>
    <table width="200" border="0" align="center">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input name="Guardar" type="submit" value="Guardar" onClick="Deshabilita()"></td>
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
        <td><input type="text" name="trampaNivel" id="tNivel" value="" hidden></td>
        <td><input type="text" name="trampaPeriodo" id="tPeriodo" value=""  hidden></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </form>
  <p>&nbsp;</p>
  </p>
</section>

<script type="text/javascript">
function suma(){
	
	
var num1=parseInt((document.getElementById('ht').value));
var num2=parseInt((document.getElementById('hp').value));

document.getElementById('creditos').value=num1+num2;


}
</script> 
<script type="text/javascript">

function colocaGrupo(){

document.getElementById('g1').value=
document.getElementById('grupos1').value;


if(document.getElementById('grupos1').options[document.getElementById('grupos1').selectedIndex].id=="Ingles I"){
	document.getElementById('tNivel').value=document.getElementById('grupos1').options[document.getElementById('grupos1').selectedIndex].id;
}

if(document.getElementById('grupos1').options[document.getElementById('grupos1').selectedIndex].id=="Ingles II"){
document.getElementById('tNivel').value=document.getElementById('grupos1').options[document.getElementById('grupos1').selectedIndex].id;
}

if(document.getElementById('grupos1').options[document.getElementById('grupos1').selectedIndex].id=="Ingles III"){
document.getElementById('tNivel').value=document.getElementById('grupos1').options[document.getElementById('grupos1').selectedIndex].id;
}

if(document.getElementById('grupos1').options[document.getElementById('grupos1').selectedIndex].id=="Ingles IV"){
document.getElementById('tNivel').value=document.getElementById('grupos1').options[document.getElementById('grupos1').selectedIndex].id;
}

if(document.getElementById('grupos1').options[document.getElementById('grupos1').selectedIndex].id=="Ingles V"){
document.getElementById('tNivel').value=document.getElementById('grupos1').options[document.getElementById('grupos1').selectedIndex].id;
}

if(document.getElementById('grupos1').options[document.getElementById('grupos1').selectedIndex].id=="Ingles VI"){
document.getElementById('tNivel').value=document.getElementById('grupos1').options[document.getElementById('grupos1').selectedIndex].id;
}

if(document.getElementById('grupos1').options[document.getElementById('grupos1').selectedIndex].id=="Certificacion"){
document.getElementById('tNivel').value=document.getElementById('grupos1').options[document.getElementById('grupos1').selectedIndex].id;
}



}

function colocaAnio(){

document.getElementById('anio1').value=
document.getElementById('periodo1').value;



if(document.getElementById('Agosto-Diciembre').id){
document.getElementById('tPeriodo').value=
document.getElementById('Agosto-Diciembre').id;
}
if(document.getElementById('Enero-Junio').id){
document.getElementById('tPeriodo').value=
document.getElementById('Enero-Junio').id;
}

if(document.getElementById('Verano').id){
document.getElementById('tPeriodo').value=
document.getElementById('Verano').id;
}


}



</script>
<section> </section>
<footer>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</footer>
</body>
</html>
<?php 

	}
?>