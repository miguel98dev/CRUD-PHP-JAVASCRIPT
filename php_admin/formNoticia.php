<?php
// modifica la noticia

include('./DB.php');

session_start();

if ($_SESSION['usuario'][2] == 'admin') {

    if (isset($_POST['idNoticia'])) {

        $idNoticia = $_POST['idNoticia'];
        $conexion = DB::conn();
        $sentencia = 'SELECT * FROM noticias WHERE idNoticia = :idNoticia';
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(':idNoticia', $idNoticia);
        $consulta->execute();

        $json = [];
        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $json[] = [
                'idNoticia' => $row['idNoticia'],
                'titulo' => $row['titulo'],
                'texto' => $row['texto']
            ];
        }
        $consulta->closeCursor();
        $conexion = null;
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
    }
}


?>