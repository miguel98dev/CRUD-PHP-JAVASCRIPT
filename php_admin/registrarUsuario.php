<?php
// registro de usuarios por el admin

include('./DB.php');

session_start();

if ($_SESSION['usuario'][2] == 'admin') {
 
        $nombre = htmlentities($_POST['nombre']);
        $apellidos = htmlentities($_POST['apellidos']);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
        $telefono = filter_input(INPUT_POST, 'telefono', FILTER_VALIDATE_INT);
        $fnac = htmlentities($_POST['fnac']);
        $direccion = htmlentities($_POST['direccion']);
        $sexo = htmlentities($_POST['sexo']);
        $rol = $_POST['rol'];
        $pass = htmlentities($_POST['contrasena']);
        $contrasena = password_hash($pass, PASSWORD_BCRYPT);

        $conexion = DB::conn();
        $sentencia = 'INSERT INTO users_data (nombre, apellidos, email, telefono, fnac, direccion, sexo) VALUES (:nombre, :apellidos, :email, :telefono, :fnac, :direccion, :sexo)';
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':apellidos', $apellidos);
        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':telefono', $telefono);
        $consulta->bindParam(':fnac', $fnac);
        $consulta->bindParam(':direccion', $direccion);
        $consulta->bindParam(':sexo', $sexo);
        $consulta->execute();
        $sentencia2 = 'INSERT INTO users_login (idUser, usuario, contrasena, rol) VALUES (:idUser, :usuario, :contrasena, :rol)';
        $lastInsertId = $conexion->lastInsertId();
        $consulta = $conexion->prepare($sentencia2);
        $consulta->bindParam(':idUser', $lastInsertId);
        $consulta->bindParam(':usuario', $email);
        $consulta->bindParam(':contrasena', $contrasena);
        $consulta->bindParam(':rol', $rol);
        $consulta->execute();

        $consulta->closeCursor();
        $conexion = null;
}

?>