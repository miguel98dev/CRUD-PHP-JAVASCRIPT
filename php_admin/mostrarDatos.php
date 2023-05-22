<?php
// muestra los datos del usuario a modificar en el formulario
include('./DB.php');

session_start();

if ($_SESSION['usuario'][2] == 'user' || $_SESSION['usuario'][2] == 'admin') {

    $conexion = DB::conn();
    $sentencia = "SELECT * FROM users_data WHERE idUser = :idUser";
    $consulta = $conexion->prepare($sentencia);
    $consulta->execute(array(':idUser' => $_POST['idUser']));

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
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
} else {
    header('location:../php/login.php');
}
