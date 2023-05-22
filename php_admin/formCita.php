<?php
// muestra la cita en el formulario

include('./DB.php');

session_start();


if ($_SESSION['usuario'][2] == 'user' || $_SESSION['usuario'][2] == 'admin') {

    if (isset($_POST['idCita'])) {

        $conexion = DB::conn();
        $sentencia = 'SELECT * FROM citas WHERE idCita = :idCita';
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(':idCita', $_POST['idCita']);
        $consulta->execute();

        $json = [];
        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $json[] = [
                'idCita' => $row['idCita'],
                'fecha' => $row['fecha_cita'],
                'motivo' => $row['motivo_cita']
            ];
        }

        $consulta->closeCursor();
        $conexion = null;
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
    }
}
?>