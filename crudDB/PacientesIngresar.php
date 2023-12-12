<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PacientesIngresar</title>
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
            $idpaciente=$_POST["idpaciente"];
            $nombre=$_POST["nombre"];
            $especie=$_POST["especie"];
            $raza=$_POST["raza"];
            $fec_nacimiento=$_POST["fec_nacimiento"];
            $fec_nacimiento_formato = date('Y-m-d', strtotime($fec_nacimiento));
            $color=$_POST["color"];
            $peso=$_POST["peso"];
            $talla=$_POST["talla"];
            $obtener=new DateTime($fec_nacimiento_formato);
            $ahora=new DateTime();
            $intervalo=$obtener->diff($ahora);
            $anios = $intervalo->y;
            $meses = $intervalo->m;
            $sintomas=$_POST["sintomas"];
            $resultado=$conexion -> query("INSERT INTO paciente values ('".$idpaciente."', '".$nombre."', '".$especie."', '".$raza."', '".$fec_nacimiento_formato."', '".$color."', ".$peso.", ".$talla.", '".$anios." años ".$meses." meses', '".$sintomas."');");
            header("location: Pacientes.php");
        }else{
            ?>
            <div id='formulario'>
                <h1>Formulario Pacientes</h1>
                <form action='PacientesIngresar.php' method='POST'>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>IdPaciente: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='text' name='idpaciente' placeholder='Ingrese un codigo Paciente' required>
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
                            <p>Especie: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='text' name='especie' placeholder='Ingrese una especie' required>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Raza: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='text' name='raza' placeholder='Ingrese una raza'>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Fecha de Nacimiento: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='date' name='fec_nacimiento' required>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Color: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='text' name='color' placeholder='Ingrese una color' required>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Peso: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='number' name='peso' step='any' required>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Talla: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='number' name='talla' step='any' required>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Sintomas: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='text' name='sintomas' placeholder='Ingrese los sintomas'>
                        </div>
                    </div>
                    <div class='sub2'>
                        <a href='Pacientes.php'>Regresar</a>
                        <input type="submit" name="Agregar" value="Guardar">
                    </div>
                </form>
            </div>
            <?php
        }
        ?>
    </body>
</html>