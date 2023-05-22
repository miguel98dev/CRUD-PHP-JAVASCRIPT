<?php

include './DB.php';

class ControllerLogin
{
    public function login($email, $pass)
    {
        $login = $this->comprobarUsuario($email, $pass);
        if ($login[0]) {
            $user = DB::comprobarRol($email);
            $user2 = DB::comprobarUsuario($email);
            session_start();
            $_SESSION['usuario'] = [$user[0]->idUser, $user[0]->usuario, $user[0]->rol];
            $_SESSION['usuario2'] = [$user2[0]->idUser, $user2[0]->nombre, $user[0]->email];
            header('location:../php_admin/index.php?login=ok');
        } else {
            header('location:login.php?login=ko');
        }
    }

    /**
     * inserta usuario en users_data (registro) si no lo esta ya registrado
     * @param type $nombre; @param type $apellidos; @param type $email; @param type $telefono;
     * @param type $fnac; @param type $direccion; @param type $sexo; @param type $contrasena;
     */

    public function registrarUsuario($nombre, $apellidos, $email, $telefono, $fnac, $direccion, $sexo, $idLogin, $contrasena, $rol)
    {
        $result = $this->buscarUsuario($email);
        if ($result[0]) {
            header('location:registro.php?registro=ko');
            exit();
        } else {
            DB::registrar($nombre, $apellidos, $email, $telefono, $fnac, $direccion, $sexo, $idLogin, $contrasena, $rol);
            $user = DB::comprobarRol($email);
            $user2 = DB::comprobarUsuario($email);
            $_SESSION['usuario'] = [$user[0]->idUser, $user[0]->usuario, $user[0]->rol];
            $_SESSION['usuario2'] = [$user2[0]->idUser, $user2[0]->nombre, $user[0]->email];
            header('location:login.php?registro=ok');
        }
    }

    /**
     * comprueba el login con el email y la contraseña
     * @param type $email;
     * @param type $contrasena;
     * @return type
     */

    public function comprobarUsuario($email, $contrasena = null)
    {
        // si encuentra el usuario la variable found devuelve true
        $found = false;
        $result = DB::comprobarRol($email);
        if (count($result) === 1) {
            if ($email === $result[0]->usuario && password_verify($contrasena, $result[0]->contrasena)) {
                $found = true;
            }
        }
        return [$found, [$result[0]->idUser, $result[0]->rol]];
    }

    /**
     * devuelve true si encuentra el usuario mediante el email
     * @param type $email;
     * @return type
     */

    public function buscarUsuario($email)
    {
        $found = false;
        $result = DB::comprobarUsuario($email);
        if (count($result) === 1) {
            $found = true;
        }
        return [$found];
    }
}

?>

