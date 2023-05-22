<link rel="stylesheet" href="../css/css/bootstrap.css" />
<link rel="stylesheet" href="../css/styles.css">

<?php
// modifica la noticia

include('./DB.php');

session_start();

if ($_SESSION['usuario'][2] == 'admin') {

    $idNoticia = $_POST['idNoticia'];
    $titulo = $_POST['titulo-noticia-mod'];
    $texto = $_POST['texto-noticia-mod'];
    $nombreImagen = $_FILES['imagen-mod']['name'];
    $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . '/masterD/trabajo_final_php/img/'; 
    move_uploaded_file($_FILES['imagen-mod']['tmp_name'], $carpetaDestino . $nombreImagen);
    
    $conexion = DB::conn();
    $imagen = fopen($carpetaDestino . $nombreImagen, "r");
    $archivoBytes = fread($imagen, intval(filesize( $carpetaDestino . $nombreImagen)));
    fclose($imagen);

    $sentencia = 'UPDATE noticias SET titulo = :new_titulo, imagen = :new_imagen, texto = :new_texto WHERE idNoticia = :idNoticia';
    $consulta = $conexion->prepare($sentencia);
    $consulta->bindParam(':idNoticia', $idNoticia);
    $consulta->bindParam(':new_titulo', $titulo);
    $consulta->bindParam(':new_texto', $texto);
    $consulta->bindParam(':new_imagen', $archivoBytes);
    $consulta->execute();

    $consulta->closeCursor();
    $conexion = null;

    echo 
   "<div class='ms-3 mt-3'>
   <p>Noticia modificada correctamente</p>
   <a href='./noticias.php' class='btn btn-dark' style='width:200px'>Ver noticias</a>
   </div>";
    
}
