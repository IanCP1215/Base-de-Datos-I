<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dueños</title>
        <style>
            body{
                background: linear-gradient(gray, black);
            }
            div{
                border: 1px solid black;
            }
            #cabeza1{
                width: 100%;
                height: 75px;
                background-color: black;
                border-radius: 20px;
            }
            #cabeza1 p{
                font-size: 50px;
                text-align: center;
                margin-top: 10px;
                color: white
            }
            #subcabeza{
                width: 1385px;
                height: 125px;
                display: flex;
            }
            #subcabeza p{
                font-size: 40px;
                margin-top: 35px;
                margin-left: 30px;
                color: white
            }
            #subsub1{
                width: 1150px;
                height: 125px;
                text-align: center;
            }
            #subsub2{
                width: 900px;
                height: 125px;
                justify-content: center;
                display: flex;
                align-items: center;
            }
            #subcabeza img{
                width: 100px;
                height: 100px;
                border-radius: 50px;
                margin-left: 25px;
            }
            #cabeza2{
                width: 100%;
                height: 75px;
                background-color: black;
                border-radius: 20px;
            }
            #cabeza2 p{
                font-size: 50px;
                text-align: center;
                margin-top: 10px;
                color: white
            }
            #contenido{
                width: 100%;
                height: 325px;
                justify-content: center;
                overflow: auto;
                display: flex;
            }
            #contenido table{
                border-collapse: collapse;
                margin-top: 10px;
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
                background: linear-gradient(yellow, black);
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
        <div id='cabeza1'>
            <p>Usuario Administrador</p>
        </div>
        <div id='subcabeza'>
            <?php
            require('Conexion.php');
            $consulta = $conexion ->  query("SELECT * FROM usuarios WHERE usuario='IanCP'");
            while ($resultado = $consulta -> fetch_assoc()){
                echo "<div id='subsub1'><p><strong>".$resultado["nombre"]."</strong> es el administador</p></div>";
                echo "<div id='subsub2'><div><p><strong>".$resultado["correo"]."</strong></p></div><div><img src='logo usuario.jpg'></img></div></div>";
            }
            ?>
        </div>
        <div id='cabeza2'>
            <p>Registro de Personales</p>
        </div>
        <div id='contenido'>
        <table border='1'>
                <tr>
                    <th style='width:100px; height:50px;'>DNI</th>
                    <th style='width:100px; height:50px;'>Nombre</th>
                    <th style='width:120px; height:50px;'>Cargo</th>
                    <th style='width:80px; height:50px;'>Edad</th>
                    <th style='width:150px; height:50px;'>Turno</th>
                    <th style='width:200px; height:50px;'>Acciones</th>
                </tr>
                <?php
                require('Conexion.php');

                $pacientes = $conexion ->  query('SELECT * FROM personal');
                while ($resultado = $pacientes -> fetch_assoc()){
                    echo '<tr>';
                    echo '<td>'.$resultado['dni'].'</td>';
                    echo '<td>'.$resultado['nombre'].'</td>';
                    echo '<td>'.$resultado['cargo'].'</td>';
                    echo '<td>'.$resultado['edad'].'</td>';
                    echo '<td>'.$resultado['turno'].'</td>';
                    echo '<td><a class="btn-actualizar" href="PersonalesActualizar.php?dni='.$resultado["dni"].'">Actualizar</a><a class="btn-borrar" href="PersonalesBorrar.php?dni='.$resultado["dni"].'">Borrar</a></td>';
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
                <a class='btn-agregar' href='PersonalesIngresar.php'>Agregar Personales</a>
            </div>
        </div>
    </body>
</html>