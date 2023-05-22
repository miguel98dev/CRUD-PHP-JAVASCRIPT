<?php
// obtiene las noticias para mostrarlas a los visitantes

include('./DB.php');

$idUser = '';
$titulo = '';
$imagen = '';
$texto = '';
$fecha = '';
$usuario = '';

$conexion = DB::conn();
$sentencia = 'SELECT * FROM noticias';
$consulta = $conexion->prepare($sentencia);
$consulta->execute();


while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {

    $titulo = $row['titulo'];
    $imagen = $row['imagen'];
    $texto = $row['texto'];
    $fecha = $row['fecha'];
    $idUser = $row['idUser'];
?>
    
    <div class="grid-item">
        <?php
        echo "<img class='imagen-noticia' width='100%' height='200' src='data:image/png; base64," . base64_encode($imagen) . "'>";
        ?>
        <div class="grid">
            <?php
            echo "<h4 class='titulo-noticia'>$titulo</h4>";
            echo "<p class='texto-noticia'>$texto</p>";
            echo "<p class='id-fecha-noticia'>ID usuario: $idUser <br> Fecha de publicación: $fecha</p>";
            ?>
        </div>
    </div>
<?php
}

$consulta->closeCursor();
$conexion = null;


?>