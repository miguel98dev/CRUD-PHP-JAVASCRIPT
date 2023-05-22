<?php
// muestra las citas del usuario que ha iniciado sesión

include('./DB.php');


session_start();

if ($_SESSION['usuario'][2] == 'user' || $_SESSION['usuario'][2] == 'admin') {

    $conexion = DB::conn();
    $sentencia = "SELECT * FROM citas WHERE idUser = :idUser";
    $consulta = $conexion->prepare($sentencia);
    $consulta->bindParam(':idUser', $_SESSION['usuario'][0]);
    $consulta->execute();

    $json = [];
    while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $json[] = [
           'idCita' => $row['idCita'],
           'idUser' =>$row['idUser'],
           'fecha' => $row['fecha_cita'],
           'motivo' => $row['motivo_cita']
        ];
    }
    $consulta->closeCursor();
    $conexion = null;
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

?>