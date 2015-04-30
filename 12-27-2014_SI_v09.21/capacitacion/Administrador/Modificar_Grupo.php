<?php
session_start();
require_once('../Connections/local.php');
mysql_select_db($database_local, $local);
$nombre="";
if (isset($_SESSION["sesion"]))
{
	$nombre = ($_SESSION['sesion']);
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
        <script src="script.js"></script>
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

        </div>
        <h1> <div align="center">Sistema de Control de Inglés del ITSZaS</div></h1>

<body>
    <section>
        <h2> <div align="center">Modificar Grupo</div></h2>
        <form method="post" name="form" >
            <p>&nbsp;</p>


            <table align="center">
                <tr valign="baseline">
                    <td colspan="1" align="center">&nbsp;</td>
                    <td colspan="1" align="center">Grupo</td>
                    <td colspan="1" align="center">&nbsp;</td>
                </tr>

                <tr valign="baseline">
                    <td colspan="1" ></td>
                    <td colspan="1" >
                        <select name="buscaGrupo" id="buscaGrupo">
                            <option > ------</option>
                            <?php
                            require_once 'Logica_Modifica_Grupo.php';
                            llenarComboGrupo();
                            ?>
                        </select></td>

<!--                    <td colspan="2" align="center"><select name="buscaAnio" id="buscaAnio">
                            <option > ------</option>
                            <?php
                           // llenarComboAño();
                            ?>
                        </select></td>-->


                </tr>
                </tr>
                <tr valign="baseline">
                    <td colspan="10" align="center" >
                         <?php
                        $nivelI = "";
                        $nivelII = "";
                        $nivelIII = "";
                        $nivelIV = "";
                        $nivelV = "";
                        $nivelVI = "";
                        $nivelVII = "";

                        $periodo1 = "";
                        $periodo2 = "";
                        $periodo3 = "";

                        $anio = "";

                        $nivel = "";
                        $grupo = "";
                        $periodo = "";
                        $profesor = "";
                        $matricula = "";

                        $horario = "";
                        $dia = "";

                        $Lunes = array("", "", "", "", "", "");
                        $Martes = array("", "", "", "", "", "");
                        $Miercoles = array("", "", "", "", "", "");
                        $Jueves = array("", "", "", "", "", "");
                        $Viernes = array("", "", "", "", "", "");
                        $Sabado = array("", "", "", "", "", "");



                        $hora1 = array("", "", "", "", "", "");
                        $hora2 = array("", "", "", "", "", "");
                        $i = 0;
                      // llenarVariables();
                        if (isset($_POST['Buscar'])) {
                            $nivel = "";
                            $conexion = mysqli_connect("localhost", "root", "", "ingles");
                            mysqli_set_charset($conexion, "utf8");

                            $idGrupo = $_POST['buscaGrupo'];

                            $horario = "";
                            $espacio = '" "';
                            $peticion = "SELECT * FROM ingles.dias where grupo_idGrupo=" . "'" . $idGrupo . "'";
                            $resultado = mysqli_query($conexion, $peticion);
                            while ($renglon = mysqli_fetch_array($resultado)) {
                                //$horario = $horario.$renglon['nombreDia']." De ".$renglon['horaInicio']." A ".$renglon['horaFin']."<br>";
                            }

                            $peticion = "SELECT  grupo.nivel_idnivel as idnivel FROM ingles.grupo where grupo.idGrupo=" . "'" . $idGrupo . "'";
                            $resultado = mysqli_query($conexion, $peticion);
                            while ($grupos = mysqli_fetch_array($resultado)) {
                                $idnivel = $grupos[0];
                            }
                            $peticion1 = " SELECT  Distinct
                                    nivel.nivelIngles,
                                    CONCAT(profesor.nombre,CONCAT(" . $espacio . "),profesor.apellidoPaterno,CONCAT(" . $espacio . "),profesor.apellidoMaterno) as nombreProfesor, profesor.matricula ,
                                         nivel.periodo, nivel.anio,
                                         grupo.nombreGrupo FROM ingles.alumno,ingles.grupo, ingles.nivel, ingles.profesor
                                        where grupo.nivel_idnivel=" . "'" . $idnivel . "' and nivel.idnivel=" . "'" . $idnivel . "' and grupo.profesor_matricula=profesor.matricula and  grupo.idGrupo=" . "'" . $idGrupo . "';";
                            // echo 'lalaal ' . $peticion1;
                            $resultado1 = mysqli_query($conexion, $peticion1);
                            $row = mysqli_fetch_array($resultado1);

                            $anio = $row['anio'];
                            $nivel = $row['nivelIngles'];
                            $grupo = $row['nombreGrupo'];
                            $periodo = $row['periodo'];

                            $profesor = $row['nombreProfesor'];
                            $matricula = $row['matricula'];

                            //  echo 'lala '.$dias[0];
                            $peticion = "SELECT * FROM ingles.dias where grupo_idGrupo=" . "'" . $idGrupo . "'";
                            $resultado = mysqli_query($conexion, $peticion);
                            $i = 0;
                            while ($renglon = mysqli_fetch_array($resultado)) {

                                $dia = $dia . " - " . $renglon['nombreDia'];
                                $horario = $horario . " (De " . $renglon['horaInicio'] . " A " . $renglon['horaFin'] . ") ";
                               // echo 'dia ' . $renglon['nombreDia'];
                                if ($renglon['nombreDia'] == "Lunes") {
                                    $Lunes[0] = $renglon['nombreDia'];
                                    $Lunes[1] = $renglon['horaInicio'];
                                    $Lunes[2] = $renglon['horaFin'];
                                    $Lunes[3] = "checked";
                                    $Lunes[4] =  $renglon['idDia'];
                                   // echo 'entro a lunes';
                                } else {
                                    if ($renglon['nombreDia'] == "Martes") {
                                        $Martes[0] = $renglon['nombreDia'];
                                        $Martes[1] = $renglon['horaInicio'];
                                        $Martes[2] = $renglon['horaFin'];
                                        $Martes[3] = "checked";
                                        $Martes[4] =  $renglon['idDia'];
                                    } else {
                                        if ($renglon['nombreDia'] == "Miercoles") {
                                            $Miercoles[0] = $renglon['nombreDia'];
                                            $Miercoles[1] = $renglon['horaInicio'];
                                            $Miercoles[2] = $renglon['horaFin'];
                                            $Miercoles[3] = "checked";
                                            $Miercoles[4] =  $renglon['idDia'];
                                        } else {
                                            if ($renglon['nombreDia'] == "Jueves") {
                                                $Jueves[0] = $renglon['nombreDia'];
                                                $Jueves[1] = $renglon['horaInicio'];
                                                $Jueves[2] = $renglon['horaFin'];
                                                $Jueves[3] = "checked";
                                                $Jueves[4] =  $renglon['idDia'];
                                            } else {
                                                if ($renglon['nombreDia'] == "Viernes") {
                                                    $Viernes[0] = $renglon['nombreDia'];
                                                    $Viernes[1] = $renglon['horaInicio'];
                                                    $Viernes[2] = $renglon['horaFin'];
                                                    $Viernes[3] = "checked";
                                                    $Viernes[4] =  $renglon['idDia'];
                                                } else {
                                                    if ($renglon['nombreDia'] == "Sabado") {
                                                        $Sabado[0] = $renglon['nombreDia'];
                                                        $Sabado[1] = $renglon['horaInicio'];
                                                        $Sabado[2] = $renglon['horaFin'];
                                                        $Sabado[3] = "checked";
                                                        $Sabado[4] =  $renglon['idDia'];
                                                    } else {
                                                        $Lunes[0] = "";
                                                        $Lunes[1] = "";
                                                        $Lunes[2] = "";
                                                        $Lunes[3] = "unchecked";
                                                        $Lunes[4] = "";

                                                        $Martes[0] = "";
                                                        $Martes[1] = "";
                                                        $Martes[2] = "";
                                                        $Martes[3] = "unchecked";
                                                        $Martes[4] = "";

                                                        $Miercoles[0] ="";
                                                        $Miercoles[1] = "";
                                                        $Miercoles[2] = "";
                                                        $Miercoles[3] = "unchecked";
                                                        $Miercoles[4] ="";

                                                        $Jueves[0] = "";
                                                        $Jueves[1] = "";
                                                        $Jueves[2] = "";
                                                        $Jueves[3] = "unchecked";
                                                        $Jueves[4] = "";

                                                        $Viernes[0] = "";
                                                        $Viernes[1] = "";
                                                        $Viernes[2] = "";
                                                        $Viernes[3] = "unchecked";
                                                        $Viernes[4] = "";

                                                        $Sabado[0] = "";
                                                        $Sabado[1] = "";
                                                        $Sabado[2] = "";
                                                        $Sabado[3] = "unchecked";
                                                        $Sabado[0] = "";

                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                             $idGrupo = $_POST['buscaGrupo'];
//                        	  echo "<script type='text/javascript'>
//				alert('Operaci\u00F3n Exitosa');
//				window.location='Administrador/Modificar_Grupo.php?idGrupo=..$idGrupo.".";</script>";
                        }

                        ?>
                        <input type="submit" value="Buscar"  name="Buscar"></td>

                </tr>
            </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </form>

        <form method="post" name="form1" action="Modificar_Grupo.php">

            <div class="CSSTableGenerator" >
                <table align="center">
                    <tr valign="baseline">
                        <td></td>
                        <td align="right" >Nivel:</td>
                        <td>
<?php
if ($periodo == "Agosto-Diciembre") {
    $periodo1 = "selected";
}
if ($periodo == "Enero-Junio") {
    $periodo2 = "selected";
}
if ($periodo == "Verano") {
    $periodo3 = "selected";
}
if ($nivel == "Ingles I") {
    $nivelI = "selected";
}
if ($nivel == "Ingles II") {
    $nivelII = "selected";
}
if ($nivel == "Ingles III") {
    $nivelIII = "selected";
}
if ($nivel == "Ingles IV") {
    $nivelIV = "selected";
}
if ($nivel == "Ingles V") {
    $nivelV = "selected";
}
if ($nivel == "Ingles VI") {
    $nivelVI = "selected";
}
if ($nivel == "certificacion") {
    $nivelVII = "selected";
}
?>
                            <select name="nivel" style="width:154px">
                                <option name="rayitas" value="rayitas" > ------ </option>
                                <option name="Ingles I" value="Ingles I" <?php echo $nivelI; ?>> Inglés I </option>
                                <option name="Ingles II" value="Ingles II" <?php echo $nivelII; ?>> Inglés II </option>
                                <option name="Ingles III" value="Ingles III" <?php echo $nivelIII; ?>> Inglés III </option>
                                <option name="Ingles VI" value="Ingles IV" <?php echo $nivelIV; ?>> Inglés IV</option>
                                <option name="Ingles V" value="Ingles V" <?php echo $nivelV; ?>> Inglés V </option>
                                <option name="Ingles VI" value="Ingles VI" <?php echo $nivelVI; ?>> Inglés VI </option>
                                <option name="certificacion" value="certificacion" <?php echo $nivelVII; ?>> Certificación </option>
                            </select>
                            <span class="poi">*</span></td>
                    </tr>
                    <tr valign="baseline">
                        <td></td>
                        <td align="right" > Grupo:</td>
                        <td><input type="text"  pattern="[A-Z]{1}$" id="grupo" name="grupo"  size="20" maxlength="1" value="<?php echo $grupo ?>" required> <span class="poi">*</span></td>
                    </tr>
                    <tr valign="baseline">
                        <td></td>
                        <td align="right" > Período:</td>
                        <td>
                            <select name="periodo" id="periodo"  onChange="Inhabilita()" required>
                                <option value="Rayitas" id="Rayitas2"> ------ </option>
                                <option name="AgostoDicembre" value="Agosto-Dicembre" id="12"  <?php echo $periodo1; ?>> Agosto - Diciembre </option>
                                <option name="EneroJunio" value="Enero-Junio" id="22"  <?php echo $periodo2; ?>> Enero - Junio</option>
                                <option name="Verano" value="Verano" id="32"  <?php echo $periodo3; ?>> Verano </option>
                            </select>
                            <span class="poi">*</span></td>
                    </tr>
                    <tr valign="baseline">
                        <td></td>
                        <td align="right" > Año:</td>
                        <td>
                            <input type="text" pattern="[0-9]{4}$" id="anio" name="anio" size="20" maxlength="4" value="<?php echo $anio ?>" required>
                        </td>
                    </tr>
                    <tr valign="baseline">
                        <td></td>
                        <td align="right" > Profesor:</td>
                        <td>
                            <input type="text"  id="profesor" name="profesor" size="20" maxlength="4" value="<?php echo $profesor ?>" required>
                        </td>
                    </tr>
                    <tr valign="baseline">
                        <td></td>
                        <td align="right" >Cambiar Profesor: </td>
                        <td><select name="buscarProfesor" id="buscaProfesor"  onchange="myFunction()" disabled="true" >
                            <option > ------</option>
                             <?php
                            require_once 'Logica_Modifica_Grupo.php';
                            llenarComboProfesor();
                            ?>
                            <script>
                            function myFunction() {
                             var x = document.getElementById("buscaProfesor").selectedIndex;
                            var y = document.getElementById("buscaProfesor").options;
                            var z=(y[x].text);
                                var x = document.getElementById("buscaProfesor").value;
                                //document.getElementById("demo").innerHTML = "You selected: " + x;
                                document.getElementById("matricula").value=x;
                                 document.getElementById("profesor").value=z;
                            }
                            </script>
                        </select><span class="poi">*</span>
                        <input type="checkbox" name="cambiar" onclick="myFunction2()" id="cambiar"><br>
                        </td>
                    </tr>
                    <script>
                            function myFunction2() {


                                    var x=document.getElementById("profesor").velue;
                                    if(document.getElementById("cambiar").checked==true){

                                        document.getElementById("buscaProfesor").disabled = false;
                                    }else{
                                    document.getElementById("buscaProfesor").disabled = true;

                                    }



                            }
                            </script>


                    <tr valign="baseline">
                        <td></td>
                        <td align="right" > Matrícula:</td>
                        <td><input type="text" pattern="[A-Z]{45}$" id="matricula" name="matricula" size="25" maxlength="25" value="<?php echo $matricula ?>" readonly="">  <span class="poi">*</span>
                            <input type="text" id="idGrupo" name="idGrupo" value="<?php echo $idGrupo ?>" hidden="true">
                        </td>
                    </tr>

                    <tr valign="baseline">

                        <td nowrap align="left"></td>
                    </tr>
                </table>

            </div>
            <p align="center"></p>
            <table align="center">

                <tr  valign="baseline" >

                    <td align="right" >
                        <input type="text" id="Lunes" name="1" value="<?php echo  $Lunes[4] ?>"hidden="true" >
                        <input type="text" id="Martes" name="2" value="<?php echo  $Martes[4] ?>" hidden="true">
                        <input type="text" id="Miercoles" name="3" value="<?php echo  $Miercoles[4] ?>"hidden="true">
                        <input type="text" id="Jueves" name="4" value="<?php echo  $Jueves[4] ?>" hidden="true">
                        <input type="text" id="Viernes" name="5" value="<?php echo  $Viernes[4] ?>" hidden="true">
                        <input type="text" id="Sabado" name="6" value="<?php echo  $Sabado[4] ?>" hidden="true">
                        <span class="combix">Lunes</span><input name="Lunes"value="Lunes" type="checkbox"<?php echo $Lunes[3] ?> >
                    </td>
                    <td nowrap align="middle">De</td>
                    <td><input name="horaL1"id="horaL1" type="time" value="<?php echo $Lunes[1] ?>"></td>

                    <td nowrap align="right">A</td>
                    <td><input name="horaL2" type="time"  value="<?php echo $Lunes[2] ?>" > </td>
                </tr>

                <tr valign="baseline">

                    <td align="right">
                        <span class="combix">Martes</span><input name="Martes" type="checkbox" value="Martes" <?php echo $Martes[3] ?> >
                    </td>
                    <td nowrap align="center">De</td>
                    <td><input  name="horaMa1" type="time" value="<?php echo $Martes[1] ?>"> </td>
                    <td nowrap align="right">A</td>
                    <td><input type="time" name="horaMa2" value="<?php echo $Martes[2] ?>"> </td>
                </tr>
                <tr valign="baseline">

                    <td align="right"><span class="combix">Miércoles</span><input name="Miercoles" type="checkbox" value="Miercoles" <?php echo $Miercoles[3] ?>>
                    </td>
                    <td nowrap align="center">De</td>
                    <td><input type="time" name="horaM1" value="<?php echo $Miercoles[1] ?>" > </td>
                    <td nowrap align="right">A</td>
                    <td><input type="time" name="horaM2" value="<?php echo $Miercoles[2] ?>"> </td>

                </tr>
                <tr valign="baseline">

                    <td align="right">
                        <span class="combix">Jueves</span><input name="Jueves" type="checkbox" value="Jueves" <?php echo $Jueves[3] ?>>
                    </td>
                    <td nowrap align="center">De</td>
                    <td><input type="time"  name="horaJ1" value="<?php echo $Jueves[1] ?>"> </td>

                    <td nowrap align="right">A</td>
                    <td><input type="time" name="horaJ2"value="<?php echo $Jueves[2] ?>"> </td>

                </tr>
                <tr valign="baseline">

                    <td align="right"><span class="combix">Viernes</span><input name="Viernes" type="checkbox" value="Viernes" <?php $Viernes[3] ?>>
                    </td>
                    <td nowrap align="center">De</td>
                    <td><input type="time" name="horaV1"value="<?php $Viernes[1] ?>"> </td>

                    <td nowrap align="right">A</td>
                    <td><input type="time"name="horaV2" value="<?php $Viernes[2] ?>"> </td>
                    </td>
                </tr>
                <tr valign="baseline">

                    <td align="right"><span class="combix">Sábado</span><input name="Sabado" type="checkbox" value="Sabado" <?php $Sabado[3] ?>>
                    </td>
                    <td nowrap align="center">De</td>
                    <td><input type="time" name="horaS1" value="<?php $Sabado[1] ?>"> </td>

                    <td nowrap align="right">A</td>
                    <td><input type="time"name="horaS2"  value="<?php $Sabado[2] ?>"> </td>
                    </td>
                </tr>

                <tr valign="baseline">
                    <td nowrap align="right"><span class="poi">* Campos Obligatorios</span></td>

                </tr>
                <tr valign="baseline">

                    <td nowrap align="right"></td>
                </tr>

                <tr valign="baseline">
                    <td nowrap align="right"></td>
                    <td nowrap align="center"><input align="left"   type="submit" value="Guardar" name="Modificar"></td>
                    <?php
                     $actualizaNivel="";
                     require_once 'Logica_Modifica_Grupo.php';
                    if (isset($_POST['Modificar'])) {
                        modificarGrupo();

                    }
                    ?>
                    <td></td>
                    <td nowrap align="center"><!--<input type="submit" value="Agregar Grupo">--></td>
                </tr>

            </table>

        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
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
}
else
{
	echo("<script type='text/javascript'>
			alert('No existe ninguna sesi\u00F3n abierta, favor de AUTENTIFICARSE');
			window.location='Salir.php';</script>");
}
?>
