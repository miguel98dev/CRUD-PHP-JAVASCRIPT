<?php
// obtiene las citas de todos los usuarios

include('./DB.php');

session_start();

if ($_SESSION['usuario'][2] == 'admin' || $_SESSION['usuario'][2] == 'user') {

    $conexion = DB::conn();
    $sentencia = 'SELECT * FROM citas';
    $consulta = $conexion->prepare($sentencia);
    $consulta->execute();

    $json = [];
    while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $json[] = [
            'idCita' => $row['idCita'],
            'idUser' => $row['idUser'],
            'fecha' => $row['fecha_cita'],
            'motivo' => $row['motivo_cita']
        ];
    }

    $consulta->closeCursor();
    $conexion = null;
    $jsonstring = json_encode($json);
    echo $jsonstring;
    
} else {
    header('location:../php/login.php');
}

