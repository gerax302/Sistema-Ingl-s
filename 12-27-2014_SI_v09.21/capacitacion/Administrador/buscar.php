<?php require_once('../Connections/local.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
    {
        if (PHP_VERSION < 6) {
            $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        }

        $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

        switch ($theType) {
            case "text":
            $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
            break;
            case "long":
            case "int":
            $theValue = ($theValue != "") ? intval($theValue) : "NULL";
            break;
            case "double":
            $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
            break;
            case "date":
            $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
            break;
            case "defined":
            $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
            break;
        }
        return $theValue;
    }
}

$colname_busquedaprofesor = "-1";
if (isset($_GET['buscar'])) {
    $colname_busquedaprofesor = $_GET['buscar'];
}
mysql_select_db($database_local, $local);
$query_busquedaprofesor = sprintf("SELECT * FROM profesores WHERE nombre LIKE %s ORDER BY nombre ASC", GetSQLValueString("%" . $colname_busquedaprofesor . "%", "text"));
$busquedaprofesor = mysql_query($query_busquedaprofesor, $local) or die(mysql_error());
$row_busquedaprofesor = mysql_fetch_assoc($busquedaprofesor);
$totalRows_busquedaprofesor = mysql_num_rows($busquedaprofesor);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/BaseAdmin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Sistema de Control de Ingles ITSZaS</title>
    <!-- InstanceEndEditable -->
    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->
    <link href="../estilos/EstiloPrincipal.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="container">
        <div class="header"></div>
        <div class="sidebar1">
            <?php include("../includes/cabecera_admin.php")?>

            <!-- end .sidebar1 --></div>
            <div class="content">
            <!-- InstanceBeginEditable name="Contenido" -->
            <h1>Lista de Profesores</h1>
            <form id="form1" name="form1" method="get" action="buscar.php">
            <p>
            <label for="buscar">Búsqueda</label>
            <input name="buscar" type="text" id="buscar" size="80" />
            <input type="submit" name="Buscar" id="Buscar" value="Mostrar Resultados" />
            </p>
            <p>&nbsp;</p>
            </form>
            <div>Su búsqueda
            ha devuelto <?php echo $totalRows_busquedaprofesor ?> resultados:</div>
            <p>&nbsp;</p>
            <table width="100%" border="1" cellspacing="1" cellpadding="1">
                <tr>
                    <th scope="col">Matrícula</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Opciones</th>
                </tr>
                <?php do { ?>
                    <tr>
                        <td><?php echo $row_busquedaprofesor['matricula']; ?></td>
                        <td><?php echo $row_busquedaprofesor['nombre']; ?></td>
                        <td align="center">Editar - Eliminar</td>
                    </tr>
                    <?php } while ($row_busquedaprofesor = mysql_fetch_assoc($busquedaprofesor)); ?>
                </table>
                <p>&nbsp;</p>
                <p>Seleccione una opción del menú</p>

                <!-- InstanceEndEditable --></div>
                <div class="footer">
                    <p>Administración Sistema Ingles</p>
                    <!-- end .footer --></div>
                    <!-- end .container --></div>
                </body>
                <!-- InstanceEnd --></html>
                <?php
                mysql_free_result($busquedaprofesor);
                ?>
