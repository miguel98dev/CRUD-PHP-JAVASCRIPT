<?php

include './.env.php';

class DB
{

    public static function conn()
    {
        // conexión a la base de datos
        try {
            $conn = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BD, USUARIO, PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo 'HA FALLADO LA CONEXIÓN: ' . $e->getMessage();
        }
    }

    /**
     * Comprueba que un usuario existe en la DB y devuelve un array de objetos con los registros de la tupla de datos
     * @param type $email;
     * @return array 
     */

    public static function comprobarRol($email)
    {
        $result = [];
        $conexion = self::conn();
        $sentencia = 'SELECT * FROM users_login WHERE usuario = :usuario';
        $consulta = $conexion->prepare($sentencia);
        $consulta->execute(array(':usuario' => $email));
        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
            array_push($result, $fila);
        }
        $consulta->closeCursor();
        $conexion = null;
        return $result;
    }

    /**
     * Comprueba que un usuario existe en la DB y devuelve un array de objetos con los registros de la tupla (id,nombre,email,contrasena,rol)
     * @param type $email;
     * @return array 
     */

    public static function comprobarUsuario($email)
    {
        $result = [];
        $conexion = self::conn();
        $sentencia = "SELECT * FROM users_data WHERE email = :email";
        $consulta = $conexion->prepare($sentencia);
        $consulta->execute(array(":email" => $email));
        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
            array_push($result, $fila);
        }
        $consulta->closeCursor();
        $conexion = null;
        return $result;
    }

    /**
     * Comprueba que un usuario existe en la DB y devuelve un array de objetos con los registros de la tupla (id,nombre,email,contrasena,rol)
     * @param type $id;
     * @return array 
     */

    public static function buscarId($id)
    {
        $result = [];
        $conexion = self::conn();
        $sentencia = "SELECT * FROM users_data WHERE id = :id";
        $consulta = $conexion->prepare($sentencia);
        $consulta->execute(array(":id" => $id));
        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
            array_push($result, $fila);
        }
        $consulta->closeCursor();
        $conexion = null;
        return $result;
    }


    /**
     * inserta usuario en la tabla users_data y users_login
     * @param type $idUser; @param type $nombre; @param type $apellidos; @param type $email; 
     * @param type $telefono; @param type $fnac; @param type $direccion; @param type $sexo;
     * @param type $idLogin; @param type $contrasena;  @param type $rol;
     */

    public static function registrar($nombre, $apellidos, $email, $telefono, $fnac, $direccion, $sexo, $idLogin, $contrasena, $rol)
    {
        $conexion = self::conn();
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
        $rol = 'user';
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

}
