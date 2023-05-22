<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/css/bootstrap.css" />
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://kit.fontawesome.com/3875013913.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="../js/app.js"></script>
    <title>Perfil</title>
</head>

<body>
    <?php
    session_start(); // iniciamos la sesion

    $datos = null;


    if (isset($_SESSION['usuario'])) { //  se comprueba que la sesión este iniciada
        $datos = $_SESSION['usuario'];
    }
    ?>
    <!-- HEADER -->
    <header class="header">
        <?php
        if ($datos[2] == 'admin') { // muestra la barra de navegación de los usuarios con rol 'admin'
        ?>
            <div>
                <!-- NAV MENU - admin-->
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <img src="../img/logo.png" alt="logo" />
                    <ul class="navbar-nav m-auto navbar-php">
                        <li>
                            <a href="./index.php" class="navbar-brand">Inicio</a>
                        </li>
                        <li>
                            <a href="./noticias.php" class="navbar-brand">Noticias</a>
                        </li>
                        <li>
                            <a href="#" id="nav-link-active" class="navbar-brand">Perfil</a>
                        </li>
                        <li>
                            <a href="./adminUsuarios.php" class="navbar-brand">Administrar usuarios</a>
                        </li>
                        <li>
                            <a href="./citas.php" class="navbar-brand">Administrar citas</a>
                        </li>
                        <li>
                            <a href="./adminNoticias.php" class="navbar-brand">Administrar noticias</a>
                        </li>
                    </ul>
                    <ul class="nav-btn navbar-nav me-3">
                        <li>
                            <a href="./RouterAdmin.php?session=off" class="btn btn-primary rounded">Cerrar sesión</a>
                        </li>
                    </ul>
                </nav>
            </div>
        <?php

        } elseif ($datos[2] == 'user') { // muestra la barra de navegacion de los usuarios con rol 'user'
        ?>
            <div>
                <!-- NAV MENU - user -->
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <img src="../img/logo.png" alt="logo" />
                    <ul class="navbar-nav m-auto navbar-php">
                        <li>
                            <a href="./index.php" class="navbar-brand">Inicio</a>
                        </li>
                        <li>
                            <a href="./noticias.php" class="navbar-brand">Noticias</a>
                        </li>
                        <li>
                            <a href="" id="nav-link-active" class="navbar-brand">Perfil</a>
                        </li>
                        <li>
                            <a href="./citas.php" class="navbar-brand">Citaciones</a>
                        </li>
                    </ul>
                    <ul class="nav-btn navbar-nav me-3">
                        <li>
                            <a href="./RouterAdmin.php?session=off" class="btn btn-primary rounded">Cerrar sesión</a>
                        </li>
                    </ul>
                </nav>
            </div>
        <?php
        } else { // si el usuario no es ni 'admin' ni 'user' (no está registrado) le lleva al login directamente
            header('location:../php/login.php');
        }
        ?>
    </header>

    <!-- MAIN - PERFIL -->
    <main>
        <?php
        if ($datos[2] == 'user' || $datos[2] == 'admin') {
        ?>
            <div class="container p-4">
                <div class="row">
                    <div class="col-md-5  mt-4" id="modificar-perfil">
                        <div class="border">
                            <div class="card-body">
                                <!-- form no tiene el atributo action porque lo vamos a procesar por JS -->
                                <form class="form" id="form-editar">
                                    <input type="hidden" id="idUser" />
                                    <div class="form-label">
                                        <input type="text" id="nombre" placeholder="Nombre" class="form-control mb-3" required />
                                        <input type="text" id="apellidos" class="form-control mb-3" placeholder="Apellidos" required>
                                        <input type="tel" id="telefono" class="form-control mb-3" placeholder="Teléfono" required>
                                        <input type="text" id="direccion" class="form-control mb-3" placeholder="Dirección" required>
                                        <input type="password" id="contrasena" class="form-control mb-3" autocomplete="off" placeholder="Contraseña" required>
                                    </div>
                                    <button type="submit" class="btn btn-success col-12 text-center">
                                        Actualizar perfil
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 text-center mt-4" id="datos-perfil">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <td>ID usuario</td>
                                    <td>Nombre</td>
                                    <td>Apellidos</td>
                                    <td>Teléfono</td>
                                    <td>Dirección</td>
                                    <td>Modificar datos</td>
                                </tr>
                            </thead>
                            <tbody id="datos"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php
        } else {
            header('location:../php/login.php');
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