<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Iniciar Sesión</title>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<style type="text/css">
a:link {
	color: #060;
}
a:visited {
	color: #060;
}

</style>

<style type="text/css">
A:hover{color:black}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<!-- -->
<script>var __links = document.querySelectorAll('a');function __linkClick(e) { parent.window.postMessage(this.href, '*');} ;for (var i = 0, l = __links.length; i < l; i++) {if ( __links[i].getAttribute('data-t') == '_blank' ) { __links[i].addEventListener('click', __linkClick, false);}}</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>$(document).ready(function(c) {
	$('.alert-close').on('click', function(c){
		$('.message').fadeOut('slow', function(c){
	  		$('.message').remove();
		});
	});	  
});
</script>
</head>
<body>
<!-- Form -->	
<div class="message warning">
<div class="inset">
	<div class="login-head">
		<h1>Iniciar Sesión</h1>
        <?php 
			$recibido = $_GET["seleccionado"];
			$placeHolder = "";

			if($recibido == "alumno") 
				$placeHolder = "Número de Control";	
			
			if($recibido == "profesor")
				$placeHolder = "Matrícula";
			
			if($recibido == "administrador")
				$placeHolder = "Usuario";
			
			if($recibido == "secretaria")
				$placeHolder = "Usuario";
			
			if($recibido == "subdireccion")
				$placeHolder = "Usuario";																						
		?>			
	</div>
		<form action="Logica_Login.php?usuarioRecibido=<?php echo ($recibido);?>" method="post" autocomplete="on">
			<li>
				<input type="text" class="text" name="Usuario"  placeholder="<?php echo ($placeHolder); ?>"> <a class=" icon user"></a>
			</li>
				<div class="clear"> </div>
			<li>
				<input type="password"  name="Contrasena" placeholder="Contraseña"> <a class="icon lock"></a>
			</li>
			<div class="clear"> </div>
			<div class="submit">
			  <div align="center">
			    <input type="submit" onclick="myFunction()" value="Entrar" >
		      </div>
              <a href ="../Recuperar_Contrasena.php?usuarioLogin=<?php echo ($recibido);?>">
              <label><br> Recuperar Contraseña</br></label> </a>
              <a href="../index.php">
              <label >Regresar</label>
              </a>
			  <div class="clear" > </div>	
			</div>
		</form>
		</div>					
	</div>
	</div>
<div class="clear"> </div>
<!--- footer --->
<div class="footer">
</div>
</body>
</html>