<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <style>
            body{
                margin: 0px;
                padding: 0px;
                font-family: montserrat;
                background: linear-gradient(lightblue, black);
                height: 100vh;
            }
            .formulario{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 400px;
                background: white;
                border-radius: 10px;
            }
            .formulario h1{
                text-align: center;
                padding: 0px 0px 20px 0px;
                border-bottom: 1px solid silver;
            }
            .formulario form{
                padding: 0px 40px;
                box-sizing: border-box;
                margin: 15px;
            }
            form .registro{
                position: relative;
                border-bottom: 2px solid #adadad;
                margin: 30px 0px;
            }
            .registro input{
                width: 100%;
                padding: 0px 5px;
                height: 40px;
                font-size: 16px;
                border: none;
                background: none;
                outline: none;
            }
            .registro label{
                position: absolute;
                top: 50%;
                left: 5px;
                color: #adadad;
                transform: translateY(-50%);
                font-size: 16px;
                pointer-events: none;
            }
            .registro span::before{
                content: '';
                position: absolute;
                top: 40px;
                left: 0px;
                width: 100%;
                height: 2px;
                background: #6c3483;
            }
            .registro input:focus ~ span::before,
            .registro input:focus ~ span::before{
                top: -5px;
                color: #6c3483;
            }
            input[type='submit']{
                width: 100%;
                height: 50px;
                border: 1px solid;
                background: #6c3483;
                border-radius: 25px;
                font-size: 18px;
                color: white;
                cursor: pointer;
                outline: none;
            }
            input[type='submit']:hover{
                border-color: purple;
                transition: .5s;
            }
        </style>
    </head>
    <body>
    <?php
    include('Conexion.php');
    include('Acceso.php');
    ?>
    <div class='formulario'>
        <h1>Iniciar Sesion</h1>
        <form method='POST' action=''>
            <div class='registro'>
                <input type='text' name='user'>
                <label>Nombre de usuario</label>
            </div>
            <div class='registro'>
                <input type='password' name='clave'>
                <label>Contraseña</label>
            </div>
            <input type='submit' name='Ingresar' value='Iniciar Sesion'>
        </form>
    </div>
    </body>
</html>