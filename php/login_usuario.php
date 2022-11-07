<?php

    session_start();
    include('conexionbbdd.php');

    //creamos las variables que se van a incluir en nuestra tabla usuarios
    $correoElectronico = $_POST['correoElectronico'];
    $pwd = $_POST['pwd'];
    $encriptada = password_hash($pwd, PASSWORD_DEFAULT);
    
    //para verificar que el correo electrónico y la contraseña es la misma que tenemos en la base de datos
    $validar_login = mysqli_query($conexion, "SELECT * FROM tabla_usuario WHERE correoElectronico='$correoElectronico' and pwd='$encriptada'");

    if(password_verify($pwd, $encriptada)){
        //aquí creamos la variable de sesión
        $_SESSION['usuario'] = $correoElectronico;
        header("location: area_login.php");
        exit;
    } else {
        echo '
            <script>
                alert("Este usuario no existe. Verifica los datos introducidos");
                window.location = "register.php"
            </script>
        ';
        exit;
    }



?>