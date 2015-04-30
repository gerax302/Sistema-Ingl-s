<?php
	session_start();

	//CONEXION CON LA BASE DE DATOS 
	require_once('../Connections/local.php');
	mysql_select_db($database_local, $local);
	
	if (isset($_SESSION["sesion"]))
		$nombre = ($_SESSION['sesion']);
    
	//SE REALIZA LA CONSULTA PARA LA BUSQUEDA DE NIVELES ACTIVOS
	$selecccionaNiveles= "SELECT  nivelIngles FROM `ingles`.`nivel` where estadoNivel='Activo'";
	
	$buscandoNiveles = mysql_query($selecccionaNiveles,  $local);
	
	//SE REALIZA LA CONSULTA PARA LA BUSQUEDA DE PERIODO POR NIVEL
	$selecccionaPeriodoNivel= "SELECT DISTINCT periodo FROM `ingles`.`nivel`";
	
	$buscandoPeriodoNivel = mysql_query($selecccionaPeriodoNivel,  $local);
	
	//SE REALIZA LA CONSULTA PARA LA BUSQUEDA DE PERIODO POR NIVEL
	$buscaGrupos= "SELECT DISTINCT periodo FROM `ingles`.`nivel`";
	
	$buscandoGrupos = mysql_query($buscaGrupos,  $local);
	
	
    //SE REALIZA LA CONSULTA PARA LA BUSQUEDA DE PERIODO POR NIVEL 
	$selecccionaAñoNivel= "SELECT anio FROM `ingles`.`nivel`";
	
	$buscandoAñoNivel = mysql_query($selecccionaAñoNivel,  $local);
	
     $rowAnio = mysql_fetch_assoc($buscandoAñoNivel);
	//SE REALIZA LA CONSULTA PARA LA BUSQUEDA DE PROFESOR NOMBRE
	$selecccionaProfesor= "SELECT nombre FROM `ingles`.`profesor`";
	
	$buscandoProfesor = mysql_query($selecccionaProfesor,  $local);
	
	//SE REALIZA LA CONSULTA PARA LA BUSQUEDA DE PROFESOR MATRICULA
	$selecccionaProfesorMatricula= "SELECT matricula FROM `ingles`.`profesor`";
	
	$buscandoProfesorMatricula = mysql_query($selecccionaProfesorMatricula,  $local);

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
  <h2> <div align="center">Nuevo Grupo</div></h2>
  <p>  
   <form method="post" name="form1" action="Logica_Nuevo_Grupo.php">
   
    <div class="CSSTableGenerator" >
    <table align="center">
      <tr valign="baseline">
        <td nowrap align="right">Nivel:</td>
        <td>
          <select name="nivel" style="width:154px"> 
			<option >----- </option> 
              <?php 
        	  $nivel="";
			  $iNivel=0;
              while ($rowNivel = mysql_fetch_assoc($buscandoNiveles)) 
              { 
			  	  //BUSQUEDA EN LA  DB EL NIVEL DE INGLES IMPARTIDO Y SE GUARDA EN UNA VARIABLE 
	  
	  if($rowNivel['nivelIngles']=='-----'){
         $nivel="-----";
	  }else if($rowNivel['nivelIngles']=='Ingles I' ){
         $nivel="Inglés I";
	  }
	  else if($rowNivel['nivelIngles']=='Ingles II' ){
         $nivel="Inglés II";
		
	  }
	  else if($rowNivel['nivelIngles']=='Ingles III' ){
         $nivel="Inglés III";
	  }
	  else if($rowNivel['nivelIngles']=='Ingles IV' ){
         $nivel="Inglés IV";
	  }
	   else if($rowNivel['nivelIngles']=='Ingles V' ){
         $nivel="Inglés V";
	  }
	   else if($rowNivel['nivelIngles']=='Ingles VI' ){
         $nivel="Inglés VI";
	  }
	  else if($rowNivel['nivelIngles']=='Certificacion' ){
         $nivel="Certificación";
	  }
	  
              ?> 
              
             <option value="<?php echo $rowNivel['nivelIngles']?>" id="$iNivel"> <?php echo $nivel ?> </option> 
                    <?php 
			  $iNivel=$iNivel+1;
              }  
              ?> 
            
               </select>
        
        <span class="poi">*</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Grupo:</td>
        <td><select name="grupo" style="width:155px"> 
             	<option value="vacia" id="0">----- </option> 
             	<option value="A" id="0">A </option> 
                <option value="B" id="0">B </option> 
                <option value="C" id="0">C </option> 
                <option value="D" id="0">D </option> 
                <option value="E" id="0">E </option> 
                <option value="F" id="0">F </option> 
               </select> <span class="poi">*</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Período:</td>
        <td>     
        
        	<select name="periodo" style="width:155px"> 
             	<option value="vacia" id="0">----- </option> 
              <?php 
			  $iPeriodo=0;
              while ($rowPeriodo = mysql_fetch_assoc($buscandoPeriodoNivel)) 
              {            
              ?> 
              <option value="<?php echo $rowPeriodo['periodo']?>" id="$iPeriodo"> <?php echo $rowPeriodo['periodo']?> </option> 
              <?php 
			  $iPeriodo=$iPeriodo+1;
              }  
              ?> 
               </select>
        
      <span class="poi">*</span></td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Año:</td>
        
        <td>
        <input type="text"  name="anio" value="" size="20" maxlength="4" title="El Año solo puede continer números " pattern="[0-9]{4}$" required> 
      
             <?php 
			  /*$iAnio=0;
              while ($rowAnio = mysql_fetch_assoc($buscandoAñoNivel)
) 
              {  */          
              ?> 
               <!--     <input type="text" name="anio" value="<?/*php echo $rowAnio['anio']*/?>  " readonly />  -->
              <?php 
			  /*$iAnio=$iAnio+1;
              }*/  
              ?> 
      
           <!--  <span class="poi">*</span>-->
        </td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Profesor:</td>
        <td><!--<input type="text"  name="docente" value="" size="20" maxlength="25"  required> -->
        
            <select name="profesor" style="width:155px"> 
             	<option value="vacia" id="0">----- </option> 
              <?php 
			  $iNombre=0;
              while ($row_nombre = mysql_fetch_assoc($buscandoProfesor)) 
              {            
              ?> 
              <option value="<?php echo $row_nombre['nombre']?>" id="$iNombre"> <?php echo $row_nombre['nombre']?> </option> 
              <?php 
			  $iNombre=$iNombre+1;
              }  
              ?> 
               </select>
                <span class="poi">*</span>
               </td>
      </tr>
      <tr valign="baseline">
        <td nowrap align="right">Matrícula:</td>
        <td>
             <select name="matricula" style="width:155px"> 
           	<option value="vacia" id="0">----- </option> 
              <?php 
			  $iMatri=0;
              while ($row_matri = mysql_fetch_assoc($buscandoProfesorMatricula)) 
              {            
              ?> 
             <option value="<?php echo $row_matri['matricula']?>" id="$iMatri"> <?php echo $row_matri['matricula']?> </option> 
             <?php 
			  $iMatri=$iMatri+1;
              }  
              ?> 
               </select>
               
        </td>
        
     
      </tr>
    
      <tr valign="baseline">
         
         <td nowrap align="left"></td>
      </tr>
    </table>
    
    </div>
  	<p align="center"></p>
     <h4><p align="center">HORARIOS</p></h4>
    <table align="center">
   
    <tr  valign="baseline" > 
       <td></td>
    <td align="right" > 
     <span class="combix">Lunes</span><input name="dia[]" type="checkbox" value="Lunes">
	 </td>
        <td nowrap align="center">De</td>
     <td><input name="horaInicio[]" type="time"></td> 
    
     <td nowrap align="right">A</td>
     <td><input name="horaFin[]" type="time"  > </td>     
     </tr>
     
     <tr valign="baseline">
     <td></td>
     <td align="right">
     <span class="combix">Martes</span><input name="dia[]" type="checkbox" value="Martes">
     </td>
    <td nowrap align="center">De</td>
     <td><input name="horaInicio1[]" type="time"></td> 
    
     <td nowrap align="right">A</td>
     <td><input name="horaFin1[]" type="time"  > </td>  
      </tr>
     <tr valign="baseline">
              <td></td>
       <td align="right"><span class="combix">Miércoles</span><input name="dia[]" type="checkbox" value="Miercoles">
       </td>
     <td nowrap align="center">De</td>
     <td><input name="horaInicio2[]" type="time"></td> 
    
     <td nowrap align="right">A</td>
     <td><input name="horaFin2[]" type="time"  > </td>  
       
     </tr>
     <tr valign="baseline">
         <td></td>
       <td align="right">
       <span class="combix">Jueves</span><input name="dia[]" type="checkbox" value="Jueves">
       </td>
             <td nowrap align="center">De</td>
     <td><input name="horaInicio3[]" type="time"></td> 
    
     <td nowrap align="right">A</td>
     <td><input name="horaFin3[]" type="time"  > </td>  
       
     </tr>
     <tr valign="baseline">
         <td></td>
      <td align="right"><span class="combix">Viernes</span><input name="dia[]" type="checkbox" value="Viernes">
       </td>
      <td nowrap align="center">De</td>
     <td><input name="horaInicio4[]" type="time"></td> 
    
     <td nowrap align="right">A</td>
     <td><input name="horaFin4[]" type="time"  > </td>  
       </td>
     </tr>
     <tr valign="baseline">
         <td></td>
      <td align="right"><span class="combix">Sábado</span><input name="dia[]" type="checkbox" value="Sabado">
       </td>
       <td nowrap align="center">De</td>
     <td><input name="horaInicio5[]" type="time"></td> 
    
     <td nowrap align="right">A</td>
     <td><input name="horaFin5[]" type="time"  > </td>  
     </tr>
    
 
      <tr valign="baseline">
      <td nowrap align="right"><span class="poi">* Campos Obligatorios</span></td>
       
      </tr>
      <tr valign="baseline">
         
         <td nowrap align="right"></td>
      </tr>
      
         <tr valign="baseline">
      <td nowrap align="right"></td>
        <td nowrap align="center"><input align="left"   type="submit" value="Guardar"></td>
        <td></td>
        <td nowrap align="center"><!--<input type="submit" value="Agregar Grupo">--></td>
      </tr>
    
    </table>
    <input type="hidden" name="MM_insert" value="form1">
  </form>
  
</p>
</section>





<footer>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</footer>


<section>

</section>

</body>
</html>
