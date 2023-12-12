<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CitasIngresar</title>
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
            #formulario form .subsub2 input[type='date']{
                width: 150px;
                height: 30px;
                font-size: 15px;
                border-radius: 0px;
            }
            #formulario form .subsub2 select{
                width: 200px;
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
            echo 'alert("Datos Ingresados")';
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
            $respuesta=$conexion -> query("INSERT INTO cita values ('".$dni."', '".$nombre."', '".$telefono."', '".$correo."', '".$fecha_formato."', '".$hora."', '".$idpaciente."', '".$sintomas."');");
            header("location: Citas.php");
        }else{
            ?>
            <div id='formulario'>
                <h1>Formulario Citas</h1>
                <form action='CitasIngresar.php' method='POST'>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>DNI: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='text' name='dni' placeholder='Ingrese un DNI' required>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Nombre: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='text' name='nombre' placeholder='Ingrese un nombre' required>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Telefono: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='text' name='telefono' placeholder='Ingrese una telefono' required>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Correo: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='text' name='correo' placeholder='Ingrese una correo'>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Fecha: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='date' name='fecha' required>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Hora: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='time' name='hora' required>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Idpaciente: </p>
                        </div>
                        <div class='subsub2'>
                            <select name='idpaciente' required>
                                <option selected disabled>--Seleccione una opcion--</option>
                                <?php
                                require_once('Conexion.php');
                                $consulta = $conexion -> query("SELECT idpaciente FROM paciente;");
                                while ($respuesta = $consulta -> fetch_assoc()){
                                    echo "<option value='".$respuesta['idpaciente']."'>".$respuesta['idpaciente']."</option>";
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
                            <input type='text' name='sintomas' placeholder='Ingrese los sintomas' required>
                        </div>
                    </div>
                    <div class='sub2'>
                        <a href='Citas.php'>Regresar</a>
                        <input type="submit" name="Agregar" value="Guardar">
                    </div>
                </form>
            </div>
            <?php
        }
        ?>
    </body>
</html>