<?php

include_once('Conexion.php');
$resultado=$conexion -> query("DELETE FROM cita where dni='".$_REQUEST['dni']."' AND idpaciente='".$_REQUEST['idpaciente']."';");
header("location: Citas.php");

?>