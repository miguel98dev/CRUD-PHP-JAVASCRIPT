<?php
// borra la cita seleccionada

include('./DB.php');

session_start();

if ($_SESSION['usuario'][2] == 'user' || $_SESSION['usuario'][2] == 'admin') {

    if (isset($_POST['idCita'])) {

        $idCita = $_POST['idCita'];

        $conexion = DB::conn();
        $sentencia = 'DELETE FROM citas WHERE idCita = :idCita';
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(':idCita', $idCita);
        $consulta->execute();

        $consulta->closeCursor();
        $conexion = null;
    }
}

?>