<?php

include('./DB.php');

session_start();

if ($_SESSION['usuario'][2] == 'admin' || $_SESSION['usuario'][2] == 'user') {

    $conexion = DB::conn();
    $sentencia = 'SELECT * FROM noticias';
    $consulta = $conexion->prepare($sentencia);
    $consulta->execute();

    $json = [];
    while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $json[] = [
            'idNoticia' => $row['idNoticia'],
            'idUser' => $row['idUser'],
            'titulo' => $row['titulo'],
            'fecha' => $row['fecha'],
        ];
    }

    $consulta->closeCursor();
    $conexion = null;
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
?>

