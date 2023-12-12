<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Interfaz</title>
        <style>
            div.tabla {
                margin: 20px;
                text-align: center;
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <div class='tabla'>
            <h1>Tabla CITA</h1>
            <table class='tabla-cita' border=2 style='border-collapse: collapse; margin: 10px auto;'>
                <tr style='background: linear-gradient(darkred, black); color: white;'>
                    <th style='width:100px; height:50px; font-size: 20px;'>DNI</th>
                    <th style='width:100px; height:50px; font-size: 20px;'>Nombre</th>
                    <th style='width:100px; height:50px; font-size: 20px;'>Telefono</th>
                    <th style='width:250px; height:50px; font-size: 20px;'>Correo</th>
                    <th style='width:100px; height:50px; font-size: 20px;'>Fecha</th>
                    <th style='width:80px; height:50px; font-size: 20px;'>Hora</th>
                    <th style='width:130px; height:50px; font-size: 20px;'>IdPaciente</th>
                    <th style='width:150px; height:50px; font-size: 20px;'>Sintomas</th>
                </tr>
                <?php
                require('Conexion.php');

                $sql = $conexion ->  query('SELECT * FROM cita');
                while ($resultado = $sql -> fetch_assoc()){
                    echo '<tr>';
                    echo '<td style="height:30px;">'.$resultado['dni'].'</td>';
                    echo '<td style="height:30px;">'.$resultado['nombre'].'</td>';
                    echo '<td style="height:30px;">'.$resultado['telefono'].'</td>';
                    echo '<td style="height:30px;">'.$resultado['correo'].'</td>';
                    echo '<td style="height:30px;">'.$resultado['fecha'].'</td>';
                    echo '<td style="height:30px;">'.$resultado['hora'].'</td>';
                    echo '<td style="height:30px;">'.$resultado['idpaciente'].'</td>';
                    echo '<td style="height:30px;">'.$resultado['sintomas'].'</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>

        <div class='tabla'>
            <h1>Tabla DUEÑO</h1>
            <table class='tabla-dueño' border=2 style='border-collapse: collapse; margin: 10px auto;'>
                <tr style='background: linear-gradient(darkorange, black); color: white;'>
                    <th style='width:100px; height:50px; font-size: 20px;'>DNI</th>
                    <th style='width:100px; height:50px; font-size: 20px;'>Nombre</th>
                    <th style='width:130px; height:50px; font-size: 20px;'>IdPaciente</th>
                    <th style='width:80px; height:50px; font-size: 20px;'>Edad</th>
                    <th style='width:100px; height:50px; font-size: 20px;'>Telefono</th>
                </tr>
                <?php
                require('Conexion.php');

                $sql1 = $conexion ->  query('SELECT * FROM dueño');
                while ($resultado1 = $sql1 -> fetch_assoc()){
                    echo '<tr>';
                    echo '<td style="height:30px;">'.$resultado1['dni'].'</td>';
                    echo '<td style="height:30px;">'.$resultado1['nombre'].'</td>';
                    echo '<td style="height:30px;">'.$resultado1['idpaciente'].'</td>';
                    echo '<td style="height:30px;">'.$resultado1['edad'].'</td>';
                    echo '<td style="height:30px;">'.$resultado1['telefono'].'</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>

        <div class='tabla'>
            <h1>Tabla HISTORIAL</h1>
            <table class='tabla-historial' border=2 style='border-collapse: collapse; margin: 10px auto;'>
                <tr style='background: linear-gradient(darkgreen, black); color: white;'>
                    <th style='width:150px; height:50px; font-size: 20px;'>IdHistorial</th>
                    <th style='width:150px; height:50px; font-size: 20px;'>IdPaciente</th>
                    <th style='width:200px; height:50px; font-size: 20px;'>IdTratamiento</th>
                </tr>
                <?php
                require('Conexion.php');

                $sql2 = $conexion ->  query('SELECT * FROM historial');
                while ($resultado2 = $sql2 -> fetch_assoc()){
                    echo '<tr>';
                    echo '<td style="height:30px;">'.$resultado2['idhistorial'].'</td>';
                    echo '<td style="height:30px;">'.$resultado2['idpaciente'].'</td>';
                    echo '<td style="height:30px;">'.$resultado2['idtratamiento'].'</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>

        <div class='tabla'>
            <h1>Tabla MEDICAMENTO</h1>
            <table class='tabla-medicamento' border=2 style='border-collapse: collapse; margin: 10px;'>
                <tr style='background: linear-gradient(violet, black); color: white;'>
                    <th style='width:200px; height:50px; font-size: 20px;'>IdMedicamento</th>
                    <th style='width:350px; height:50px; font-size: 20px;'>Nombre</th>
                    <th style='width:100px; height:50px; font-size: 20px;'>Stock</th>
                    <th style='width:1000px; height:50px; font-size: 20px;'>Decripcion</th>
                    <th style='width:200px; height:50px; font-size: 20px;'>Fecha Elaboracion</th>
                    <th style='width:200px; height:50px; font-size: 20px;'>Fecha Vencimiento</th>
                    <th style='width:100px; height:50px; font-size: 20px;'>Precio</th>
                </tr>
                <?php
                require('Conexion.php');

                $sql3 = $conexion ->  query('SELECT * FROM medicamento');
                while ($resultado3 = $sql3 -> fetch_assoc()){
                    echo '<tr>';
                    echo '<td style="height:30px;">'.$resultado3['idmedicamento'].'</td>';
                    echo '<td style="height:30px;">'.$resultado3['nombre'].'</td>';
                    echo '<td style="height:30px;">'.$resultado3['stock'].'</td>';
                    echo '<td style="height:30px;">'.$resultado3['descripcion'].'</td>';
                    echo '<td style="height:30px;">'.$resultado3['fec_elab'].'</td>';
                    echo '<td style="height:30px;">'.$resultado3['fec_venc'].'</td>';
                    echo '<td style="height:30px;">'.$resultado3['precio'].'</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>

        <div class='tabla'>
            <h1>Tabla PACIENTE</h1>
            <table class='tabla-paciente' border=2 style='border-collapse: collapse; margin: 10px auto;'>
                <tr style='background: linear-gradient(cyan, black); color: white;'>
                    <th style='width:100px; height:50px; font-size: 20px;'>IdPaciente</th>
                    <th style='width:100px; height:50px; font-size: 20px;'>Nombre</th>
                    <th style='width:100px; height:50px; font-size: 20px;'>Especie</th>
                    <th style='width:100px; height:50px; font-size: 20px;'>Raza</th>
                    <th style='width:200px; height:50px; font-size: 20px;'>Fecha Nacimiento</th>
                    <th style='width:150px; height:50px; font-size: 20px;'>Color</th>
                    <th style='width:80px; height:50px; font-size: 20px;'>Peso</th>
                    <th style='width:80px; height:50px; font-size: 20px;'>Talla</th>
                    <th style='width:150px; height:50px; font-size: 20px;'>Edad</th>
                    <th style='width:200px; height:50px; font-size: 20px;'>Sintomas</th>
                </tr>
                <?php
                require('Conexion.php');

                $sql4 = $conexion ->  query('SELECT * FROM paciente');
                while ($resultado4 = $sql4 -> fetch_assoc()){
                    echo '<tr>';
                    echo '<td style="height:30px;">'.$resultado4['idpaciente'].'</td>';
                    echo '<td style="height:30px;">'.$resultado4['nombre'].'</td>';
                    echo '<td style="height:30px;">'.$resultado4['especie'].'</td>';
                    echo '<td style="height:30px;">'.$resultado4['raza'].'</td>';
                    echo '<td style="height:30px;">'.$resultado4['fec_nacimiento'].'</td>';
                    echo '<td style="height:30px;">'.$resultado4['color'].'</td>';
                    echo '<td style="height:30px;">'.$resultado4['peso'].'</td>';
                    echo '<td style="height:30px;">'.$resultado4['talla'].'</td>';
                    echo '<td style="height:30px;">'.$resultado4['edad'].'</td>';
                    echo '<td style="height:30px;">'.$resultado4['sintomas'].'</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>

        <div class='tabla'>
            <h1>Tabla PERSONAL</h1>
            <table class='tabla-personal' border=2 style='border-collapse: collapse; margin: 10px auto;'>
                <tr style='background: linear-gradient(lightblue, black); color: white;'>
                    <th style='width:100px; height:50px; font-size: 20px;'>DNI</th>
                    <th style='width:100px; height:50px; font-size: 20px;'>Nombre</th>
                    <th style='width:100px; height:50px; font-size: 20px;'>Cargo</th>
                    <th style='width:80px; height:50px; font-size: 20px;'>Edad</th>
                    <th style='width:150px; height:50px; font-size: 20px;'>Turno</th>
                </tr>
                <?php
                require('Conexion.php');

                $sql5 = $conexion ->  query('SELECT * FROM personal');
                while ($resultado5 = $sql5 -> fetch_assoc()){
                    echo '<tr>';
                    echo '<td style="height:30px;">'.$resultado5['dni'].'</td>';
                    echo '<td style="height:30px;">'.$resultado5['nombre'].'</td>';
                    echo '<td style="height:30px;">'.$resultado5['cargo'].'</td>';
                    echo '<td style="height:30px;">'.$resultado5['edad'].'</td>';
                    echo '<td style="height:30px;">'.$resultado5['turno'].'</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>

        <div class='tabla'>
            <h1>Tabla TRATAMIENTO</h1>
            <table class='tabla-tratamiento' border=2 style='border-collapse: collapse; margin: 10px auto;'>
                <tr style='background: linear-gradient(white, black); color: white;'>
                    <th style='width:180px; height:50px; font-size: 20px;'>IdTratamiento</th>
                    <th style='width:130px; height:50px; font-size: 20px;'>IdPaciente</th>
                    <th style='width:150px; height:50px; font-size: 20px;'>Tipo</th>
                    <th style='width:150px; height:50px; font-size: 20px;'>Fecha Inicio</th>
                    <th style='width:150px; height:50px; font-size: 20px;'>Fecha Final</th>
                    <th style='width:100px; height:50px; font-size: 20px;'>Costo</th>
                </tr>
                <?php
                require('Conexion.php');

                $sql6 = $conexion ->  query('SELECT * FROM tratamiento');
                while ($resultado6 = $sql6 -> fetch_assoc()){
                    echo '<tr>';
                    echo '<td style="height:30px;">'.$resultado6['idtratamiento'].'</td>';
                    echo '<td style="height:30px;">'.$resultado6['idpaciente'].'</td>';
                    echo '<td style="height:30px;">'.$resultado6['tipo'].'</td>';
                    echo '<td style="height:30px;">'.$resultado6['fec_inicio'].'</td>';
                    echo '<td style="height:30px;">'.$resultado6['fec_final'].'</td>';
                    echo '<td style="height:30px;">'.$resultado6['costo'].'</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </body>
</html>