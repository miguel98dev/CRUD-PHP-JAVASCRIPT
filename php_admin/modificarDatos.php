<?php
// modifica los datos de los usuarios

include('./DB.php');

session_start();

if ($_SESSION['usuario'][2] == 'user' || $_SESSION['usuario'][2] == 'admin') {

    if (isset($_POST['idUser'])) { 
        
        $idUser = filter_input(INPUT_POST, 'idUser', FILTER_SANITIZE_NUMBER_INT, FILTER_VALIDATE_INT);
        $nombre = htmlentities($_POST['nombre']);
        $apellidos = htmlentities($_POST['apellidos']);
        $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_NUMBER_INT, FILTER_VALIDATE_INT);
        $direccion = htmlentities($_POST['direccion']);
        $pass = htmlentities($_POST['contrasena']);
        $contrasena = password_hash($pass, PASSWORD_BCRYPT);

        // echo $idUser;

        $conexion = DB::conn();
        $sentencia = "UPDATE users_data SET nombre = :nuevoNombre, apellidos = :nuevoApellido, telefono = :nuevoTelefono, direccion = :nuevaDireccion  WHERE idUser = :idUser";
        $consulta = $conexion->prepare($sentencia);
        $consulta->bindParam(":idUser", $idUser);
        $consulta->bindParam(":nuevoNombre", $nombre);
        $consulta->bindParam("nuevoApellido", $apellidos);
        $consulta->bindParam(":nuevoTelefono", $telefono);
        $consulta->bindParam(":nuevaDireccion", $direccion);
        $consulta->execute();
        $sentencia2 = "UPDATE users_login SET contrasena = :nuevaContrasena WHERE idLogin = :idUser";
        $consulta = $conexion->prepare($sentencia2);
        $consulta->bindParam(":idUser", $idUser);
        $consulta->bindParam(":nuevaContrasena", $contrasena);
        $consulta->execute();
        $consulta->closeCursor();
        $conexion = null;
    }
} else {
    header('location:../php/login.php');
}

// $conexion = self::conn();
//         $sentencia = 'INSERT INTO users_data (nombre, apellidos, email, telefono, fnac, direccion, sexo) VALUES (:nombre, :apellidos, :email, :telefono, :fnac, :direccion, :sexo)';
//         $consulta = $conexion->prepare($sentencia);
//         $consulta->bindParam(':nombre', $nombre);
//         $consulta->bindParam(':apellidos', $apellidos);
//         $consulta->bindParam(':email', $email);
//         $consulta->bindParam(':telefono', $telefono);
//         $consulta->bindParam(':fnac', $fnac);
//         $consulta->bindParam(':direccion', $direccion);
//         $consulta->bindParam(':sexo', $sexo);
//         $consulta->execute();
//         $sentencia2 = 'INSERT INTO users_login (idLogin, idUser, usuario, contrasena, rol) VALUES (:idLogin, :idUser, :usuario, :contrasena, :rol)';
//         $rol = 'user';
//         $lastInsertId = $conexion->lastInsertId();
//         $consulta = $conexion->prepare($sentencia2);
//         $consulta->bindParam(':idLogin', $idLogin);
//         $consulta->bindParam(':idUser', $lastInsertId);
//         $consulta->bindParam(':usuario', $email);
//         $consulta->bindParam(':contrasena', $contrasena);
//         $consulta->bindParam(':rol', $rol);
//         $consulta->execute();