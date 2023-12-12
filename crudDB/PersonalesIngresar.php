<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DueñosIngresar</title>
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
            #formulario form .subsub2 input[type='number']{
                width: 250px;
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
            $cargo=$_POST["cargo"];
            $edad=$_POST["edad"];
            $turno=$_POST["turno"];
            $resultado=$conexion -> query("INSERT INTO personal values ('".$dni."', '".$nombre."', '".$cargo."', ".$edad.", '".$turno."');");
            header("location: Personales.php");
        }else{
            ?>
            <div id='formulario'>
                <h1>Formulario Personales</h1>
                <form action='PersonalesIngresar.php' method='POST'>
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
                            <p>Cargo: </p>
                        </div>
                        <div class='subsub2'>
                            <select name='cargo' required>
                                <option selected disabled>--Seleccione una opcion--</option>
                                <option value='Veterinario(a)'>Veterinario(a)</option>
                                <option value='Asistente(a)'>Asistente(a)</option>
                                <option value='Auxiliar'>Auxiliar</option>
                                <option value='Recepcionista'>Recepcionista</option>
                                <option value='Peluquero(a)'>Peluquero(a)</option>
                                <option value='Personal de limpieza'>Personal de limpieza</option>
                            </select>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Edad: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='number' name='edad'>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Turno: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='text' name='turno' placeholder='Ingrese un turno' required>
                        </div>
                    </div>
                    <div class='sub2'>
                        <a href='Personales.php'>Regresar</a>
                        <input type="submit" name="Agregar" value="Guardar">
                    </div>
                </form>
            </div>
            <?php
        }
        ?>
    </body>
</html>