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
    <title>BookLikeness</title>
  </head>
  <body>
    <!--Cabecera-->
    <section>
    <header id="main-header">
      <div class="container-fluid-1 py-4">
        <div class="container-1 text-white">
          <div class="row align-items-end">
            <div class="col-sm-12 col-md-6 col-lg-4">
              <a href="../index.php"><img src="../img/logo5.png" alt="logo" width="250px" class="img-fluid"></a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-5 align-self-center">
              <form action="../php/search.php" method="POST" accept-charset="UTF-8">
              <input id="top-search-input" type="search" name="busqueda" placeholder="Busca tu título favorito..." size="30" value="" tabindex="1">
              <button id="sbutton" type="submit" name="enviar">Buscar</button>
              </form>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 align-self-center">
            <a href="../php/register.php">Iniciar sesión / Registrarse</a>
            </div>
          </div>
        </div>
      </div>
       <!--Barra bajo la cabecera-->
        <div class="container-fluid-2">
          <div class="container-2 text-white py-3">
            <div class="row align-items-end">
              <div class="col-sm-12 col-md-6 col-lg-10">
                <div class="row">
                  <div class="col-sm-6 col-md-3 col-lg-3">
                    <a href="../catalogo.php">Catálogo</a>
                  </div>
                  <div class="col-sm-6 col-md-3 col-lg-3">
                    <a href="../novedades.php">Novedades</a>
                  </div>
                  <div class="col-sm-6 col-md-3 col-lg-3">
                    <a href="../ranking.php">Ranking</a>
                  </div>
                  <div class="col-sm-6 col-md-3 col-lg-3">
                    <a href="../php/area_login.php">Área Privada</a>
                  </div>
                </div>
              </div>
              <!-- Iconos redes sociales -->
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
  </section>
  <!--Datos del libro-->
  <section>
    <div class="principal">
                <?php
                include '../php/conexionbbdd.php'
                ?>
                
      <div class="container">
          <div class="row">
          <?php 
                $isbn = '9788401328510';
                $cons = $conexion->query("SELECT * FROM tabla_libros INNER JOIN tabla_autor WHERE tabla_libros.idAutor = tabla_autor.idAutor AND isbn=$isbn");
                while($row = $cons->fetch_array()) {
                
                  $field1name = $row["titulo"];
                  $field2name = $row["ano"];
                  $field3name = '<img src="data:url/jpeg;base64,'.base64_encode( $row['portada']).'" height="10%" width="10%"/>';
                  $field4name = $row["puntuacion"];
                  $field6name = $row['nombreAutor'];
                  $field7name = $row['apellidoAutor'];
                  $field8name = $row["puntuacion"] / $row["nvoto"];
                  $number = number_format($field8name, 1);
                  $field9name = $row['sinopsis'];
                
                
            <h3><?php echo '.$field1name.' ;?></h3>
            <hr> 
          </div>
          <div class="row" id="medio">
            <div class="col-sm-3 col-md-3 col-lg-3">
              <h4>Autor: <?php echo '.$field6name.','.$field7name.' ;?></h4>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
              <h4>Año: <?php echo '.$field2name.' ;?></h4>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
               <h4>Puntuación media: <?php echo '.$number.' ;?></h4>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
              <h4><?php echo '.$field3name.' ;?></h4>
            </div>
          </div>
          <div class="row">
            <h5><b>Sinopsis:</b> <?php echo '.$field9name.' ;?></h5>
          </div>
        } ?>
          <div class="row">
            <div class="container">
                <form method="POST" accept-charset="UTF-8">
                    <p class="clasificacion">
                    <input type="number" name="calificacion" min="1" max="10" step="1">
                    </p>
                    <button id="botonvoto" type="submit" name="votar">Enviar voto</button>
                </form>
            </div>
                <?php
                include '../php/conexionbbdd.php'
                ?>
                <?php
                if (isset($_POST["votar"])) {
                    $isbn = '9788401328510';
                    $voto = trim($_POST["calificacion"]);
                    $nvoto = "1";
                    $consulta = "UPDATE tabla_libros
                                  SET puntuacion=puntuacion+$voto, nvoto=nvoto+$nvoto 
                                  WHERE isbn=$isbn";
                    $resultado = mysqli_query($conexion,$consulta);
                      if ($resultado) {
                        echo '
                          <script>
                              alert("Voto registrado correctamente");
                              window.location = "../index.php";
                          </script>
                      ';
                      } else {
                        echo '
                          <script>
                              alert("No se ha registrado el voto, inténtelo de nuevo");
                              window.location.pathname;
                          </script>';}
                  // }
                              

                  }                
                ?>
        </div>
      </div>
  </section>
  
  <!--Pie de página-->
  <section>
    <footer class="text-center footer-style">
      <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3">
              <a href="../aviso.html">Aviso Legal</a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
              <a href="../cookies.html">Cookies</a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
              <a href="../faq.html">Preguntas frecuentes</a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
              <a href="../privacidad.html">Política de privacidad</a>
            </div>
          </div>
        </div>
    </footer> 
  </section>
<!-- Scripts de JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../booklikeness/js/main.js"></script>
    <script src="../booklikeness/js/bootstrap.bundle.min.js"></script>
    <script src="../booklikeness/js/bootstrap.min.js"></script>
    <script scr="../booklikeness/js/stars.js"></script>
    
  </body>
</html>