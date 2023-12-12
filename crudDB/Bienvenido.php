<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Principal</title>
        <style>
            body{
                margin: 0px;
                padding: 0px;
                background-color: lightgray;
                display: flex;
            }
            div {
                border: 1px solid black;
            }
            #contenido1{
                width: 250px;
                height: 650px;
                justify-content: center;
                align-items: center;
                background-color: #252525;
            }
            #titulo1{
                width: 225px;
                height: 120px;
                color: white;
                align-items: center;
                justify-content: center;
                display: flex;
                margin-top: 20px;
                margin-bottom: 20px;
                border: 3px solid white;
                border-radius: 25px;
                margin-left: 10px;
            }
            #veterinaria{
                margin-top: 75px;
                margin-left: -125px;
                margin-right: 50px;
            }
            #titulo1 img{
                width: 70px;
                height: 70px;
                margin: 10px;
                border-radius: 15px;
            }
            #titulo1 p{
                font-size: 40px;
            }
            #titulo2{
                width: 225px;
                height: 470px;
                justify-content: center;
                border: 3px solid white;
                border-radius: 25px;
                margin-left: 10px;
                align-items: center; 
            }
            #titulo2 .sub2{
                width: 225px;
                height: 50px;
                display: flex;
                border: 3px solid white;
                border-radius: 25px;
                align-items: center;
                margin-left: -3px;
                margin-top: 10px;
            }
            #titulo2 .sub2 img{
                width: 40px;
                height: 40px;
                border-radius: 20px;
                margin-left: 20px;
            }
            #titulo2 .sub2 .etiquetaA{
                font-size: 20px;
                color: white;
                text-decoration: none;
                margin-left: 30px;
            }
            #titulo2 .sub2 .etiquetaA:hover{
                background-color: white;
                color: gray;
                padding: 15px;
                width: 195px;
                text-align: center;
                margin: -60px;
                border-radius: 25px;
            }
            #contenido2{
                width: 1150px;
                height: 650px;
                justify-content: center;
                align-items: center;
            }
            #titulo3{
                width: 1150px;
                height: 150px;
                justify-content: center;
                display: flex;
                margin-top: 20px;
                margin-bottom: 20px;
            }
            #titulo3 .sub3 {
                width: 280px;
                height: 150px;
            }
            #titulo3 .sub3 .subsub3-1{
                width: 270px;
                height: 100px;
                margin: 5px;
                display: flex;
            }
            #titulo3 .sub3 .subsub3-1 .contador-vista{
                font-size: 70px;
                color: white;
                margin-left: 10px;
                margin-top: 10px;
            }
            #titulo3 .sub3 .subsub3-1 .subsubsub3-1{
                width: 170px;
                height: 100px;
            }
            #titulo3 .sub3 .subsub3-1 .subsubsub3-2{
                width: 100px;
                height: 100px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            #titulo3 .sub3 .subsub3-1 .subsubsub3-2 img{
                width: 90px;
                height: 90px;
                border-radius: 45px;
            }
            #titulo3 .sub3 .subsub3-2{
                width: 270px;
                height: 30px;
                margin: 5px;
                justify-content: center;
                display: flex;
                align-items: center;
            }
            #titulo3 .sub3 .subsub3-2 .etiquetaA{
                font-size: 25px;
                color: white;
                text-decoration: none;
            }
            #titulo4{
                width: 1150px;
                height: 400px;
                justify-content: center;
                align-items: center;
                overflow: auto;
            }
            #titulo4 h1{
                font-size: 35px;
                text-align: center;
                color: white;
            }
            #titulo4 table {
                border-collapse: collapse;
                margin: 10px;
                font-size: 15px;
            }
            #titulo4 table tr {
                font-size: 15px;
                text-align: center;
                border-bottom: 5px solid lightblue;
            }
            #titulo4 table tr:hover td{
                background-color: gray;
                color: white;
            }
            #titulo4 table th {
                background: linear-gradient(gray, black);
                color: white;
            }
            #titulo4 table td {
                height: 35px;
                background: white;
            }
        </style>
    </head>
    <body>
    <div id='contenido1'>
        <div id='titulo1'>
            <img src='kenna.jfif'></img>
            <p>KENNA</p>
            <p id='veterinaria' style='font-size: 20px;'>Veterinaria</p>
        </div>
        <div id='titulo2'>
            <div class='sub2'>
                <img src='inicio.png'></img>
                <a class='etiquetaA' href=''>Inicio</a>
            </div>
            <div class='sub2'>
                <img src='logo dueno.jpg'></img>
                <a class='etiquetaA' href='Dueños.php'>Dueños</a>
            </div>
            <div class='sub2'>
                <img src='personal.png'></img>
                <a class='etiquetaA' href='Personales.php'>Personales</a>
            </div>
            <div class='sub2'>
                <img src='registros.png'></img>
                <a class='etiquetaA' href='Registros.php'>Registros</a>
            </div>
            <div class='sub2'>
                <img src='facebook.png'></img>
                <a class='etiquetaA' href='https://www.facebook.com/people/KENNA-Vet/100063100876022/'>Facebook</a>
            </div>
            <div class='sub2'>
                <img src='eventos.png'></img>
                <a class='etiquetaA' href=''>Eventos</a>
            </div>
            <div class='sub2'>
                <img src='salir.png'></img>
                <a class='etiquetaA' href='Login.php'>Salir</a>
            </div>
        </div>
    </div>
    <div id='contenido2'>
        <div id='titulo3'>
            <div class='sub3'>
                <div class='subsub3-1'>
                    <div class='subsubsub3-1'  style='background-color: #0ED7D7'>
                        <?php
                        require('Conexion.php');
                        $total = $conexion -> query("SELECT "."COUNT(*)"." FROM paciente;");
                        while ($contador = $total -> fetch_assoc()){
                            echo "<p class='contador-vista'>".$contador['COUNT(*)']."</p>";
                        }
                        ?>
                    </div>
                    <div class='subsubsub3-2'  style='background-color: #0CABAB'>
                        <img src='logo mascotas.jpg'></img>
                    </div>
                </div>
                <div class='subsub3-2' style='background-color: #098383'>
                    <a class='etiquetaA' href='Pacientes.php'>Ver Pacientes</a>
                </div>
            </div>
            <div class='sub3'>
                <div class='subsub3-1'>
                    <div class='subsubsub3-1' style='background-color: #10E014'>
                        <?php
                        require('Conexion.php');
                        $total = $conexion -> query("SELECT "."COUNT(*)"." FROM cita;");
                        while ($contador = $total -> fetch_assoc()){
                            echo "<p class='contador-vista'>".$contador['COUNT(*)']."</p>";
                        }
                        ?>
                    </div>
                    <div class='subsubsub3-2' style='background-color: #0CB30F'>
                        <img src='logo citas.png'></img>
                    </div>
                </div>
                <div class='subsub3-2' style='background-color: #09830B'>
                    <a class='etiquetaA' href='Citas.php'>Ver Citas</a>
                </div>
            </div>
            <div class='sub3'>
                <div class='subsub3-1'>
                    <div class='subsubsub3-1' style='background-color: #E09410'>
                        <?php
                        require('Conexion.php');
                        $total = $conexion -> query("SELECT "."COUNT(*)"." FROM historial;");
                        while ($contador = $total -> fetch_assoc()){
                            echo "<p class='contador-vista'>".$contador['COUNT(*)']."</p>";
                        }
                        ?>
                    </div>
                    <div class='subsubsub3-2' style='background-color: #BD7D0E'>
                        <img src='logo historiales.jfif'></img>
                    </div>
                </div>
                <div class='subsub3-2' style='background-color: #94620A'>
                    <a class='etiquetaA' href='Historiales.php'>Ver Historiales</a>
                </div>
            </div>
            <div class='sub3'>
                <div class='subsub3-1'>
                    <div class='subsubsub3-1' style='background-color: #ED1212'>
                        <?php
                        require('Conexion.php');
                        $total = $conexion -> query("SELECT "."COUNT(*)"." FROM medicamento;");
                        while ($contador = $total -> fetch_assoc()){
                            echo "<p class='contador-vista'>".$contador['COUNT(*)']."</p>";
                        }
                        ?>
                    </div>
                    <div class='subsubsub3-2' style='background-color: #BD0E0E'>
                        <img src='logo medicamentos.jfif'></img>
                    </div>
                </div>
                <div class='subsub3-2' style='background-color: #940A0A'>
                    <a class='etiquetaA' href='Medicamentos.php'>Ver Medicamentos</a>
                </div>
            </div>
        </div>
        <div id='titulo4'>
        <h1>Mascotas Registradas</h1>
            <table>
                <tr>
                    <th style='width:80px; height:50px;'>IdPaciente</th>
                    <th style='width:80px; height:50px;'>Nombre</th>
                    <th style='width:80px; height:50px;'>Especie</th>
                    <th style='width:100px; height:50px;'>Raza</th>
                    <th style='width:150px; height:50px;'>Fecha Nacimiento</th>
                    <th style='width:150px; height:50px;'>Color</th>
                    <th style='width:70px; height:50px;'>Peso</th>
                    <th style='width:70px; height:50px;'>Talla</th>
                    <th style='width:150px; height:50px;'>Edad</th>
                    <th style='width:180px; height:50px;'>Sintomas</th>
                </tr>
                <?php
                require('Conexion.php');

                $pacientes = $conexion ->  query('SELECT * FROM paciente');
                while ($resultado = $pacientes -> fetch_assoc()){
                    echo '<tr>';
                    echo '<td>'.$resultado['idpaciente'].'</td>';
                    echo '<td>'.$resultado['nombre'].'</td>';
                    echo '<td>'.$resultado['especie'].'</td>';
                    echo '<td>'.$resultado['raza'].'</td>';
                    echo '<td>'.$resultado['fec_nacimiento'].'</td>';
                    echo '<td>'.$resultado['color'].'</td>';
                    echo '<td>'.$resultado['peso'].'</td>';
                    echo '<td>'.$resultado['talla'].'</td>';
                    echo '<td>'.$resultado['edad'].'</td>';
                    echo '<td>'.$resultado['sintomas'].'</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>
    </body>
</html>