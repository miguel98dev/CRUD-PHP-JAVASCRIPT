<link rel="stylesheet" href="../css/css/bootstrap.css" />
<link rel="stylesheet" href="../css/styles.css">

<?php
// inserta la noticias en la bbdd

include('./DB.php');

session_start();

if ($_SESSION['usuario'][2] == 'admin') {

   $idUser = $_SESSION['usuario'][0];
   $titulo = $_POST['titulo-noticia'];
   $texto = $_POST['texto-noticia'];
   $fecha = $_POST['fecha-noticia'];
   $nombreImagen = $_FILES['imagen']['name'];
   $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . '/masterD/trabajo_final_php/img/'; 
   move_uploaded_file($_FILES['imagen']['tmp_name'], $carpetaDestino . $nombreImagen);
   
   $conexion = DB::conn();
   $imagen = fopen($carpetaDestino . $nombreImagen, "r");
   $archivoBytes = fread($imagen, intval(filesize($carpetaDestino . $nombreImagen)));
   fclose($imagen);
   
   $sentencia = 'INSERT INTO noticias (idUser, titulo, imagen, texto, fecha) VALUES (:idUser, :titulo, :imagen, :texto, :fecha)';
   $consulta = $conexion->prepare($sentencia);
   $consulta->bindParam(':idUser', $idUser);
   $consulta->bindParam(':titulo', $titulo);
   $consulta->bindParam(':imagen', $archivoBytes);
   $consulta->bindParam(':texto', $texto);
   $consulta->bindParam(':fecha', $fecha);
   $consulta->execute();

   $consulta->closeCursor();
   $conexion = null;
   
   echo 
   "<div class='ms-3 mt-3'>
   <p>Noticia creada correctamente</p>
   <a href='./noticias.php' class='btn btn-dark' style='width:200px'>Ver noticias</a>
   </div>";
}

?>