<?php

include_once('Conexion.php');
$resultado=$conexion -> query("DELETE FROM paciente where idpaciente='".$_REQUEST['idpaciente']."';");
header("location: Pacientes.php");

?>