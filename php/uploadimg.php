<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Subir libros</title>
  </head>
  <body>
    <form action="guardarimg.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="isbn" placeholder="Introduce 10 digitos" value="" />    
        <input type="text" name="titulo" placeholder="Título del libro" value=""/>
        <input type="file" name="imagen" />
        <input type="text" name="ano" placeholder="Introduce el año" value="" />
        <br/>
        <input type="submit" value="Aceptar"/>
    </form>
  </body>
</html>