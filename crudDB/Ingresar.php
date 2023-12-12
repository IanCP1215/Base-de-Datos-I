<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Ingresar</title>
        <style>
            body {
                background: linear-gradient(black, green, black, green, black);
            }
            div {
                border: 2px solid black;
                margin: 20px auto;
                width: 690px;
                background: linear-gradient(white, gray, white, gray, white, gray, white, gray, white);
            }
            form {
                margin: 10px;
            }
            #ingresar {
                margin: 10px;
                font-size: 30px;
                width: 200px;
                height: 50px;
                background: linear-gradient(lightgreen, black);
                border-radius: 10px;
                color: white;
            }
            #borrar {
                margin: 10px;
                font-size: 30px;
                width: 200px;
                height: 50px;
                background: linear-gradient(lightgreen, black);
                border-radius: 10px;
                color: white;
            }
            #actualizar {
                margin: 10px;
                font-size: 30px;
                width: 200px;
                height: 50px;
                background: linear-gradient(lightgreen, black);
                border-radius: 10px;
                color: white;
            }
            #ingresar1 {
                margin: 10px;
                font-size: 30px;
                width: 200px;
                height: 50px;
                background: linear-gradient(lightgreen, black);
                border-radius: 10px;
                color: white;
            }
            #ingresar2 {
                margin: 10px;
                font-size: 30px;
                width: 200px;
                height: 50px;
                background: linear-gradient(lightgreen, black);
                border-radius: 10px;
                color: white;
            }
            #ingresar3 {
                margin: 10px;
                font-size: 30px;
                width: 200px;
                height: 50px;
                background: linear-gradient(lightgreen, black);
                border-radius: 10px;
                color: white;
            }
            #ingresar4 {
                margin: 10px;
                font-size: 30px;
                width: 200px;
                height: 50px;
                background: linear-gradient(lightgreen, black);
                border-radius: 10px;
                color: white;
            }
            #ingresar5 {
                margin: 10px;
                font-size: 30px;
                width: 200px;
                height: 50px;
                background: linear-gradient(lightgreen, black);
                border-radius: 10px;
                color: white;
            }
            #ingresar6 {
                margin: 10px;
                font-size: 30px;
                width: 200px;
                height: 50px;
                background: linear-gradient(lightgreen, black);
                border-radius: 10px;
                color: white;
            }
            h1 {
                color: black;
                font-size: 30px;
                text-align: center;
                font-family: 'Fuzzy Bubbles', cursive;
                margin-bottom: 40px;
            }
            p {
                font-size: 20px;
                margin-left: 40px;
            }
            input {
                height: 20px;
                margin-left: 30px;
                border-radius: 10px;
                text-align: center;
                width: 300px;
            }
        </style>
    </head>
    <body>
        <?php
        if(isset($_POST["Ingresar"])){
            require("Conexion.php");
            echo '<script>';
            echo 'alert("Datos Ingresados")';
            echo '</script>';
        ?>
        <div>
        <form action="Ingresar.php" method="POST">
            <h1>Ingresar, Borrar y Actualizar datos en la tabla DUEÑO</h1>
            <p>DNI : <input type='text' name='dni' placeholder='Ingrese un DNI' required></p>
            <p>Nombre : <input type='text' name='nombre' placeholder='Ingrese un nombre' required></p>
            <p>IdPaciente : <input type='text' name='idpaciente' placeholder='Ingrese un codigo de mascota' required></p>
            <p>Edad : <input type='text' name='edad' placeholder='Ingrese una edad' required></p>
            <p>Telefono : <input type='text' name='telefono' placeholder='Ingrese un numero de telefono' required></p>
            <br><input type="submit" onclick="validar();" id="ingresar" name="Ingresar" value="Ingresar">
            <input type="submit" onclick="validar();" id="borrar" name="Borrar" value="Borrar">
            <input type="submit" onclick="validar();" id="actualizar" name="Actualizar" value="Actualizar">
        </form><br>
        </div>
        <?php
        $dni=$_POST["dni"];
        $nombre=$_POST["nombre"];
        $idpaciente=$_POST["idpaciente"];
        $edad=$_POST["edad"];
        $telefono=$_POST["telefono"];
        $resultado=$conexion -> query("INSERT INTO dueño values ('".$dni."', '".$nombre."', '".$idpaciente."', ".$edad.", '".$telefono."');");
        echo '<center><a href="Interfaz.php" target="_blank" style="font-size: 45px; background: linear-gradient(darkblue, black);">Mostrar tablas</a></center>';        }
        elseif (isset($_POST["Borrar"])){
            require("Conexion.php");
            echo '<script>';
            echo 'alert("Datos Borrados")';
            echo '</script>';
            ?>
            <div>
            <form action="Ingresar.php" method="POST">
                <h1>Ingresar, Borrar y Actualizar datos en la tabla DUEÑO</h1>
                <p>DNI : <input type='text' name='dni' placeholder='Ingrese un DNI' required></p>
                <p>Nombre : <input type='text' name='nombre' placeholder='Ingrese un nombre' required></p>
                <p>IdPaciente : <input type='text' name='idpaciente' placeholder='Ingrese un codigo de mascota' required></p>
                <p>Edad : <input type='text' name='edad' placeholder='Ingrese una edad' required></p>
                <p>Telefono : <input type='text' name='telefono' placeholder='Ingrese un numero de telefono' required></p>
                <br><input type="submit" onclick="validar();" id="ingresar" name="Ingresar" value="Ingresar">
                <input type="submit" onclick="validar();" id="borrar" name="Borrar" value="Borrar">
                <input type="submit" onclick="validar();" id="actualizar" name="Actualizar" value="Actualizar">
            </form><br>
            </div>
            <?php
            $dni=$_POST["dni"];
            $nombre=$_POST["nombre"];
            $idpaciente=$_POST["idpaciente"];
            $edad=$_POST["edad"];
            $telefono=$_POST["telefono"];
            $resultado=$conexion -> query("DELETE FROM dueño where dni = '".$dni."';");
            echo '<center><a href="Interfaz.php" target="_blank" style="font-size: 45px; background: linear-gradient(darkblue, black);">Mostrar tablas</a></center>';        }
        elseif (isset($_POST["Actualizar"])){
            require("Conexion.php");
            echo '<script>';
            echo 'alert("Datos Actualizados")';
            echo '</script>';
            ?>
            <div>
            <form action="Ingresar.php" method="POST">
                <h1>Ingresar, Borrar y Actualizar datos en la tabla DUEÑO</h1>
                <p>DNI : <input type='text' name='dni' placeholder='Ingrese un DNI' required></p>
                <p>Nombre : <input type='text' name='nombre' placeholder='Ingrese un nombre' required></p>
                <p>IdPaciente : <input type='text' name='idpaciente' placeholder='Ingrese un codigo de mascota' required></p>
                <p>Edad : <input type='text' name='edad' placeholder='Ingrese una edad' required></p>
                <p>Telefono : <input type='text' name='telefono' placeholder='Ingrese un numero de telefono' required></p>
                <br><input type="submit" onclick="validar();" id="ingresar" name="Ingresar" value="Ingresar">
                <input type="submit" onclick="validar();" id="borrar" name="Borrar" value="Borrar">
                <input type="submit" onclick="validar();" id="actualizar" name="Actualizar" value="Actualizar">
            </form><br>
            </div>
            <?php
            $dni=$_POST["dni"];
            $nombre=$_POST["nombre"];
            $idpaciente=$_POST["idpaciente"];
            $edad=$_POST["edad"];
            $telefono=$_POST["telefono"];
            $resultado=$conexion -> query("UPDATE dueño set nombre = '".$nombre."', idpaciente = '".$idpaciente."', edad = ".$edad.", telefono = '".$telefono."' where dni = '".$dni."';");
            echo '<center><a href="Interfaz.php" target="_blank" style="font-size: 45px; background: linear-gradient(darkblue, black);">Mostrar tablas</a></center>';
        }
        else{
            ?>
            <div>
                <form action="Ingresar.php" method="POST">
                    <h1>Ingresar, Borrar y Actualizar datos en la tabla DUEÑO</h1>
                    <p>DNI : <input type='text' name='dni' placeholder='Ingrese un DNI' required></p>
                    <p>Nombre : <input type='text' name='nombre' placeholder='Ingrese un nombre' required></p>
                    <p>IdPaciente : <input type='text' name='idpaciente' placeholder='Ingrese un codigo de mascota' required></p>
                    <p>Edad : <input type='text' name='edad' placeholder='Ingrese una edad' required></p>
                    <p>Telefono : <input type='text' name='telefono' placeholder='Ingrese un numero de telefono' required></p>
                    <br><input type="submit" onclick="validar();" id="ingresar" name="Ingresar" value="Ingresar">
                    <input type="submit" onclick="validar();" id="borrar" name="Borrar" value="Borrar">
                    <input type="submit" onclick="validar();" id="actualizar" name="Actualizar" value="Actualizar">
                </form><br>
            </div>
            <?php
        }

        if(isset($_POST["Ingresar1"])){
            require("Conexion.php");
            echo '<script>';
            echo 'alert("Datos Ingresados")';
            echo '</script>';
        ?>
        <div>
        <form action="Ingresar.php" method="POST">
            <h1>Ingresar datos en la tabla PACIENTE</h1>
            <p>IdPaciente : <input type='text' name='idpaciente' placeholder='Ingrese un codigo de paciente' required></p>
            <p>Nombre : <input type='text' name='nombre' placeholder='Ingrese un nombre' required></p>
            <p>Especie : <input type='text' name='especie' placeholder='Ingrese una especie' required></p>
            <p>Raza : <input type='text' name='raza' placeholder='Ingrese una raza' required></p>
            <p>Fecha de nacimiento : <input type='text' name='fec_nacimiento' placeholder='Ingrese una fecha de nacimiento' required></p>
            <p>Color : <input type='text' name='color' placeholder='Ingrese un color' required></p>
            <p>Peso : <input type='text' name='peso' placeholder='Ingrese un peso' required></p>
            <p>Talla : <input type='text' name='talla' placeholder='Ingrese una talla' required></p>
            <p>Edad : <input type='text' name='edad' placeholder='Ingrese una edad' required></p>
            <p>Sintomas : <input type='text' name='sintomas' placeholder='Ingrese sintomas' required></p>
            <br><input type="submit" onclick="validar();" id="ingresar1" name="Ingresar1" value="Ingresar">
        </form><br>
        </div>
        <?php
        $idpaciente=$_POST["idpaciente"];
        $nombre=$_POST["nombre"];
        $especie=$_POST["especie"];
        $raza=$_POST["raza"];
        $fec_nacimiento=$_POST["fec_nacimiento"];
        $color=$_POST["color"];
        $peso=$_POST["peso"];
        $talla=$_POST["talla"];
        $edad=$_POST["edad"];
        $sintomas=$_POST["sintomas"];
        $resultado=$conexion -> query("INSERT INTO paciente values ('".$idpaciente."', '".$nombre."', '".$especie."', '".$raza."', '".$fec_nacimiento."', '".$color."', ".$peso.", ".$talla.", '".$edad."', '".$sintomas."');");
        echo '<a href="Interfaz.php" target="_blank" style="font-size: 45px; background: linear-gradient(darkblue, black);">Mostrar tablas</a>';
        }
        else{
            ?>
            <div>
                <form action="Ingresar.php" method="POST">
                    <h1>Ingresar datos en la tabla PACIENTE</h1>
                    <p>IdPaciente : <input type='text' name='idpaciente' placeholder='Ingrese un codigo de paciente' required></p>
                    <p>Nombre : <input type='text' name='nombre' placeholder='Ingrese un nombre' required></p>
                    <p>Especie : <input type='text' name='especie' placeholder='Ingrese una especie' required></p>
                    <p>Raza : <input type='text' name='raza' placeholder='Ingrese una raza' required></p>
                    <p>Fecha de nacimiento : <input type='text' name='fec_nacimiento' placeholder='Ingrese una fecha de nacimiento' required></p>
                    <p>Color : <input type='text' name='color' placeholder='Ingrese un color' required></p>
                    <p>Peso : <input type='text' name='peso' placeholder='Ingrese un peso' required></p>
                    <p>Talla : <input type='text' name='talla' placeholder='Ingrese una talla' required></p>
                    <p>Edad : <input type='text' name='edad' placeholder='Ingrese una edad' required></p>
                    <p>Sintomas : <input type='text' name='sintomas' placeholder='Ingrese sintomas' required></p>
                    <br><input type="submit" onclick="validar();" id="ingresar1" name="Ingresar1" value="Ingresar">
                </form><br>
            </div>
            <?php
        }

        if(isset($_POST["Ingresar2"])){
            require("Conexion.php");
            echo '<script>';
            echo 'alert("Datos Ingresados")';
            echo '</script>';
        ?>
        <div>
        <form action="Ingresar.php" method="POST">
            <h1>Ingresar datos en la tabla MEDICAMENTO</h1>
            <p>IdMedicamento : <input type='text' name='idmedicamento' placeholder='Ingrese un codigo de medicamento' required></p>
            <p>Nombre : <input type='text' name='nombre' placeholder='Ingrese un nombre' required></p>
            <p>Stock : <input type='text' name='stock' placeholder='Ingrese un stock de producto' required></p>
            <p>Descripcion : <input type='text' name='descripcion' placeholder='Ingrese una descripcion' required></p>
            <p>Fecha de elaboracion : <input type='text' name='fec_elab' placeholder='Ingrese una fecha de elaboracion' required></p>
            <p>Fecha de vencimiento : <input type='text' name='fec_venc' placeholder='Ingrese una fecha de vencimiento' required></p>
            <p>Precio : <input type='text' name='precio' placeholder='Ingrese un precio' required></p>
            <br><input type="submit" onclick="validar();" id="ingresar2" name="Ingresar2" value="Ingresar">
        </form><br>
        </div>
        <?php
        $idmedicamento=$_POST["idmedicamento"];
        $nombre=$_POST["nombre"];
        $stock=$_POST["stock"];
        $descripcion=$_POST["descripcion"];
        $fec_elab=$_POST["fec_elab"];
        $fec_venc=$_POST["fec_venc"];
        $precio=$_POST["precio"];
        $resultado=$conexion -> query("INSERT INTO medicamento values ('".$idmedicamento."', '".$nombre."', ".$stock.", '".$descripcion."', '".$fec_elab."', '".$fec_venc."', ".$precio.");");
        echo '<a href="Interfaz.php" target="_blank" style="font-size: 45px; background: linear-gradient(darkblue, black);">Mostrar tablas</a>';
        }
        else{
            ?>
            <div>
                <form action="Ingresar.php" method="POST">
                    <h1>Ingresar datos en la tabla MEDICAMENTO</h1>
                    <p>IdMedicamento : <input type='text' name='idmedicamento' placeholder='Ingrese un codigo de medicamento' required></p>
                    <p>Nombre : <input type='text' name='nombre' placeholder='Ingrese un nombre' required></p>
                    <p>Stock : <input type='text' name='stock' placeholder='Ingrese un stock de producto' required></p>
                    <p>Descripcion : <input type='text' name='descripcion' placeholder='Ingrese una descripcion' required></p>
                    <p>Fecha de elaboracion : <input type='text' name='fec_elab' placeholder='Ingrese una fecha de elaboracion' required></p>
                    <p>Fecha de vencimiento : <input type='text' name='fec_venc' placeholder='Ingrese una fecha de vencimiento' required></p>
                    <p>Precio : <input type='text' name='precio' placeholder='Ingrese un precio' required></p>
                    <br><input type="submit" onclick="validar();" id="ingresar2" name="Ingresar2" value="Ingresar">
                </form><br>
            </div>
            <?php
        }

        if(isset($_POST["Ingresar3"])){
            require("Conexion.php");
            echo '<script>';
            echo 'alert("Datos Ingresados")';
            echo '</script>';
        ?>
        <div>
        <form action="Ingresar.php" method="POST">
            <h1>Ingresar datos en la tabla TRATAMIENTO</h1>
            <p>IdTratamiento : <input type='text' name='idtratamiento' placeholder='Ingrese un codigo de tratamiento' required></p>
            <p>IdPaciente : <input type='text' name='idpaciente' placeholder='Ingrese un codigo paciente' required></p>
            <p>Tipo : <input type='text' name='tipo' placeholder='Ingrese un tipo de tratamiento' required></p>
            <p>Fecha de Inicio : <input type='text' name='fec_inicio' placeholder='Ingrese una fecha de inicio tratamiento' required></p>
            <p>Fecha de Fin : <input type='text' name='fec_fin' placeholder='Ingrese una fecha de fin tratamiento' required></p>
            <p>Costo : <input type='text' name='costo' placeholder='Ingrese un costo' required></p>
            <br><input type="submit" onclick="validar();" id="ingresar3" name="Ingresar3" value="Ingresar">
        </form><br>
        </div>
        <?php
        $idtratamiento=$_POST["idtratamiento"];
        $idpaciente=$_POST["idpaciente"];
        $tipo=$_POST["tipo"];
        $fec_inicio=$_POST["fec_inicio"];
        $fec_fin=$_POST["fec_fin"];
        $costo=$_POST["costo"];
        $resultado=$conexion -> query("INSERT INTO tratamiento values ('".$idtratamiento."', '".$idpaciente."', '".$tipo."', '".$fec_inicio."', '".$fec_fin."', ".$costo.");");
        echo '<a href="Interfaz.php" target="_blank" style="font-size: 45px; background: linear-gradient(darkblue, black);">Mostrar tablas</a>';
        }
        else{
            ?>
            <div>
                <form action="Ingresar.php" method="POST">
                    <h1>Ingresar datos en la tabla TRATAMIENTO</h1>
                    <p>IdTratamiento : <input type='text' name='idtratamiento' placeholder='Ingrese un codigo de tratamiento' required></p>
                    <p>IdPaciente : <input type='text' name='idpaciente' placeholder='Ingrese un codigo paciente' required></p>
                    <p>Tipo : <input type='text' name='tipo' placeholder='Ingrese un tipo de tratamiento' required></p>
                    <p>Fecha de Inicio : <input type='text' name='fec_inicio' placeholder='Ingrese una fecha de inicio tratamiento' required></p>
                    <p>Fecha de Fin : <input type='text' name='fec_fin' placeholder='Ingrese una fecha de fin tratamiento' required></p>
                    <p>Costo : <input type='text' name='costo' placeholder='Ingrese un costo' required></p>
                    <br><input type="submit" onclick="validar();" id="ingresar3" name="Ingresar3" value="Ingresar">
                </form><br>
            </div>
            <?php
        }

        if(isset($_POST["Ingresar4"])){
            require("Conexion.php");
            echo '<script>';
            echo 'alert("Datos Ingresados")';
            echo '</script>';
        ?>
        <div>
        <form action="Ingresar.php" method="POST">
            <h1>Ingresar datos en la tabla CITA</h1>
            <p>DNI : <input type='text' name='dni' placeholder='Ingrese un DNI' required></p>
            <p>Nombre : <input type='text' name='nombre' placeholder='Ingrese un nombre' required></p>
            <p>Telefono : <input type='text' name='telefono' placeholder='Ingrese un numero telefonico' required></p>
            <p>Correo : <input type='text' name='correo' placeholder='Ingrese un correo' required></p>
            <p>Fecha : <input type='text' name='fecha' placeholder='Ingrese una fecha' required></p>
            <p>Hora : <input type='text' name='hora' placeholder='Ingrese una hora' required></p>
            <p>IdPaciente : <input type='text' name='idpaciente' placeholder='Ingrese un codigo paciente' required></p>
            <p>Sintomas : <input type='text' name='sintomas' placeholder='Ingrese sintomas' required></p>
            <br><input type="submit" onclick="validar();" id="ingresar4" name="Ingresar4" value="Ingresar">
        </form><br>
        </div>
        <?php
        $dni=$_POST["dni"];
        $nombre=$_POST["nombre"];
        $telefono=$_POST["telefono"];
        $correo=$_POST["correo"];
        $fecha=$_POST["fecha"];
        $hora=$_POST["hora"];
        $idpaciente=$_POST["idpaciente"];
        $sintomas=$_POST["sintomas"];
        $resultado=$conexion -> query("INSERT INTO cita values ('".$dni."', '".$nombre."', '".$telefono."', '".$correo."', '".$fecha."', '".$hora."', '".$idpaciente."', '".$sintomas."');");
        echo '<a href="Interfaz.php" target="_blank" style="font-size: 45px; background: linear-gradient(darkblue, black);">Mostrar tablas</a>';
        }
        else{
            ?>
            <div>
                <form action="Ingresar.php" method="POST">
                    <h1>Ingresar datos en la tabla CITA</h1>
                    <p>DNI : <input type='text' name='dni' placeholder='Ingrese un DNI' required></p>
                    <p>Nombre : <input type='text' name='nombre' placeholder='Ingrese un nombre' required></p>
                    <p>Telefono : <input type='text' name='telefono' placeholder='Ingrese un numero telefonico' required></p>
                    <p>Correo : <input type='text' name='correo' placeholder='Ingrese un correo' required></p>
                    <p>Fecha : <input type='text' name='fecha' placeholder='Ingrese una fecha' required></p>
                    <p>Hora : <input type='text' name='hora' placeholder='Ingrese una hora' required></p>
                    <p>IdPaciente : <input type='text' name='idpaciente' placeholder='Ingrese un codigo paciente' required></p>
                    <p>Sintomas : <input type='text' name='sintomas' placeholder='Ingrese sintomas' required></p>
                    <br><input type="submit" onclick="validar();" id="ingresar4" name="Ingresar4" value="Ingresar">
                </form><br>
            </div>
            <?php
        }

        if(isset($_POST["Ingresar5"])){
            require("Conexion.php");
            echo '<script>';
            echo 'alert("Datos Ingresados")';
            echo '</script>';
        ?>
        <div>
        <form action="Ingresar.php" method="POST">
            <h1>Ingresar datos en la tabla PERSONAL</h1>
            <p>DNI : <input type='text' name='dni' placeholder='Ingrese un DNI' required></p>
            <p>Nombre : <input type='text' name='nombre' placeholder='Ingrese un nombre' required></p>
            <p>Cargo : <input type='text' name='cargo' placeholder='Ingrese un cargo' required></p>
            <p>Edad : <input type='text' name='edad' placeholder='Ingrese una edad' required></p>
            <p>Turno : <input type='text' name='turno' placeholder='Ingrese una turno' required></p>
            <br><input type="submit" onclick="validar();" id="ingresar5" name="Ingresar5" value="Ingresar">
        </form><br>
        </div>
        <?php
        $dni=$_POST["dni"];
        $nombre=$_POST["nombre"];
        $cargo=$_POST["cargo"];
        $edad=$_POST["edad"];
        $turno=$_POST["turno"];
        $resultado=$conexion -> query("INSERT INTO personal values ('".$dni."', '".$nombre."', '".$cargo."', ".$edad.", '".$turno."');");
        echo '<a href="Interfaz.php" target="_blank" style="font-size: 45px; background: linear-gradient(darkblue, black);">Mostrar tablas</a>';
        }
        else{
            ?>
            <div>
                <form action="Ingresar.php" method="POST">
                    <h1>Ingresar datos en la tabla PERSONAL</h1>
                    <p>DNI : <input type='text' name='dni' placeholder='Ingrese un DNI' required></p>
                    <p>Nombre : <input type='text' name='nombre' placeholder='Ingrese un nombre' required></p>
                    <p>Cargo : <input type='text' name='cargo' placeholder='Ingrese un cargo' required></p>
                    <p>Edad : <input type='text' name='edad' placeholder='Ingrese una edad' required></p>
                    <p>Turno : <input type='text' name='turno' placeholder='Ingrese una turno' required></p>
                    <br><input type="submit" onclick="validar();" id="ingresar5" name="Ingresar5" value="Ingresar">
                </form><br>
            </div>
            <?php
        }

        if(isset($_POST["Ingresar6"])){
            require("Conexion.php");
            echo '<script>';
            echo 'alert("Datos Ingresados")';
            echo '</script>';
        ?>
        <div>
        <form action="Ingresar.php" method="POST">
            <h1>Ingresar datos en la tabla HISTORIAL</h1>
            <p>IdHistorial : <input type='text' name='idhistorial' placeholder='Ingrese un codigo de historial' required></p>
            <p>IdPaciente : <input type='text' name='idpaciente' placeholder='Ingrese un codigo de paciente' required></p>
            <p>IdTratamiento : <input type='text' name='idtratamiento' placeholder='Ingrese un codigo de tratamiento' required></p>
            <br><input type="submit" onclick="validar();" id="ingresar6" name="Ingresar6" value="Ingresar">
        </form><br>
        </div>
        <?php
        $idhistorial=$_POST["idhistorial"];
        $idpaciente=$_POST["idpaciente"];
        $idtratamiento=$_POST["idtratamiento"];
        $resultado=$conexion -> query("INSERT INTO historial values ('".$idhistorial."', '".$idpaciente."', '".$idtratamiento."');");
        echo '<a href="Interfaz.php" target="_blank" style="font-size: 45px; background: linear-gradient(darkblue, black);">Mostrar tablas</a>';
        }
        else{
            ?>
            <div>
                <form action="Ingresar.php" method="POST">
                    <h1>Ingresar datos en la tabla HISTORIAL</h1>
                    <p>IdHistorial : <input type='text' name='idhistorial' placeholder='Ingrese un codigo de historial' required></p>
                    <p>IdPaciente : <input type='text' name='idpaciente' placeholder='Ingrese un codigo de paciente' required></p>
                    <p>IdTratamiento : <input type='text' name='idtratamiento' placeholder='Ingrese un codigo de tratamiento' required></p>
                    <br><input type="submit" onclick="validar();" id="ingresar6" name="Ingresar6" value="Ingresar">
                </form><br>
            </div>
            <?php
        }
        ?>
    </body>
</html>