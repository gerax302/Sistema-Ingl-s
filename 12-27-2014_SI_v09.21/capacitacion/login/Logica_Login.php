<?php
	include('../Connections/local.php');
	mysql_select_db($database_local, $local);
	//$pass=MD5($_POST["password"]);
	$nombre="";
	//recibimos de parametro el tipo de usuario
	$tipoUsuario=$_GET["usuarioRecibido"];

	//SI EL USUARIO ES ALUMNO: BUSCA SI EXISTE ESE No. DE CONTROL EN LA TABLA CORRESPONDIENTE
	if($tipoUsuario == "alumno")
	{
		$buscaAlumno = "select * from Alumno where NoControl='".$_POST["Usuario"]."' and passwordAlumno='".$_POST["Contrasena"]."'";
		// lo que indica "Usuario" es el nombre de la caja en el diseño
		$respuesta=mysql_query($buscaAlumno,$local);
		$row=mysql_fetch_array($respuesta);

		$numeroControl = $row['NoControl'];

		//OBTENER EL NOMBRE EN BASE AL NÚMERO DE CONTROL
		$_matriculaNombre="select nombre from Alumno where NoControl ='".$_POST['Usuario']."'";
		$respuestaNombre=mysql_query($_matriculaNombre,$local);
		$rowNombre=mysql_fetch_array($respuestaNombre);

		//ASIGNAR NOMBRE DEL ALUMNO A LA VARIABLE $nombre
		$nombre=$row['nombre'];

		//ASIGNAR CONTRASEÑA DEL ALUMNO A LA VARIABLE $contrasena
		$contrasena=$_POST['Contrasena'];

		if (mysql_num_rows($respuesta)==0)
		{
			  echo("<script type='text/javascript'>
			  alert('El usuario no existe');
			  window.location='../index.php';</script>");
		}
		else
		{
			session_start();
			$_SESSION["sesion"]=$numeroControl;
				echo("<script type='text/javascript'>
				window.location='../Alumno/Inicio.php';</script>");
		}
	}


	//SI EL USUARIO ES PROFESOR:
	if($tipoUsuario == "profesor")
	{
		$buscaProfesor="select * from Profesor where matricula='".$_POST["Usuario"]."' and passwordProfesor='".$_POST["Contrasena"]."'";
		$respuestaProfesor=mysql_query($buscaProfesor,$local);
		$row=mysql_fetch_array($respuestaProfesor);

    $matricula = $row['matricula'];

		if (mysql_num_rows($respuestaProfesor)==0)
		{
			  echo("<script type='text/javascript'>
			  alert('El usuario no existe');
			  window.location='../index.php';</script>");
		}
		else
		{
			session_start();
			$_SESSION["sesion"]=$matricula;
				echo("<script type='text/javascript'>
				/*alert('YUPI!!!');*/
                window.location='../Profesor/Inicio.php';</script>");
		}
	}



	//SI EL USUARIO ES ADMINISTRADOR:
	if($tipoUsuario == "administrador")
	{
		$buscaAdministrador="select * from usuario where nombre='".$_POST["Usuario"]."' and passwordUsuario='".$_POST["Contrasena"]."' and idUsuario='1' ";
		$respuesta=mysql_query($buscaAdministrador,$local);
		$row=mysql_fetch_array($respuesta);

		$_administradorNombre="select nombre from usuario where nombre ='".$_POST['Usuario']."'";
		$respuestaNombre=mysql_query($_administradorNombre,$local);
		$rowNombre=mysql_fetch_array($respuestaNombre);

		$nombre=$row['nombre'];

		if (mysql_num_rows($respuesta)==0)
		{
			  echo("<script type='text/javascript'>
			  alert('El usuario no existe');
			  window.location='Login.php?seleccionado=administrador';</script>");
		}
		else
		{
			session_start();
			$_SESSION["sesion"]=$nombre;
				echo("<script type='text/javascript'>
				window.location='../Administrador/Inicio.php';</script>");
		}
	}



	//SI EL USUARIO ES SECRETARIA:
	if($tipoUsuario == "secretaria")
	{
		$buscaSecretaria="select * from usuario where nombre='".$_POST["Usuario"]."' and passwordUsuario='".$_POST["Contrasena"]."' and idUsuario='2' ";
		$respuesta=mysql_query($buscaSecretaria,$local);
		$row=mysql_fetch_array($respuesta);

		//OBTENER EL NOMBRE
		$_secretariaNombre="select nombre from usuario where nombre ='".$_POST['Usuario']."'";
		$respuestaNombre=mysql_query($_secretariaNombre,$local);
		$rowNombre=mysql_fetch_array($respuestaNombre);

		$nombre=$row['nombre'];

		if (mysql_num_rows($respuesta)==0)
		{
			  echo("<script type='text/javascript'>
			  alert('El usuario no existe');
			  window.location='Login.php?seleccionado=secretaria';</script>");
		}
		else
		{
			session_start();
			$_SESSION["sesion"]=$nombre;
				echo("<script type='text/javascript'>
				window.location='../Secretaria/index.php';</script>");
		}
	}




	//SI EL USUARIO ES SUBDIRECCIÓN:
	if($tipoUsuario == "subdireccion")
	{
		$buscaSubdireccion="select * from usuario where nombre='".$_POST["Usuario"]."' and passwordUsuario='".$_POST["Contrasena"]."'  and idUsuario='3'";
		$respuesta=mysql_query($buscaSubdireccion,$local);
		$row=mysql_fetch_array($respuesta);

		//OBTENER EL NOMBRE
		$_subdireccionNombre="select nombre from usuario where nombre ='".$_POST['Usuario']."'";
		$respuestaNombre=mysql_query($_subdireccionNombre,$local);
		$rowNombre=mysql_fetch_array($respuestaNombre);

		$nombre=$row['nombre'];

		if (mysql_num_rows($respuesta)==0)
		{
			  echo("<script type='text/javascript'>
			  alert('El usuario no existe');
			  window.location='Login.php?seleccionado=subdireccion';
			</script>");
		}
		else
		{
			session_start();
			$_SESSION["sesion"]=$nombre;
				echo("<script type='text/javascript'>
				window.location='../Subdireccion/index.php';
				</script>");
		}
	}

?>
