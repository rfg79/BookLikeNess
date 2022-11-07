<?php

    session_start();

    if(isset($_SESSION['nombreUsuario'])){
        header("location: area_login.php");



    }




?>



<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/registro.css" class="rel">
    <title>Iniciar Sesión - BookLikeness</title>
  </head>
  <body>
    <main>
        <div class="contenedor">
            <!--Parte trasera-->
            <div class="back__box">
                <div class="back__box-login">
                    <h3>¿Ya estás registrado?</h3>
                    <p>Introduce tu nombre de usuario y contraseña</p>
                    <button id="btn__login">Iniciar Sesión</button>
                </div>
                <div class="back__box-register">
                    <h3>¿Aún no tienes cuenta con nosotros?</h3>
                    <p>Regístrate y disfruta de las ventajas</p>
                    <button id="btn__register">Registro</button>
                </div>
            </div>
            <!--Formulario para logarse y registrarse-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="login_usuario.php" method="POST" class="formulario__login">
                    <h2>Iniciar sesión</h2>
                    <input type="email" placeholder="Correo Electrónico" name="correoElectronico">
                    <input type="password" placeholder="Contraseña" name="pwd">
                    <button type="submit">Entrar</button>
                </form>
                <!--Registro-->
                <form action="registro_usuario.php" method="POST" class="formulario__register">
                    <h2>Registro</h2>
                    <input type="text" placeholder="Nombre y Apellidos" name="nombreCompleto">
                    <input type="email" placeholder="Correo Electrónico" name="correoElectronico">
                    <input type="text" placeholder="Nombre de usuario" name="nombreUsuario">
                    <input type="password" placeholder="Contraseña" name="pwd">
                    <button type="submit">Registrarse</button>
                </form>
            </div>
        </div>
    </main>
    <script src="../js/script.js"></script>
    
  </body>
</html>