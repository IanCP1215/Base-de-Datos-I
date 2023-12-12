<?php

if (!empty($_POST['Ingresar'])){
    if (empty($_POST['user']) and empty($_POST['password'])){
        echo '<script>alert("LOS CAMPOS ESTAN VACIOS");</script>';
    } else{
        $user = $_POST['user'];
        $clave = $_POST['clave'];

        $users = $conexion -> query("SELECT * FROM usuarios where usuario='".$user."' and clave='".$clave."';");
        if ($busqueda = $users -> fetch_assoc()){
            header('location: Bienvenido.php');
        } else{
            echo '<script>alert("ACCESO DENEGADO");</script>';
        }
    }
}

?>