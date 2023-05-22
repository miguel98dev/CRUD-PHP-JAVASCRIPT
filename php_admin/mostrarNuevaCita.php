<?php
// solicita una nueva cita

include('./DB.php');

session_start();

if ($_SESSION['usuario'][2] == 'user' || $_SESSION['usuario'][2] == 'admin') {

    $conexion = DB::conn();
    $sentencia = "SELECT * FROM users_data WHERE idUser = :idUser";
    $consulta = $conexion->prepare($sentencia);
    $consulta->bindParam(':idUser', $_SESSION['usuario'][0]);
    $consulta->execute();

    $json = [];
    while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $json[] = [
            'idUser' => $row['idUser'],
        ];
    }

    $consulta->closeCursor();
    $conexion = null;
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
} else {
    header('location:../php/login');
}
