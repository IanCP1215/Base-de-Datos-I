<?php

include_once('Conexion.php');
$resultado=$conexion -> query("DELETE FROM historial where idhistorial='".$_REQUEST['idhistorial']."';");
header("location: Historiales.php");

?>