<?php

include('../php/.env.php');

class DB {

    public function __construct()
    {
        if ($_SESSION['usuario'][2] != 'admin' || $_SESSION['usuario'][2] != 'user') {
            header('location:../php/login.php');
            exit();
        }
    }

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
}




