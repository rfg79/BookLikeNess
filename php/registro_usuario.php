<?php
    //incluimos la conexión al backend de nuestra base de datos de usuarios
    include 'conexionbbdd.php';
    //creamos las variables que se van a incluir en nuestra tabla usuarios
    $nombreCompleto = $_POST['nombreCompleto'];
    $correoElectronico = $_POST['correoElectronico'];
    $nombreUsuario = $_POST['nombreUsuario'];
    $pwd = $_POST['pwd'];
    //para encriptar la contraseña
    $encriptada= password_hash($pwd, PASSWORD_DEFAULT);
        
    //hacemos la query
    $query = "INSERT INTO tabla_usuario (nombreCompleto, correoElectronico, nombreUsuario, pwd) VALUES('$nombreCompleto', '$correoElectronico', '$nombreUsuario', '$encriptada')";
    //esto es una función para verificar si el mail ya existe
    $verificar_mail = mysqli_query($conexion, "SELECT * FROM tabla_usuario WHERE correoElectronico='$correoElectronico'");

    if (mysqli_num_rows($verificar_mail) > 0){
        echo '
            <script>
                alert("Esta dirección de e-mail ya existe. Prueba con otra diferente");
                window.location = "register.php";
            </script>
        ';
        exit();
    }
    
    //esto es una función para verificar si el usuario ya existe
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM tabla_usuario WHERE nombreUsuario='$nombreUsuario'");

    if (mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert("Este nombre de usuario ya está en uso. Prueba con otro diferente");
                window.location = "register.php";
            </script>
        ';
        exit();
    }

    //ejecutamos la query
    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario creado correctamente");
                window.location = "register.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Ha habido un problema, inténtelo de nuevo");
                window.location = "register.php";
            </script>
        ';

    }

    mysqli_close($conexion);    
?>

    