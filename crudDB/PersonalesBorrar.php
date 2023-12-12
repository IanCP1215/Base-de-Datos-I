<?php

include_once('Conexion.php');
$resultado=$conexion -> query("DELETE FROM personal where dni='".$_REQUEST['dni']."';");
header("location: Personales.php");

?>