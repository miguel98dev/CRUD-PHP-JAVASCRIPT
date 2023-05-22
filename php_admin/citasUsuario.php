<?php
// inserta la cita en la tabla citas

include('./DB.php');

session_start();

if ($_SESSION['usuario'][2] == 'user' || $_SESSION['usuario'][2] == 'admin') {

    if (isset($_POST['idUser2'])) {
        
        $idUser = $_POST['idUser2'];
        $fecha = $_POST['fecha'];
        $motivo = $_POST['motivo'];

        $conexion = DB::conn();
        $sentencia = "INSERT INTO citas (idUser, fecha_cita, motivo_cita) VALUES (:idUser, :fecha_cita, :motivo_cita)";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(':idUser', $idUser);
        $consulta->bindParam(':fecha_cita', $fecha);
        $consulta->bindParam(':motivo_cita', $motivo);
        $consulta->execute();
    }

    $consulta->closeCursor();
    $conexion = null;

}
