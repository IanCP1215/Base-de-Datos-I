<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Historiales</title>
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
                margin: 10px;
                font-size: 15px;
            }
            #contenido table tr td .btn-actualizar{
                background-color: #e1ad01;
                color: black;
                padding: 10px;
                border-radius: 10px;
                text-decoration: none;
            }
            #contenido table tr td .btn-borrar{
                background-color: #d51000;
                color: white;
                padding: 10px;
                border-radius: 10px;
                margin-left: 10px;
                text-decoration: none;
            }
            #contenido table tr td .btn-detalle{
                background-color: #00a041;
                color: white;
                padding: 10px;
                border-radius: 10px;
                margin-left: 10px;
                text-decoration: none;
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
                background: linear-gradient(#E09410, black);
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
                width: 85%;
                height: 50px;
                background-color: white;
                border-radius: 20px;
                display: flex;
                align-items: center;
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
            #subpie2{
                width: 15%;
                height: 50px;
                background-color: white;
                border-radius: 20px;
                display: flex;
                align-items: center;
            }
            #subpie2 .btn-agregar{
                background-color: #00a041;
                color: white;
                padding: 10px;
                border-radius: 10px;
                margin: 30px;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div id='cabeza'>
            <p>Registro de Historiales</p>
        </div>
        <div id='contenido'>
        <table border='1'>
                <tr>
                    <th style='width:150px; height:50px;'>Codigo Historial</th>
                    <th style='width:150px; height:50px;'>Codigo Paciente</th>
                    <th style='width:180px; height:50px;'>Codigo Tratamiento</th>
                    <th style='width:300px; height:50px;'>Acciones</th>
                </tr>
                <?php
                require('Conexion.php');

                $pacientes = $conexion ->  query('SELECT * FROM historial');
                while ($resultado = $pacientes -> fetch_assoc()){
                    echo '<tr>';
                    echo '<td>'.$resultado['idhistorial'].'</td>';
                    echo '<td>'.$resultado['idpaciente'].'</td>';
                    echo '<td>'.$resultado['idtratamiento'].'</td>';
                    echo '<td><a class="btn-actualizar" href="HistorialesActualizar.php?idhistorial='.$resultado["idhistorial"].'">Actualizar</a><a class="btn-borrar" href="HistorialesBorrar.php?idhistorial='.$resultado["idhistorial"].'">Borrar</a><a class="btn-detalle" href="HistorialesDetalle.php?idhistorial='.$resultado["idhistorial"].'">Ver Detalle</a></td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
        <div id='pie'>
            <div id='subpie1'>
                <a class='btn-regresar' href='Bienvenido.php'>Regresar</a>
            </div>
            <div id='subpie2'>
                <a class='btn-agregar' href='HistorialesIngresar.php'>Agregar Historial</a>
            </div>
        </div>
    </body>
</html>