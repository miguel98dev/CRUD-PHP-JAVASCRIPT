<?php
// verifica el login y el registro

include './controllerLogin.php';

if (isset($_POST['registrarse'])) {
   $nombre = htmlentities($_POST['nombre']);
   $apellidos = htmlentities($_POST['apellidos']);
   $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
   $telefono = filter_input(INPUT_POST, 'telefono', FILTER_VALIDATE_INT);
   $fnac = htmlentities($_POST['fnac']); 
   $direccion = htmlentities($_POST['direccion']);
   $sexo = htmlentities($_POST['sexo']);
   $pass = htmlentities($_POST['contrasena']);
   $contrasena = password_hash($pass, PASSWORD_BCRYPT);

   $reg = new ControllerLogin();
   $reg->registrarUsuario($nombre, $apellidos, $email, $telefono, $fnac, $direccion, $sexo, $idLogin, $contrasena, $rol);
   unset($reg);
}

if (isset($_POST['login'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
    $contrasena = htmlentities($_POST['contrasena']);
    $pass = password_hash($contrasena, PASSWORD_BCRYPT);

    $log = new ControllerLogin();
    $log->login($email, $contrasena);
    unset($log);
}
?>