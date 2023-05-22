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
    <title>Administrar usuarios</title>
</head>

<body>
    <?php
    // include('./mostrarNoticias.php');
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
                            <a href="./perfil.php" class="navbar-brand">Perfil</a>
                        </li>
                        <li>
                            <a href="./adminUsuarios.php" class="navbar-brand">Administrar usuarios</a>
                        </li>
                        <li>
                            <a href="./citas.php" class="navbar-brand">Administrar citas</a>
                        </li>
                        <li>
                            <a href="#" id="nav-link-active" class="navbar-brand">Administrar noticias</a>
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
        } else { // si el usuario no es 'admin' le lleva al login directamente
            header('location:../php/login.php');
        }
        ?>
    </header>

    <main>
        <?php
        if ($datos[2] == 'admin') {
        ?>
            <div class="container p-4">
                <div class="row">
                    <div class="col-md-5 mt-4" id="edit-noticias">
                        <div class="border">
                            <div class="card-body">
                                <form class="form" action="./modificarNoticia.php" method="post" id="form-noticias" enctype="multipart/form-data">
                                    <input type="" name="idNoticia" id="idNoticia" />
                                    <div class="form-label">
                                        <input type="file" name="imagen-mod" class="form-control mb-3" id="imagen-noticia" required>
                                        <input type="text" class="form-control mb-3" name="titulo-noticia-mod" id="titulo-noticia" placeholder="Título noticia" required>
                                        <textarea type="text" class="form-control mb-3" name="texto-noticia-mod" id="texto-noticia" placeholder="Texto noticia" required></textarea> 
                                    </div>
                                    <button type="submit" class="btn btn-success col-12 text-center">
                                        Modificar noticia
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 text-center mt-4" id="ver-noticias">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <td>ID del usuario</td>
                                    <td>ID de la noticia</td>
                                    <td>Título de la noticia</td>
                                    <td>Fecha de publicación</td>
                                    <td>Modificar noticia</td>
                                    <td>Borrar noticia</td>
                                </tr>
                            </thead>
                            <tbody id="datos-noticias"></tbody>
                        </table>
                    </div>
                </div>
                <button class="cita-nueva btn btn-dark w-100 mt-3">
                    Crear noticia
                </button>
                <div class="col-md-6" id="nueva-cita">
                    <div class="border">
                        <h3 class="text-center mt-3">Crear noticia</h3>
                        <div class="card-body">
                            <form class="form" action="./insertarNoticias.php" method="post" id="crear-noticia" enctype="multipart/form-data">
                                <div class="form-label">
                                    <input type="file" name="imagen" class="form-control mb-3" required>
                                    <input type="text" class="form-control mb-3" name="titulo-noticia" placeholder="Título noticia" required>
                                    <textarea type="text" class="form-control mb-3" name="texto-noticia" placeholder="Texto noticia" required></textarea>
                                    <input type="date" class="form-control mb-3" name="fecha-noticia" required>
                                </div>
                                <button type="submit" class="btn btn-success col-12 text-center">
                                    Crear noticia
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else {
            header('location:../php/login.php');
        }
        ?>
    </main>

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