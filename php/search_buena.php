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
    
    <!--Título de la web-->
    <title>BookLikeness - Búsqueda</title>
  </head>
  <body>
  
        <?php
        
        if(isset($_POST['enviar'])) {
            $busqueda = $_POST['busqueda'];

            $consulta = $conexion->query("SELECT * FROM tabla_libros WHERE titulo LIKE '%$busqueda%'");
            
            while($row = $consulta->fetch_array()) {
                echo $row['titulo'].'<br>';
                echo $row['ano'].'<br>';?>
                <?php echo '<img src="data:url/jpeg;base64,'.base64_encode( $row['portada']).'" height="10%" width="10%"/>';
                 ?>
                <p><?php echo $row['sinopsis'].'<br>';?></p>
                <h3><?php echo $row['puntuacion'].'<br>';?></h3>
                <?php
            }
        }
        ?>
   
  </body>
</html>