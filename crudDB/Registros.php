<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pacientes</title>
        <style>
            body{
                background: linear-gradient(gray, black);
            }
            div{
                border: 1px solid black;
            }
            #cabeza{
                width: 100%;
                height: 75px;
                background-color: black;
                border-radius: 20px;
            }
            #cabeza p{
                font-size: 50px;
                text-align: center;
                margin-top: 10px;
                color: white
            }
            #contenido{
                width: 100%;
                height: 525px;
                justify-content: center;
                overflow: auto;
                display: flex;
            }
            #contenido table{
                border-collapse: collapse;
                margin-top: 10px;
                font-size: 15px;
            }
            #contenido table tr {
                font-size: 15px;
                text-align: center;
                border-bottom: 5px solid lightblue;
                border-radius: 5px;
            }
            #contenido table tr:hover td{
                background-color: gray;
                color: white;
            }
            #contenido table th {
                background: linear-gradient(gray, black);
                color: white;
            }
            #contenido table td {
                height: 35px;
                background: white;
            }
            #pie{
                width: 100%;
                height: 50px;
                background-color: white;
                border-radius: 20px;
                display: flex;
                align-items: center;
            }
            #subpie1{
                width: 100%;
                height: 50px;
                background-color: white;
                border-radius: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            #subpie1 .btn-regresar{
                background-color: #002d2b;
                color: white;
                padding: 10px;
                border-radius: 10px;
                margin-top: 30px;
                margin-left: 50px;
                margin-right: 30px;
                margin-bottom: 30px;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div id='cabeza'>
            <p>Registros</p>
        </div>
        <div id='contenido'>
        <table border='1'>
                <tr>
                    <th style='width:120px; height:50px;'>IdDBRegistros</th>
                    <th style='width:250px; height:50px;'>Accion</th>
                    <th style='width:150px; height:50px;'>Fecha</th>
                    <th style='width:800px; height:50px;'>Descripcion</th>
                </tr>
                <?php
                require('Conexion.php');

                $pacientes = $conexion ->  query('SELECT * FROM dbregistros');
                while ($resultado = $pacientes -> fetch_assoc()){
                    echo '<tr>';
                    echo '<td>'.$resultado['idDBregistros'].'</td>';
                    echo '<td>'.$resultado['accion'].'</td>';
                    echo '<td>'.$resultado['fecha'].'</td>';
                    echo '<td>'.$resultado['descripcion'].'</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
        <div id='pie'>
            <div id='subpie1'>
                <a class='btn-regresar' href='Bienvenido.php'>Regresar</a>
            </div>
        </div>
    </body>
</html>