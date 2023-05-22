<?php
// modifica los datos de la cita

include('./DB.php');

session_start();

if ($_SESSION['usuario'][2] == 'user' || $_SESSION['usuario'][2] == 'admin') {

    if (isset($_POST['idCita'])) {

        $idCita = $_POST['idCita'];
        $fecha = $_POST['fecha'];
        $motivo = $_POST['motivo'];

        $conexion = DB::conn();
        $sentencia = "UPDATE citas SET fecha_cita = :new_fecha_cita, motivo_cita = :new_motivo_cita WHERE idCita = :idCita";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(':idCita', $idCita);
        $consulta->bindParam(':new_fecha_cita', $fecha);
        $consulta->bindParam(':new_motivo_cita', $motivo);
        $consulta->execute();

        $consulta->closeCursor();
        $conexion = null;
    }
}
