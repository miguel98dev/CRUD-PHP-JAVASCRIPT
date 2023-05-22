<?php
// elimina usuarios

include('./DB.php');

session_start();

if ($_SESSION['usuario'][2] == 'admin') {

    if (isset($_POST['idUser'])) {
        $idUser = $_POST['idUser'];

        $conexion = DB::conn();
        $sentencia = 'DELETE FROM users_login WHERE idUser = :idUser';
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(':idUser', $idUser);
        $consulta->execute();
        $sentencia2 = 'DELETE FROM users_data WHERE idUser = :idUser';
        $consulta = $conexion->prepare($sentencia2);
        $consulta->bindParam(':idUser', $idUser);
        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;
    }
} else {
    header('location:../php/login.php');
}

?>