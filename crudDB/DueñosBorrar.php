<?php

include_once('Conexion.php');
$resultado=$conexion -> query("DELETE FROM dueño where dni='".$_REQUEST['dni']."' AND idpaciente='".$_REQUEST['idpaciente']."';");
header("location: Dueños.php");

?>