<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css" />
    <link href="../css/css/bootstrap.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/3875013913.js" crossorigin="anonymous"></script>
    <title>Registro</title>
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
    $registro = null;
    if (isset($_GET['registro'])) {
        $registro = $_GET['registro'];
    }
    ?>

    <!-- MAIN REGISTRO -->
    <main>
        <div><?php echo ($registro == 'ko')?"El usuario ya existe":""?></div>
        <div class="container-form">
            <h4>REGISTRO DE USUARIO</h4>
            <form class="form" method="post" action="./router.php">
                <label>Nombre</label>
                <input class="controls" type="text" name="nombre" placeholder="Ingrese su nombre" required>
                <label>Apellidos</label>
                <input class="controls" type="text" name="apellidos" placeholder="Ingrese sus apellidos" required>
                <label>Correo electrónico</label>
                <input class="controls" type="email" name="email" placeholder="Ingrese su correo electrónico" title="example@example.com" required>
                <label>Teléfono</label>
                <input class="controls" maxlength="9" minlength="9" name="telefono" title="Sólo números" type="tel"  placeholder="Ingrese su número de teléfono" required pattern="[0-9]+">
                <label>Fecha de nacimiento</label>
                <input class="controls" type="date" name="fnac" placeholder="Ingrese su fecha de nacimiento" required title="DD/MM/YYYY">
                <label>Dirección</label>
                <input class="controls" type="text" name="direccion" placeholder="Ingrese su dirección">
                <label>Sexo</label>
                <input class="controls" type="text" name="sexo" placeholder="Ingrese su sexo(F=femenino, M=masculino, O=otro)">
                <label>Contraseña</label>
                <input class="controls" type="password" name="contrasena" autocomplete="off" required>
                <input class="btn btn-outline-primary btn-lg w-100 mt-4" type="submit" name="registrarse" value="Registrarme">
            </form>
            <div class="text-center mt-3">
                <p>¿Ya tienes una cuenta?</p>
                <a class="form-link text-center" href="./login.php">Inicia sesión aqui</a>
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