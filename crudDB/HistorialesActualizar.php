<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HistorialesActualizar</title>
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
            $idhistorial=$_POST["idhistorial"];
            $idpaciente=$_POST["idpaciente"];
            $idtratamiento=$_POST["idtratamiento"];
            $resultado=$conexion -> query("UPDATE historial set idpaciente='".$idpaciente."', idtratamiento=".$idtratamiento." where idhistorial='".$idhistorial."';");
            header("location: Historiales.php");
        }else{
            include_once('Conexion.php');

            $consulta = $conexion -> query("SELECT * FROM historial WHERE idhistorial='".$_REQUEST['idhistorial']."';");
            $dato = $consulta -> fetch_assoc();
            ?>
            <div id='formulario'>
                <h1>Formulario Historiales</h1>
                <form action='HistorialesActualizar.php' method='POST'>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>IdHistorial: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='text' name='idhistorial' readonly placeholder='Ingrese un codigo de historial' value="<?php if($dato['idhistorial'] != ''){ echo $dato['idhistorial']; }?>" required>
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
                                        echo "<option value='".$respuesta['idpaciente']."'>".$respuesta['idpaciente']."</option>";
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
                            <p>IdTratamiento: </p>
                        </div>
                        <div class='subsub2'>
                            <select name='idtratamiento' required>
                                <option selected disabled>-- Seleccione una opcion --</option>
                                <?php
                                require_once('Conexion.php');
                                $consulta = $conexion -> query("SELECT DISTINCT idtratamiento FROM tratamiento;");
                                while ($respuesta = $consulta -> fetch_assoc()){
                                    if($respuesta['idtratamiento'] != $dato['idtratamiento']){
                                        echo "<option value='".$respuesta['idtratamiento']."'>".$respuesta['idtratamiento']."</option>";
                                    }else{
                                        echo "<option value='".$respuesta['idtratamiento']."' selected>".$respuesta['idtratamiento']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class='sub2'>
                        <a href='Historiales.php'>Regresar</a>
                        <input type="submit" name="Agregar" value="Guardar">
                    </div>
                </form>
            </div>
            <?php
        }
        ?>
    </body>
</html>