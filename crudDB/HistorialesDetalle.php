<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HistorialesDetalle</title>
        <style>
            body{
                justify-content: center;
                display: flex;
            }
            div {
                border: 1px solid black;
            }
            #contenido {
                width: 500px;
                height: 600px;
                justify-content: center;
                text-align: center;
            }
            #sub1 {
                width: 450px;
                margin-left: 25px;
                margin-top: 15px;
            }
            #sub1 p{
                text-align: right;
            }
            #sub2 {
                width: 450px;
                margin-left: 25px;
            }
            #subsub1 {
                margin-left: 12.5px;
                width: 425px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            #subsub1 h1 {
                text-align: center;
                font-size: 30px;
                margin-top: 20px;
            }
            #subsub1 img {
                width: 50px;
                height: 50px;
                margin-left: 100px;
            }
            #subsub2 h2 {
                text-align: center;
                font-size: 20px;
                margin-top: 50px;
            }
            #sub3 {
                width: 450px;
                margin-left: 25px;
                align-items: center;
                justify-content: center;
            }
            #sub3 h2 {
                text-align: center;
                font-size: 20px;
                margin-top: 10px;
            }
            #sub3 table {
                margin: 0px;
                font-size: 15px;
                width: 450px;
                border-collapse: collapse;
                text-align: left;
            }
            #sub3 table p {
                margin-left: 15px;
                margin-top: 5px;
                margin-bottom: 5px;
            }
            #sub4 {
                width: 450px;
                margin-left: 25px;
                align-items: center;
                justify-content: center;
            }
            #sub4 h2 {
                text-align: center;
                font-size: 20px;
                margin-top: 10px;
            }
            #sub4 table {
                margin-left: 25px;
                font-size: 15px;
                width: 400px;
                border-collapse: collapse;
            }
            #sub4 table p {
                margin-top: 5px;
                margin-bottom: 5px;
            }
            #sub5 {
                width: 450px;
                margin-left: 25px;
                align-items: center;
                justify-content: center;
                margin-top: 20px;
                border: 0px;
            }
            #sub5 .btn-regresar {
                background-color: #002d2b;
                color: white;
                padding: 10px;
                border-radius: 10px;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <?php
        include('Conexion.php');
        $tratamiento=$conexion -> query("SELECT * FROM tratamiento WHERE idtratamiento IN (SELECT idtratamiento FROM historial WHERE idhistorial ='".$_REQUEST['idhistorial']."');");
        $paciente=$conexion -> query("SELECT * FROM paciente WHERE idpaciente IN (SELECT idpaciente FROM historial WHERE idhistorial ='".$_REQUEST['idhistorial']."');");
        
        while($resultado = $tratamiento -> fetch_assoc()){
            while($filas = $paciente -> fetch_assoc()){
                echo "<div id='contenido'><div id='sub1'><p><strong>Codigo Tratamiento:</strong> ".$resultado["idtratamiento"]."</p></div>";
                echo "<div id='sub2'><div id='subsub1'><h1>Veterinaria Kenna</h1><img src='kenna.jfif'></div><div id='subsub2'><h2>Ficha de Tratamiento Mascota</h2></div></div>";
                echo "<div id='sub3'><h2>Datos del Paciente</h2><table border='0'><tr><td><p><strong>Nombre:</strong> ".$filas["nombre"]."</p></td><td><p><strong>Codigo:</strong> ".$filas["idpaciente"]."</p></td></tr>";
                echo "<tr><td><p><strong>Fecha de nacimiento:</strong> ".$filas["fec_nacimiento"]."</p></td><td><p><strong>Especie:</strong> ".$filas["especie"]."</p></td></tr><tr><td><p><strong>Edad:</strong> ".$filas["edad"]."</p></td><td><p><strong>Sintomas:</strong> ".$filas["sintomas"]."</p></td></tr></table></div><div id='sub4'><h2>Datos de Tratamiento</h2>";
                echo "<table border='1'><tr><td><p><strong>Tipo:</strong> </td><td>".$resultado["tipo"]."</p></td></tr>";
                echo "<tr><td><p><strong>Tiempo:</strong> </td><td>".$resultado["tiempo"]."</p></tr></td><tr><td><p><strong>Costo:</strong></td><td> S/. ".$resultado["costo"]."</p></tr></td></table></div><div id='sub5'><a class='btn-regresar' href='Historiales.php'>Regresar</a></div></div>";
            }
        }
        ?>
    </body>
</html>