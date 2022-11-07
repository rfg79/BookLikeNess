<?php

    session_start();
    //verificar si existe la variable sesión
    if(!isset($_SESSION['usuario'])){
        echo '
        <script>
            alert("Debes iniciar sesión para acceder a tu área privada");
            window.location = "register.php";
        </script>
        ';
        session_destroy();
        die();
    }
    
?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Fuente-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css" class="style">
    <!--Título de la web-->
    <title>BookLikeness - Área Privada</title>
  </head>
  <body>
    <!--Cabecera-->
    <header>
      <div class="container-fluid-1 py-4">
        <div class="container-1 text-white">
          <div class="row align-items-end">
            <div class="col-sm-12 col-md-6 col-lg-4">
              <a href="../booklikeness/index.html"><img src="../img/logo5.png" alt="logo" width="250px" class="img-fluid"></a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-5 align-self-center">
              <form action="../search.php" method="get" accept-charset="UTF-8">
              <input id="top-search-input" type="search" name="q" placeholder="Busca tu título favorito..." size="30" value="" tabindex="1">
              <button id="sbutton" type="submit">Buscar</button>
              </form>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 align-self-center">
            <a href="../php/register.php">Iniciar sesión / Registrarse</a>
            </div>
          </div>
        </div>
      </div>
        <div class="container-fluid-2">
          <div class="container-2 text-white py-3">
            <div class="row align-items-end">
              <div class="col-sm-12 col-md-6 col-lg-10">
                <div class="row">
                  <div class="col-sm-6 col-md-3 col-lg-3">
                    <a href="../catalogo.html">Catálogo</a>
                  </div>
                  <div class="col-sm-6 col-md-3 col-lg-3">
                    <a href="../novedades.html">Novedades</a>
                  </div>
                  <div class="col-sm-6 col-md-3 col-lg-3">
                    <a href="../ranking.html">Ranking</a>
                  </div>
                  <div class="col-sm-6 col-md-3 col-lg-3">
                    <a href="../criticas.html">Críticas</a>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-1">
                <img src="../icon/fb.png">
              </div>
              <div class="col-sm-12 col-md-6 col-lg-1">
                <img src="../icon/instagram.png">
              </div>
            </div>
          </div>
        </div>
  </header>
    <h2>Datos personales</h2>
    <?php
    include('conexion_be.php');
    $sql="SELECT * FROM usuarios WHERE nombreUsuario='merper89'";  
        $resultado=mysqli_query($conexion,$sql) or die ('Error en el query database');  
        while($fila = $resultado->fetch_assoc())
        {
            echo ("<p>".$fila["nombreUsuario"]."</p>");
            echo ("<p>".$fila["correoElectronico"]."</p>");
        }
    
    ?>
    <div class="container-fluid-4 py-3">
      <div class="col-sm-12 col-md-6 col-lg-3 align-center">
        <a href="../php/cerrar_sesion.php">Cerrar sesión</a>
      </div>
    </div>
  </body>
</html>