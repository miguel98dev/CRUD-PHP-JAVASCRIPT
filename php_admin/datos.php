<?php
// muestra los datos del usuario que ha inciado sesion
include('./DB.php');

session_start();

if ($_SESSION['usuario'][2] == 'user' || $_SESSION['usuario'][2] == 'admin') {

    $conexion = DB::conn();
    $sentencia = "SELECT * FROM users_data WHERE idUser = :idUser";
    $consulta = $conexion->prepare($sentencia);
    $consulta->execute(array(':idUser' => $_SESSION['usuario'][0]));

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



   /* // muestra los datos de todos lo usuarios registrados

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
    $jsonstring = json_encode($json);
    echo $jsonstring;

    */
