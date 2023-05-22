<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/css/bootstrap.css" />
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://kit.fontawesome.com/3875013913.js" crossorigin="anonymous"></script>
    <title>Panel de Control</title>
</head>

<body>
    <?php
    session_start(); // iniciamos la sesion

    $datos = null;

    //  se comprueba que la sesión este iniciada
    if (isset($_SESSION['usuario'])) {
        $datos = $_SESSION['usuario'];
    }
    ?>
    <!-- HEADER -->
    <header class="header">
        <div>
            <!-- NAV MENU -->
            <nav class="navbar navbar-expand-lg navbar-dark">
                <img src="../img/logo.png" alt="logo" />
                <ul class="navbar-nav m-auto">
                    <li>
                        <a href="../html/index.html" class="navbar-brand">Inicio</a>
                    </li>
                    <li>
                        <a href="../html/noticias.html" class="navbar-brand">Noticias</a>
                    </li>
                </ul>
                <ul class="nav-btn navbar-nav me-3">
                    <li>
                        <a href="./RouterAdmin.php?session=off" class="btn btn-primary rounded">Cerrar sesión</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <?php
        // muestra los datos de los clientes y propios si el usuario es 'admin'
        if ($datos[2] == 'admin') {
        ?>
            <h2>Panel de control</h2>
            <?php
            echo 'Hola admin ' . $datos[1];
            ?>
            <div>
                <a href="">Nuevo usuario</a>
                <a href="">Ver todos los usuarios</a>
                <a href="">Ver mis datos</a>
            </div>
        <?php
            // muestra los datos propios si el usuarios es 'user'
        } elseif ($datos[2] == 'user') {
        ?>
            <h2>Panel de control</h2>
            <?php
            echo 'Hola user ' . $datos[1];
            ?>
            <div>
                <a href="">Ver mis datos</a>
            </div>
        <?php
            // si no es ni 'admin' ni 'user' lo lleva al login de nuevo
        } else {
            header('location:../php/login.php');
            exit();
        }
        ?>
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div>
            <p class="m-0">
                &#9400; Copyright 2022 | Todos los derechos reservados
            </p>
            <ul class="m-0">
                <li class="fa fa-facebook"></li>
                <li class="fa fa-instagram"></li>
            </ul>
        </div>
    </footer>

</body>

</html>