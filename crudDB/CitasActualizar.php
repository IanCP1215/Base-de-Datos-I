<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CitasActualizar</title>
        <style>
            body{
                display: flex;
                align-items: center;
                justify-content: center;
            }
            div{
                border: 1px solid black;
            }
            #formulario{
                width: 700px;
                height: 600px;
                margin: 25px;
                justify-content: center;
                align-items: center;
                overflow: auto;
            }
            #formulario h1{
                font-size: 50px;
                text-align: center;
            }
            #formulario form{
                width: 600px;
                height: 500px;
                margin-left: 50px;
                justify-content: center;
                align-items: center;
            }
            #formulario form .sub1{
                width: 550px;
                height: 50px;
                justify-content: center;
                align-items: center;
                display: flex;
            }
            #formulario form .subsub1{
                width: 250px;
                height: 50px;
                justify-content: center;
                align-items: center;
                display: flex;
            }
            #formulario form .subsub1 p{
                font-size: 20px;
            }
            #formulario form .subsub2{
                width: 300px;
                height: 50px;
                justify-content: center;
                align-items: center;
                display:flex;
            }
            #formulario form .subsub2 input{
                width: 250px;
                height: 30px;
                font-size: 15px;
                border-radius: 10px;
                text-align: center;
            }
            #formulario form .subsub2 select{
                width: 200px;
                height: 30px;
                font-size: 15px;
                border-radius: 0px;
            }
            #formulario form .subsub2 input[type='date']{
                width: 150px;
                height: 30px;
                font-size: 15px;
                border-radius: 0px;
            }
            #formulario form .subsub2 input[type='number']{
                width: 250px;
                height: 30px;
                font-size: 15px;
                border-radius: 0px;
            }
            #formulario form .sub2{
                width: 550px;
                height: 100px;
                justify-content: center;
                align-items: center;
                display:flex;
            }
            #formulario form .sub2 a{
                background-color: #002d2b;
                color: white;
                padding: 20px;
                border-radius: 10px;
                margin-top: 30px;
                margin-left: 50px;
                margin-right: 30px;
                margin-bottom: 30px;
                text-decoration: none;
            }
            #formulario form .sub2 input{
                background-color: #00a041;
                color: white;
                padding: 20px;
                border-radius: 10px;
                margin-top: 30px;
                margin-left: 50px;
                margin-right: 30px;
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <?php
        if(isset($_POST["Agregar"])){
            require("Conexion.php");
            echo '<script>';
            echo 'alert("Datos Actualizados")';
            echo '</script>';
            $dni=$_POST["dni"];
            $nombre=$_POST["nombre"];
            $telefono=$_POST["telefono"];
            $correo=$_POST["correo"];
            $fecha=$_POST["fecha"];
            $fecha_formato = date('Y-m-d', strtotime($fecha));
            $hora=$_POST["hora"];
            $idpaciente=$_POST["idpaciente"];
            $sintomas=$_POST["sintomas"];
            $resultado=$conexion -> query("UPDATE cita set nombre='".$nombre."', telefono='".$telefono."', correo='".$correo."', fecha='".$fecha_formato."', hora='".$hora."', sintomas='".$sintomas."' where dni='".$dni."' and idpaciente='".$idpaciente."';");
            header("location: Citas.php");
        }else{
            include_once('Conexion.php');

            $consulta = $conexion -> query("SELECT * FROM cita WHERE dni='".$_REQUEST['dni']."' AND idpaciente='".$_REQUEST['idpaciente']."';");
            $dato = $consulta -> fetch_assoc();
            ?>
            <div id='formulario'>
                <h1>Formulario Citas</h1>
                <form action='CitasActualizar.php' method='POST'>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>DNI: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='text' name='dni' readonly placeholder='Ingrese un DNI' value="<?php if($dato['dni'] != ''){ echo $dato['dni']; }?>" required>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Nombre: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='text' name='nombre' placeholder='Ingrese un nombre' value="<?php if($dato['nombre'] != ''){ echo $dato['nombre']; }?>" required>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Telefono: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='text' name='telefono' placeholder='Ingrese una telefono' value="<?php if($dato['telefono'] != ''){ echo $dato['telefono']; }?>" required>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Correo: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='text' name='correo' placeholder='Ingrese una correo' value="<?php if($dato['correo'] != ''){ echo $dato['correo']; }?>">
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Fecha: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='date' name='fecha' value="<?php if($dato['fecha'] != ''){ echo $dato['fecha']; }?>" required>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Hora: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='time' name='hora' value="<?php if($dato['hora'] != ''){ echo $dato['hora']; }?>" required>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Idpaciente: </p>
                        </div>
                        <div class='subsub2'>
                            <select name='idpaciente' required>
                                <option selected disabled>-- Seleccione una opcion --</option>
                                <?php
                                require_once('Conexion.php');
                                $consulta = $conexion -> query("SELECT idpaciente FROM paciente;");
                                while ($respuesta = $consulta -> fetch_assoc()){
                                    if($respuesta['idpaciente'] != $dato['idpaciente']){
                                        echo "<option value='".$respuesta['idpaciente']."' disabled>".$respuesta['idpaciente']."</option>";
                                    }else{
                                        echo "<option value='".$respuesta['idpaciente']."' selected>".$respuesta['idpaciente']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Sintomas: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='text' name='sintomas' placeholder='Ingrese los sintomas' value="<?php if($dato['sintomas'] != ''){ echo $dato['sintomas']; }?>" required>
                        </div>
                    </div>
                    <div class='sub2'>
                        <a href='Citas.php'>Regresar</a>
                        <input type="submit" name="Agregar" value="Guardar">
                    </div>
                </form>
            </div>
                </form>
            </div>
            <?php
        }
        ?>
    </body>
</html>