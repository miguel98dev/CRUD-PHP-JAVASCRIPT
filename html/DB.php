<?php

include('../php/.env.php');

class DB {

    public static function conn() {

       // conexión a la base de datos
       try {
        $conn = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BD, USUARIO, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
        echo 'hola';
    } catch (PDOException $e) {
        echo 'HA FALLADO LA CONEXIÓN: ' . $e->getMessage();
    }
        
    }
}
