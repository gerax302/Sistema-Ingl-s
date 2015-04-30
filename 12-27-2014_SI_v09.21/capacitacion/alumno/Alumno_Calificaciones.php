<!doctype html>
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

        $buscarAlumno= "SELECT *  FROM `ingles`.`alumno` WHERE `alumno`.`NoControl`="."'".$numeroControl."' ;" ;
        $buscandoAlumno = mysql_query($buscarAlumno, $local);
        $row = mysql_fetch_array($buscandoAlumno) or die("Ha ocurrido un error: ".mysql_error());
        $idnivel=$row['idnivel'];
        
        $buscarAlumno = "select alumno.NoControl, alumno.nombre, alumno.planEstudios, alumno.passwordAlumno, 
        (select profesor.nombre from profesor where matricula=grupo.profesor_matricula),
        nivel.periodo,nivel.anio, grupo.nombreGrupo, nivel.nivelIngles
        from ingles.alumno, ingles.nivel, ingles.grupo 
        where alumno.idnivel="." '".$idnivel."'  and nivel.idnivel="."'".$idnivel."' 
        and grupo.nivel_idnivel="."'".$idnivel." ' and alumno.NoControl="."'".$numeroControl." ' ; ";

        $buscandoAlumno = mysql_query($buscarAlumno,  $local) or die("Error en consulta buscarAlumno: ".mysql_error());
        $row = mysql_fetch_array($buscandoAlumno);
            $nombre=$row['nombre'];
            $ncontrol=$row['NoControl'];
            $nombreAlumno=$row['nombre'];
            $planEstudios=$row['planEstudios'];
            $profesor=$row[4];
            $periodo=$row['periodo']." ".$row['anio'];
            $grupo=$row['nombreGrupo'];
            $nivel=$row['nivelIngles'];
            
        $buscarAlumno= "select * from ingles.calificaciones where alumno_NoControl= "."'".$numeroControl."'  ; ";

        $buscandoAlumno = mysql_query($buscarAlumno,  $local);
        $row = mysql_fetch_array($buscandoAlumno);                
            $unidad1=$row['unidad1'];
            $unidad2=$row['unidad2'];
            $unidad3=$row['unidad3'];
            $unidad4=$row['unidad4'];
            $unidad5=$row['unidad5'];
            $unidad6=$row['unidad6'];
            $unidad7=$row['unidad7'];
            $unidad8=$row['unidad8'];
?>
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
            .Fotografia{
                height: 150px;
                width: 150px;
                /*   position: initial; */
                display: table-cell;
                horizontal: middle;
                border: 1px solid #000;
                margin: 1px;
            }

            #apDiv1 {
                position: absolute;
                left: 398px;
                top: 291px;
                width: 71px;
                height: 34px;
                z-index: 1;
            }
            -->
        </style>
    </head>

    <body>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/estiloMenuIzquierdo.css">
        <link rel="stylesheet" href="css/estiloTabla.css" type="text/css" />  
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> 
        <script src="file:///D|/xampp/htdocs/capacitacion/profesores/script.js"></script>
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
        <h2> <div align="center">Calificaciones del Alumno </div></h2>
        <p>  
        <div align="center">
            <form ENCTYPE="multipart/form-data"  method="POST" >
                <br>
                <br>

                <div class="CSSTableGenerator" >
                    <table >
                        <tr>

                            <td > <label>  Profesor</label></td>
                            <td > <label>  Período</label></td>
                            <td > <label>  Grupo</label></td>
                            <td > <label>  Nivel</label></td>
                        </tr>
                        <tr>
                            <?php
                            
                            echo '
                                    <td > <label>  '.$profesor.'</label></td>
                                    <td > <label>  '.$periodo.'</label></td>
                                    <td > <label> '.$grupo.'</label></td>
                                    <td > <label> '.$nivel.'</label></td>';
                            ?>

                        </tr>    

                    </table>

                </div>
                <div class="CSSTableGenerator" >
                    <h3> <div align="center">Unidades Evaluadas </div></h3>

                    <table >


                        <tr>
                            <td><label> No. Control</label></td>
                            <td > <label>  Nombre Alumno</label></td>
                            <td > <label>  Plan Estudios</label></td>                            
                            <td><label>    1</label></td>
                            <td > <label>  2</label></td>
                            <td > <label>  3</label></td>
                            <td > <label>  4</label></td>
                            <td > <label>  5</label></td>
                            <td > <label>  6</label></td>
                            <td > <label>  7</label></td>
                            <td > <label>  8</label></td>
                        </tr>
                        <tr>
                             <?php
                           
                            echo '
                                    <td > <label> '.$ncontrol.'</label></td>
                                    <td > <label>  '.$nombreAlumno.'</label></td>
                                    <td > <label>  '.$planEstudios.'</label></td>
                                    <td > <label> '.$unidad1.'</label></td>
                                    <td > <label>  '.$unidad2.'</label></td>
                                    <td > <label>  '.$unidad3.'</label></td>
                                    <td > <label>  '.$unidad4.'</label></td>
                                    <td > <label>  '.$unidad5.'</label></td>
                                    <td > <label> '.$unidad6.'</label></td>
                                    <td > <label> '.$unidad7.'</label></td>
                                    <td > <label> '.$unidad8.'</label></td>';
                            ?>
                        </tr>    
                    </table>
                </div>                
            </form>
        </div> 

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </p>
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
