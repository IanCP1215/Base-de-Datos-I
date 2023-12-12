<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PacientesCRUD</title>
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
            $cargo=$_POST["cargo"];
            $edad=$_POST["edad"];
            $turno=$_POST["turno"];
            $resultado=$conexion -> query("UPDATE personal set nombre='".$nombre."', cargo='".$cargo."', edad=".$edad.", turno='".$turno."' where dni='".$dni."';");
            header("location: Personales.php");
        }else{
            include_once('Conexion.php');

            $consulta = $conexion -> query("SELECT * FROM personal WHERE dni='".$_REQUEST['dni']."';");
            $dato = $consulta -> fetch_assoc();
            ?>
            <div id='formulario'>
                <h1>Formulario Personales</h1>
                <form action='PersonalesActualizar.php' method='POST'>
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
                            <p>Cargo: </p>
                        </div>
                        <div class='subsub2'>
                            <select name='cargo' required>
                                <option selected disabled>--Seleccione una opcion--</option>
                                <?php
                                if ($dato["cargo"] != 'Veterinario(a)'){
                                    echo "<option value='Veterinario(a)'>Veterinario(a)</option>";
                                }else{
                                    echo "<option value='Veterinario(a)' selected>Veterinario(a)</option>";
                                }
                                if ($dato["cargo"] != 'Asistente(a)'){
                                    echo "<option value='Asistente(a)'>Asistente(a)</option>";
                                }else{
                                    echo "<option value='Asistente(a)' selected>Asistente(a)</option>";
                                }
                                if ($dato["cargo"] != 'Auxiliar'){
                                    echo "<option value='Auxiliar'>Auxiliar</option>";
                                }else{
                                    echo "<option value='Auxiliar' selected>Auxiliar</option>";
                                }
                                if ($dato["cargo"] != 'Recepcionista'){
                                    echo "<option value='Recepcionista'>Recepcionista</option>";
                                }else{
                                    echo "<option value='Recepcionista' selected>Recepcionista</option>";
                                }
                                if ($dato["cargo"] != 'Peluquero(a)'){
                                    echo "<option value='Peluquero(a)'>Peluquero(a)</option>";
                                }else{
                                    echo "<option value='Peluquero(a)' selected>Peluquero(a)</option>";
                                }
                                if ($dato["cargo"] != 'Personal de limpieza'){
                                    echo "<option value='Personal de limpieza'>Personal de limpieza</option>";
                                }else{
                                    echo "<option value='Personal de limpieza' selected>Personal de limpieza</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Edad: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='number' name='edad' value="<?php if($dato['edad'] != ''){ echo $dato['edad']; }?>">
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Telefono: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='text' name='turno' placeholder='Ingrese un turno' value="<?php if($dato['turno'] != ''){ echo $dato['turno']; }?>" required>
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