<?php
// muestra los datos de todos lo usuarios registrados

include('./DB.php');

session_start();

if ($_SESSION['usuario'][2] == 'admin' || $_SESSION['usuario'][2] == 'user') {

    $conexion = DB::conn();
    $sentencia = "SELECT * FROM users_data";
    $consulta = $conexion->prepare($sentencia);
    $consulta->execute();

    $json = [];
    while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $json[] = [
            'idUser' => $row['idUser'],
            'nombre' => $row['nombre'],
            'apellidos' => $row['apellidos'],
            'telefono' => $row['telefono'],
            'direccion' => $row['direccion']
        ];
    }
    $consulta->closeCursor();
    $conexion = null;
    $jsonstring = json_encode($json);
    echo $jsonstring;
} else {
    header('location:../php/login.php');
}
