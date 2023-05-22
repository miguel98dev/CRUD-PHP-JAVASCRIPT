<?php

// cierra la sesión
if (isset($_GET['session']) && $_GET['session'] == 'off') {
    session_start();
    session_destroy();
    header('location:../php/login.php');
    exit();
}

?>
