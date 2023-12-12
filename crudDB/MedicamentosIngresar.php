<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MedicamentosIngresar</title>
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
            $idmedicamento=$_POST["idmedicamento"];
            $nombre=$_POST["nombre"];
            $stock=$_POST["stock"];
            $descripcion=$_POST["descripcion"];
            $fec_elab=$_POST["fec_elab"];
            $fec_elab_formato = date('Y-m-d', strtotime($fec_elab));
            $fec_venc=$_POST["fec_venc"];
            $fec_venc_formato = date('Y-m-d', strtotime($fec_venc));
            $precio=$_POST["precio"];
            $resultado=$conexion -> query("INSERT INTO medicamento values ('".$idmedicamento."', '".$nombre."', ".$stock.", '".$descripcion."', '".$fec_elab_formato."', '".$fec_venc_formato."', ".$precio.");");
            header("location: Medicamentos.php");
        }else{
            ?>
            <div id='formulario'>
                <h1>Formulario Medicamentos</h1>
                <form action='MedicamentosIngresar.php' method='POST'>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>IdMedicamento: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='text' name='idmedicamento' placeholder='Ingrese un codigo de medicamento' required>
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
                            <p>Stock: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='number' name='stock' required>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Descripcion: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='text' name='descripcion' placeholder='Ingrese una descripcion' required>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Fecha de Elaboracion: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='date' name='fec_elab' required>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Fecha de Vencimiento: </p>
                        </div>
                        <div class='subsub2'>
                            <input type='date' name='fec_venc' required>
                        </div>
                    </div>
                    <div class='sub1'>
                        <div class='subsub1'>
                            <p>Precio: </p>
                        </div>
                        <div class='subsub2'>
                        <input type='number' name='precio' step='any' required>
                        </div>
                    </div>
                    <div class='sub2'>
                        <a href='Medicamentos.php'>Regresar</a>
                        <input type="submit" name="Agregar" value="Guardar">
                    </div>
                </form>
            </div>
            <?php
        }
        ?>
    </body>
</html>