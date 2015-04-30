<?php 
	//Destriza la sesion de cada página a la que se le de Salir
	session_start();
	$salir = session_destroy (); 

	if ($salir == true) {
    	header ("Location: ../index.php"); 
	}
	else 
	    echo "Ha fallado el sistema"; 
?>