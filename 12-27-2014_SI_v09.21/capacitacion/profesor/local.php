<?php
$hostname_local = "localhost";
$database_local = "ingles";
$username_local = "root";
$password_local = "";
 
$local = mysql_connect($hostname_local, $username_local, $password_local);

//mysqli_set_charset($local, "utf8");

//if (!$local) {
  //  die('No pudo conectarse: ' . mysql_error());
//}
//echo 'Conectado satisfactoriamente';


?>