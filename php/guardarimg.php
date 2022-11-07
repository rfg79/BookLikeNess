<?php

    include("conexionbbdd.php");

    $isbn = $_POST['isbn'];
    $titulo = $_POST['titulo'];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $ano = $_POST['ano'];

    $query = "INSERT INTO tabla_libros(isbn,titulo,imagen,ano) VALUES('$isbn','$titulo','$imagen','$ano')";
    $resultado = $conexion->query($query);

    if($resultado){
        echo "libro insertado correctamente";
    }
    else {
        echo "error en la subida";
    }

?>