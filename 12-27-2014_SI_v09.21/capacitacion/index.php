<!doctype html>
<html>
<head>
<meta charset="utf-8">

<style type="text/css">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
/* 	background-color: #42413C; */
	margin: 0;
	padding: 0;<a href="index.php">index.php</a>
	color: #000;
}
/* ~~ Selectores de elemento/etiqueta ~~ */
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
	color: #003300;
	text-decoration: underline;
}
a:hover, a:active, a:focus { 
	text-decoration: none;
}
/* ~~ Este contenedor de anchura fija rodea a todas las demás bloques ~~ */
.container {
	width: 1024px;
	background-color: #FFFFFF;
	margin: 0 auto; /* el valor automático de los lados, unido a la anchura, centra el diseño  */
}
/* ~~ No se asigna una anchura al encabezado. Se extenderá por toda la anchura del diseño. ~~ */
header {
	background-color: #003300;
}

/* ~~ Este selector agrupado da espacio a las listas del área de .content ~~ */
/* .content ul, .content ol {
	padding: 0 15px 15px 40px;
} */

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
	padding: 10px 0;
	background-color: #003300;
	position: relative;/* esto da a IE6 el parámetro hasLayout para borrar correctamente */
	clear: both; 
}

header, section, footer, article, figure {
	display: block;
}
.colorBlanco {
	color: #FFF;
}
.g {
	color: #FFF;
}
-->
</style><!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--></head>

<body>

  <header>
    <!--INICIO DEL MENU PRINCIPAL-->
<div id='cssmenu'>
<ul>
   <li><a href='#'>INICIO</a></li>
      <li class='active has-sub'><a href='#'>ALUMNOS</a>
           <ul>
         <li class='has-sub'><a href='#'><span>Inscripción</span></a>
<ul>
         <li><a href='Alumno/Inscripcion_Alumno.php'>Interno</a>
         </li>
         <li class=''><a href='Alumno/Inscripcion_Alumno_Externo.php'>Externo</a>
         </li>
        </ul>      
      </li>
         <li class='has-sub'><a href='Login/Login.php?seleccionado=alumno'>Ingresar</a>
         </li>
           </ul>
     <!--<li><a href='profesor/Inicio.php'>PROFESOR</a></li> -->
     <li><a href='Login/Login.php?seleccionado=profesor'>PROFESOR</a></li>
   <li class='active has-sub'><a href='#'>PERSONAL ADMINISTRATIVO</a>
      <ul>
         <li class='has-sub'><a href='Login/Login.php?seleccionado=administrador'>Administrador</a>
         </li>
         <li class='has-sub'><a href='Login/Login.php?seleccionado=subdireccion'>Subdirección Académica</a>
         </li>
         <li class='has-sub'><a href='Login/Login.php?seleccionado=secretaria'>Secretaria</a>
         </li>         
      </ul>
   </li> 
</ul>
</div>
<div align="center"><!--FIN DEL MENU PRINCIPAL -->    
</div>
  </header>
  <article class="content">

   <link rel="stylesheet" href="css/estiloMenuPrincipal.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="scripts/scriptMenuPrincipal.js"></script>
<body>


<section>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
    <h2 align="center">Sistema Integral de Inglés </h2>
    
    </section>
    <div align="center"><img src="pic/LogoTec.png" width="285" height="258"></div>
<section>
    <h4> <div align="center">Por una Educación de Excelencia</div></h4>
      	<p>&nbsp;</p>
        <p>&nbsp;</p>
    </section>
  <!-- end .content --></article>
  <footer>
    <p class="g" align="center">Copyright © 2014. Instituto Tecnológico Superior Zacatecas Sur

Av. Tecnológico # 100 Tlaltenango, Zac.

Col. Las Moritas, C.P. 99700

Tel. (s) 01 (437) 9541834, 9540675, 9541030 Fax 9540760

E-mail: Webmaster@itszas.edu.mx </p>
  </footer>

</body>
</html>
