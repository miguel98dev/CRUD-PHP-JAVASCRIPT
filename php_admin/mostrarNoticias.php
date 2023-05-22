<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/css/bootstrap.css" />
    <link rel="stylesheet" href="../css/styles.css">
    <title>Document</title>
</head>

<body>
    <?php
    // muestra las noticias

    include('./DB.php');

    // session_start();

    $_SESSION['usuario'][2] = $_SESSION['usuario'][2];

    if ($_SESSION['usuario'][2] == 'admin' || $_SESSION['usuario'][2] == 'user') {

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
                echo "<img class='imagen-noticia'  width='100%' height='200' src='data:image/png; base64," . base64_encode($imagen) . "'>";
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
    }
    ?>

</body>

</html>