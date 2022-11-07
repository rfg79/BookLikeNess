<?php
include 'conexionbbdd.php'
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
              <form action="../booklikeness/php/search.php" method="POST" accept-charset="UTF-8">
              <input id="top-search-input" type="search" name="busqueda" placeholder="Busca tu título favorito..." size="30" value="" tabindex="1">
              <button id="sbutton" type="submit" name="enviar">Buscar</button>
              </form>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 align-self-center">
            <a href="../booklikeness/php/register.php">Iniciar sesión / Registrarse</a>
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
                    <a href="../area_login.php">Área Privada</a>
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
  <!--Menú lateral-->
  <section>
    <div class="aside">
      <ul class="menuVert">
        <li><a class="nav-link" href="../catalogo.php">Catálogo</a></li>
        <li><a class="nav-link" href="../novedades.php">Novedades</a></li>
        <li><a class="nav-link" href="../ranking.php">Ranking</a></li>
        <li><a class="nav-link" href="../php/area_login.php">Área Privada</a></li>
      </ul>
    </div>
  </section>
  <!-- Tabla búsqueda -->
  <section>
    <div class="tabla_central"></div>
    <div class="col-sm-18 col-md-10 cold-lg-10" id="tabla_central">
      <h3>Resultado de tu búsqueda</h3>
       <table>
          <tr>
            <th width="35%">Portada</th> 
            <th width="20%">Año</th>
            <th width="10%">Título</th> 
            <th width="25%">Autor</th>
            <th width="10%">Puntuación</th>     
          </tr>
        <?php
        
        if(isset($_POST['enviar'])) {
            $busqueda = $_POST['busqueda'];

            $consulta = $conexion->query("SELECT * FROM tabla_libros INNER JOIN tabla_autor WHERE tabla_libros.idAutor = tabla_autor.idAutor AND titulo LIKE '%$busqueda%'");
            
            while($row = $consulta->fetch_array()) { 
              $field1name = $row["titulo"];
                  $field2name = $row["ano"];
                  $field3name = '<img src="data:url/jpeg;base64,'.base64_encode( $row['portada']).'" height="10%" width="10%"/>';
                  $field4name = $row["puntuacion"];
                  $field6name = $row['nombreAutor'];
                  $field7name = $row['apellidoAutor'];
                
              echo '<tr> 
                        <td>'.$field3name.'</td> 
                        <td>'.$field2name.'</td> 
                        <td>'.$field1name.'</td> 
                        <td>'.$field6name.' '.$field7name.'</td> 
                        <td>'.$field4name.'</td> 
                  
                      </tr>';
            }
        }
        ?>
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
    </div>
  </footer>
  </section>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../booklikeness/js/main.js"></script>
    <script src="../booklikeness/js/bootstrap.bundle.min.js"></script>
    <script src="../booklikeness/js/bootstrap.min.js"></script>
   
  </body>
</html>