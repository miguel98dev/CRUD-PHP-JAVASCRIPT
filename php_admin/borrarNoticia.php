<?php
// borra noticias

include('./DB.php');

session_start();

if ($_SESSION['usuario'][2] == 'admin') {

    if (isset($_POST['idNoticia'])) {

        $idNoticia = $_POST['idNoticia'];

        $conexion = DB::conn();
        $sentencia = 'DELETE FROM noticias WHERE idNoticia = :idNoticia';
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(':idNoticia', $idNoticia);
        $consulta->execute();

        $consulta->closeCursor();
        $conexion = null;
    }
}

?>