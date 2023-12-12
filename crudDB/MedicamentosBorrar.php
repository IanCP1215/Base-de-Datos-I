<?php

include_once('Conexion.php');
$resultado=$conexion -> query("DELETE FROM medicamento where idmedicamento='".$_REQUEST['idmedicamento']."';");
header("location: Medicamentos.php");

?>