<?php

function llenarComboGrupo() {
    $conexion = mysqli_connect("localhost", "root", "", "ingles");
    mysqli_set_charset($conexion, "utf8");
    $peticion = "";
    $idSeleccion = 0;
    $peticion = "SELECT * from  grupo, nivel where grupo.nivel_idnivel=nivel.idnivel;";
    $resultado = mysqli_query($conexion, $peticion);
    while ($grupos = mysqli_fetch_array($resultado)) {
        echo '<option id="' . $idSeleccion . '" value="' . $grupos['idGrupo'] . '">' . $grupos['nivelIngles'] . " - " . $grupos['nombreGrupo'] . " - " . $grupos['anio'] . '</option>';

        $idSeleccion++;
    }
}

function llenarComboProfesor() {
    echo 'entro ';
//    $peticion = "SELECT CONCAT(nombre,apellidoPaterno, apellidoMaterno) as nombreProfesor, matricula FROM ingles.profesor;";
    $conexion = mysqli_connect("localhost", "root", "", "ingles");
    mysqli_set_charset($conexion, "utf8");
    $peticion = "";
    $idSeleccion = 0;
    echo 'peticion ' . $peticion;
    $peticion = "SELECT * from profesor ;";
    $resultado = mysqli_query($conexion, $peticion);
    while ($grupos = mysqli_fetch_array($resultado)) {
        echo '<option id="' . $idSeleccion . '" value="' . $grupos[0] . '">' . $grupos[1] . "  " . $grupos[2] . " " . $grupos[3] . '</option>';

        $idSeleccion++;
    }
    echo '
                    
';
}

function llenarComboAño() {
    $conexion = mysqli_connect("localhost", "root", "", "ingles");
    mysqli_set_charset($conexion, "utf8");
    $idSeleccion = 0;
    $peticion = "SELECT DISTINCT anio FROM ingles.nivel ORDER BY anio;";
    $resultado = mysqli_query($conexion, $peticion);
    while ($grupos = mysqli_fetch_array($resultado)) {
        echo '<option id="' . $idSeleccion . '" value="' . $grupos[0] . '">' . $grupos[0] . '</option>';
        $idSeleccion++;
    }
}

function mostrarInformacion() {
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
                                    CONCAT(profesor.nombre,CONCAT(" . $espacio . "),profesor.apellidoPaterno,CONCAT(" . $espacio . ")) as nombreProfesor, profesor.matricula , 
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
            } else {
                if ($renglon['nombreDia'] == "Miercoles") {
                    $Miercoles[0] = $renglon['nombreDia'];
                    $Miercoles[1] = $renglon['horaInicio'];
                    $Miercoles[2] = $renglon['horaFin'];
                    $Miercoles[3] = "checked";
                } else {
                    if ($renglon['nombreDia'] == "Jueves") {
                        $Jueves[0] = $renglon['nombreDia'];
                        $Jueves[1] = $renglon['horaInicio'];
                        $Jueves[2] = $renglon['horaFin'];
                        $Jueves[3] = "checked";
                    } else {
                        if ($renglon['nombreDia'] == "Viernes") {
                            $Viernes[0] = $renglon['nombreDia'];
                            $Viernes[1] = $renglon['horaInicio'];
                            $Viernes[2] = $renglon['horaFin'];
                            $Viernes[3] = "checked";
                        } else {
                            if ($renglon['nombreDia'] == "Sabado") {
                                $Sabado[0] = $renglon['nombreDia'];
                                $Sabado[1] = $renglon['horaInicio'];
                                $Sabado[2] = $renglon['horaFin'];
                                $Sabado[3] = "checked";
                            } else {
                                $Lunes[0] = "";
                                $Lunes[1] = "";
                                $Lunes[2] = "";
                                $Lunes[3] = "unchecked";

                                $Martes[0] = "";
                                $Martes[1] = "";
                                $Martes[2] = "";
                                $Martes[3] = "unchecked";

                                $Miercoles[0] = "";
                                $Miercoles[1] = "";
                                $Miercoles[2] = "";
                                $Miercoles[3] = "unchecked";

                                $Jueves[0] = "";
                                $Jueves[1] = "";
                                $Jueves[2] = "";
                                $Jueves[3] = "unchecked";

                                $Viernes[0] = "";
                                $Viernes[1] = "";
                                $Viernes[2] = "";
                                $Viernes[3] = "unchecked";

                                $Sabado[0] = "";
                                $Sabado[1] = "";
                                $Sabado[2] = "";
                                $Sabado[3] = "unchecked";
                            }
                        }
                    }
                }
            }
        }
    }
}

