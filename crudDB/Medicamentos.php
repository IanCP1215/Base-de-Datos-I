<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Citas</title>
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
                background: linear-gradient(#ED1212, black);
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
                width: 80%;
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
                width: 20%;
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
            <p>Registro de Medicamentos</p>
        </div>
        <div id='contenido'>
        <table border='1'>
                <tr>
                    <th style='width:130px; height:50px;'>IdMedicamento</th>
                    <th style='width:200px; height:50px;'>Nombre</th>
                    <th style='width:80px; height:50px;'>Stock</th>
                    <th style='width:400px; height:50px;'>Descripcion</th>
                    <th style='width:100px; height:50px;'>Fecha Elaboracion</th>
                    <th style='width:100px; height:50px;'>Fecha de Vencimiento</th>
                    <th style='width:80px; height:50px;'>Precio</th>
                    <th style='width:200px; height:50px;'>Acciones</th>
                </tr>
                <?php
                require('Conexion.php');

                $pacientes = $conexion ->  query('SELECT * FROM medicamento');
                while ($resultado = $pacientes -> fetch_assoc()){
                    echo '<tr>';
                    echo '<td>'.$resultado['idmedicamento'].'</td>';
                    echo '<td>'.$resultado['nombre'].'</td>';
                    echo '<td>'.$resultado['stock'].'</td>';
                    echo '<td>'.$resultado['descripcion'].'</td>';
                    echo '<td>'.$resultado['fec_elab'].'</td>';
                    echo '<td>'.$resultado['fec_venc'].'</td>';
                    echo '<td>'.$resultado['precio'].'</td>';
                    echo '<td><a class="btn-actualizar" href="MedicamentosActualizar.php?idmedicamento='.$resultado["idmedicamento"].'">Actualizar</a><a class="btn-borrar" href="MedicamentosBorrar.php?idmedicamento='.$resultado["idmedicamento"].'">Borrar</a></td>';
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
                <a class='btn-agregar' href='MedicamentosIngresar.php'>Agregar Medicamento</a>
            </div>
        </div>
    </body>
</html>