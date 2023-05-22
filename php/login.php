<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/css/bootstrap.css" />
    <script src="https://kit.fontawesome.com/3875013913.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body>
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
                        <a href="../html/noticiasVisitantes.php" class="navbar-brand">Noticias</a>
                    </li>
                </ul>
                <ul class="nav-btn navbar-nav me-3">
                    <a href="../php/login.php" class="btn btn-primary rounded">Login</a>
                    <a href="../php/registro.php" class="btn btn-success rounded">Registro</a>
                </ul>
            </nav>
        </div>
    </header>

    <!-- PHP - LOGIN -->
    <?php
    $login = null;
    if (isset($_GET['login'])) {
        $login = $_GET['login'];
    }
    $registro = null; 
    if (isset($_GET['registro'])) {
        $registro = $_GET['registro'];
    }
    ?>

    <!-- MAIN LOGIN -->
    <main>
        <div><?php echo ($login == 'ko') ? 'Los datos son incorrectos' : '' ?></div>
        <div><?php echo ($registro == 'ok') ? 'Registro realizado correctamente, ya puedes iniciar sesión' : '' ?></div>
        <div class="container-form">
            <h4>INICIA SESIÓN EN TU CUENTA</h4>
            <form id="login" method="post" action="./router.php">
                <label>Email</label>
                <input class="controls" type="email" name="email" placeholder="Ingrese su email" required>
                <label>Contraseña</label>
                <input class="controls" type="password" autocomplete="off" name="contrasena" required>
                <input class="btn btn-outline-primary btn-lg w-100 mt-4" type="submit" name="login" value="Acceder">
            </form>
            <div class="text-center mt-3">
                <p>¿Todavía no tienes una cuenta?</p>
                <a class="form-link text-center " href="./registro.php">Registrate aqui</a>
            </div>
        </div>
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