function modificarGrupo() {
    //variables a borrar
    $conexion = mysqli_connect("localhost", "root", "", "ingles");
    mysqli_set_charset($conexion, "utf8");
    $idnivel = 1;
    $nombreGrupo = "";
    $dias = array("", "", "", "", "", "");
    require_once('../Connections/local.php');
    $nivelIngles = $_POST['nivel'];
    $periodo = $_POST['periodo'];
    $anio = $_POST['anio'];
    //echo 'datos de nivel '.$nivelIngles.' '.$periodo.' '.$anio;
    $nombreGrupo = $_POST['grupo'];
    $matricula = $_POST['matricula'];
    $idGrupo = $_POST['idGrupo'];

    $actualizaNivel = "UPDATE `ingles`.`nivel`
                                        SET
                                         `nivelIngles` =  '" . $nivelIngles . "',
                                        `periodo` =  '" . $periodo . "',
                                        `anio` = '" . $anio . "'
                                        WHERE idnivel= '" . $idnivel . "';";
    //echo '<br>'.$actualizaNivel;
    
    $actualizaGrupo = "UPDATE `ingles`.`grupo`
                                            SET
                                            `nombreGrupo` =  '" . $nombreGrupo . "',
                                             `nivel_idnivel` =  '" . $idnivel . "',
                                            `profesor_matricula` =  '" . $matricula . "'
                                            WHERE idGrupo= '" . $idGrupo . "';";
    //echo '<br>'.$actualizaGrupo;
    $check1 = isset($_REQUEST['Lunes']);
    $check2 = isset($_REQUEST['Martes']);
    $check3 = isset($_REQUEST['Miercoles']);
    $check4 = isset($_REQUEST['Jueves']);
    $check5 = isset($_REQUEST['Viernes']);
    $check6 = isset($_REQUEST['Sabado']);
    // echo 'hora: '.$_POST['horaL1'];
    $actualizaDias="";
    //  ***** CONSULTASSS*******
    mysqli_query($conexion,$actualizaNivel );
    mysqli_query($conexion,$actualizaGrupo);
    if ($check1) {
        //echo 'lunes '.$check1;
         $Lunes[0] = "Lunes";
        $Lunes[1] =$_POST['horaL1'];
        $Lunes[2] = $_POST['horaL2'];
        $Lunes[3]= $_POST['1'];
         $actualizaDias="UPDATE `ingles`.`dias`
                                SET
                                `nombreDia` =   '" .  $Lunes[0] . "',
                                `horaInicio` =   '" . $Lunes[1] . "',
                                `horaFin` =   '" .  $Lunes[2]. "'
                                WHERE `grupo_idGrupo` =   '" . $idGrupo . "' and idDia= '" .  $Lunes[3]. "';";
          //echo '<br> '.$actualizaDias;
          
          mysqli_query($conexion,$actualizaDias);
    }
      if ($check2) {
        $Martes[0] = "Martes";
        $Martes[1] =$_POST['horaMa1'];
        $Martes[2] = $_POST['horaMa2'];
        $Martes[3]= $_POST['3'];
         $actualizaDias="UPDATE `ingles`.`dias`
                                SET
                                `nombreDia` =   '" .  $Martes[0] . "',
                                `horaInicio` =   '" . $Martes[1] . "',
                                `horaFin` =   '" .  $Martes[2]. "'
                                WHERE `grupo_idGrupo` =   '" . $idGrupo . "' and idDia= '" .  $Martes[3]. "';";
          //echo '<br> '.$actualizaDias;
          mysqli_query($conexion,$actualizaDias);
    }
     if ($check3) {
        ///echo 'lunes '.$check3;
         $Miercoles[0] = "Miercoles";
        $Miercoles[1] =$_POST['horaM1'];
        $Miercoles[2] = $_POST['horaM2'];
        $Miercoles[3]= $_POST['3'];
         $actualizaDias="UPDATE `ingles`.`dias`
                                SET
                                `nombreDia` =   '" .  $Miercoles[0] . "',
                                `horaInicio` =   '" . $Miercoles[1] . "',
                                `horaFin` =   '" .  $Miercoles[2]. "'
                                WHERE `grupo_idGrupo` =   '" . $idGrupo . "' and idDia= '" .  $Miercoles[3]. "';";
          //echo '<br> '.$actualizaDias;
          mysqli_query($conexion,$actualizaDias);
    }
      if ($check4) {
        $Jueves[0] = "Jueves";
        $Jueves[1] =$_POST['horaJ1'];
        $Jueves[2] = $_POST['horaJ2'];
        $Jueves[3]= $_POST['4'];
         $actualizaDias="UPDATE `ingles`.`dias`
                                SET
                                `nombreDia` =   '" .  $Jueves[0] . "',
                                `horaInicio` =   '" . $Jueves[1] . "',
                                `horaFin` =   '" .  $Jueves[2]. "'
                                WHERE `grupo_idGrupo` =   '" . $idGrupo . "' and idDia= '" .  $Jueves[3]. "';";
          //echo '<br> '.$actualizaDias;
          mysqli_query($conexion,$actualizaDias);
    }
      if ($check5) {
        $Viernes[0] = "Viernes";
        $Viernes[1] =$_POST['horaV1'];
        $Viernes[2] = $_POST['horaV2'];
        $Viernes[3]= $_POST['5'];
         $actualizaDias="UPDATE `ingles`.`dias`
                                SET
                                `nombreDia` =   '" .  $Viernes[0] . "',
                                `horaInicio` =   '" . $Viernes[1] . "',
                                `horaFin` =   '" .  $Viernes[2]. "'
                                WHERE `grupo_idGrupo` =   '" . $idGrupo . "' and idDia= '" .  $Viernes[3]. "';";
          //echo '<br> '.$actualizaDias;
          mysqli_query($conexion,$actualizaDias);
    }
      if ($check6) {
        $Sabado[0] = "Sabado";
        $Sabado[1] =$_POST['horaS1'];
        $Sabado[2] = $_POST['horaS2'];
        $Sabado[3]= $_POST['6'];
         $actualizaDias="UPDATE `ingles`.`dias`
                                SET
                                `nombreDia` =   '" .  $Sabado[0] . "',
                                `horaInicio` =   '" . $Sabado[1] . "',
                                `horaFin` =   '" .  $Sabado[2]. "'
                                WHERE `grupo_idGrupo` =   '" . $idGrupo . "' and idDia= '" .  $Sabado[3]. "';";
          //echo '<br> '.$actualizaDias;
          mysqli_query($conexion,$actualizaDias);
    }
//    $dias[0] = $_POST['Lunes'];
//    $dias[1] = $_POST['Martes'];
//    $dias[2] = $_POST['Miercoles'];
//    $dias[3] = $_POST['Jueves'];
//    $dias[4] = $_POST['Viernes'];
//    $dias[5] = $_POST['Sabado']
//    echo 'dia: ' . $Lunes[0] . " " . $Lunes[1] . " - " . $Lunes[2] . " ";
   
    //CONSULTA MULTIPLE PARA ACTUALIZAR DATOS DEL PROFESOR
    // mysql_query($updateMultiple, $local) or die ("problema con query");
    //Mensaje para confirmar que se han modificado los campos
//	  echo "<script type='text/javascript'> 
//				alert('Operaci\u00F3n Exitosa'); 
//				window.location='Inicio.php';</script>";
}

?>