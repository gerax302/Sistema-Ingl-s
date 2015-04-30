<?php
   //solicitar conexion
      require_once('../Connections/local.php');
      mysql_select_db($database_local, $local);
/*   if(isset($_GET['matricula']))
      $matricula=$_GET['matricula'];*/

   $matricula=$_GET['matricula'];   
   //Campos a modificar
   $nombreNuevo=$_POST['nombre'];
   $apellidoPaternoNuevo=$_POST['apellidoPaterno'];
   $apellidoMaternoNuevo=$_POST['apellidoMaterno'];
   $direccionNuevo=$_POST['direccion'];
   $telefonoNuevo=$_POST['telefono'];
   $correoNuevo=$_POST['correo'];
   $certificacionesNuevo=$_POST['certificaciones'];
   $experienciaNuevo=$_POST['experiencia'];
   $fechaIngresoNuevo=$_POST['fechaIngreso'];
   $nivelesImpartidosNuevo=$_POST['nivelesImpartidos'];
   $nuevoImpartidoActualmente=$_POST['nivelImpartidoActualmente'];
   $nuevoPeriodoLaboral=$_POST['periodoLaboral'];
   $nuevoEstadoLaboral=$_POST['estadoLaboral'];

   //CONSULTA MULTIPLE PARA ACTUALIZAR DATOS DEL PROFESOR
   $updateMultiple = "UPDATE  profesor SET    
   nombre = '".$nombreNuevo."',
   apellidoPaterno = '".$apellidoPaternoNuevo."',
   apellidoMaterno = '".$apellidoMaternoNuevo."',
   direccion = '".$direccionNuevo."',
   telefono = '".$telefonoNuevo."',
   correo = '".$correoNuevo."',
   certificaciones = '".$certificacionesNuevo."',
   experiencia = '".$experienciaNuevo."',
   fechaIngreso = '".$fechaIngresoNuevo."',
   nivelesImpartidos = '".$nivelesImpartidosNuevo."',
   nivelImpartidoActualmente = '".$nuevoImpartidoActualmente."',
   periodoLaboral = '".$nuevoPeriodoLaboral."',
   estadoLaboral = '".$nuevoEstadoLaboral."'
   WHERE   matricula = '$matricula'";


   mysql_query($updateMultiple, $local) or die ("Problema con update");

   //Mensaje para confirmar que se han modificado los campos
   echo "<script type='text/javascript'>
   alert('Operaci\u00F3n Exitosa');
   window.location='Inicio.php';</script>";

?>
