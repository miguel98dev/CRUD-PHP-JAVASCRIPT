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
  <title>Citas</title>
</head>

<body>
  <?php
  session_start(); // iniciamos la sesion

  $datos = null;


  if (isset($_SESSION['usuario'])) { //  se comprueba que la sesión este iniciada
    $datos = $_SESSION['usuario'];
  }

  ?>
  <header class="header">
    <?php
    if ($datos[2] == 'user') {
    ?>
      <div>
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
              <a href="" id="nav-link-active" class="navbar-brand">Citaciones</a>
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
    } elseif ($datos[2] == 'admin') {
    ?>
      <div>
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
              <a href="" id="nav-link-active" class="navbar-brand">Administrar citas</a>
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
    } else {
      header('location:../php/login.php');
    }
    ?>
  </header>

  <main>
    <?php
    if ($datos[2] == 'user') {
    ?>
      <div class="container p-4">
        <div class="row">
          <div class="col-md-5 mt-4" id="modificar-cita">
            <div class="border">
              <div class="card-body">
                <!-- form no tiene el atributo action porque lo vamos a procesar por JS -->
                <form class="form" id="editar-cita">
                  <input type="hidden" id="idCita" />
                  <div class="form-label">
                    <input type="date" id="edit-fecha" placeholder="Fecha" class="form-control mb-3" />
                    <input type="text" id="edit-motivo" class="form-control mb-3" placeholder="Motivo de la cita">
                  </div>
                  <button type="submit" class="btn btn-success col-12 text-center">
                    Modificar cita
                  </button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-7 text-center mt-4" id="datos-cita">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <td>ID cita</td>
                  <td>Fecha</td>
                  <td>Motivo</td>
                  <td>Modificar cita</td>
                  <td>Cancelar cita</td>
                </tr>
              </thead>
              <tbody id="citas"></tbody>
            </table>
          </div>
          <button class="nueva-cita btn btn-dark w-100 mt-3">
            NUEVA CITA
          </button>
        </div>
        <div class="col-md-12 mt-4" id="solicitar-cita">
          <div class="border">
            <h3 class="text-center mt-3">SOLICITAR NUEVA CITA</h3>
            <div class="card-body">
              <form class="form" id="form-editar2">
                <input type="hidden" id="idUser2" />
                <div class="form-label">
                  <input type="date" id="fecha" placeholder="Fecha" class="form-control mb-3" />
                  <input type="text" id="motivo" class="form-control mb-3" placeholder="Motivo de la cita">
                </div>
                <button type="submit" class="btn btn-success col-12 text-center">
                  Pedir cita
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php
    } elseif ($datos[2] == 'admin') {
    ?>

      <div class="container p-4">
        <div class="row">
          <div class="col-md-6 text-center mt-4" id="nombre-usuario">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <td>ID cita</td>
                  <td>Nombre</td>
                  <td>Nueva cita</td>
                </tr>
              </thead>
              <tbody id="citas-usuarioss"></tbody>
            </table>
          </div>
          <div class="col-md-6 mt-6" id="solicitar-citas">
            <div class="border">
              <h3 class="text-center mt-3">SOLICITAR NUEVA CITA</h3>
              <div class="card-body">
                <form class="form" id="form-editar2">
                  <input type="hidden" id="idUser2" />
                  <div class="form-label">
                    <input type="date" id="fecha" placeholder="Fecha" class="form-control mb-3" />
                    <input type="text" id="motivo" class="form-control mb-3" placeholder="Motivo de la cita">
                  </div>
                  <button type="submit" class="btn btn-success col-12 text-center">
                    Pedir cita
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mt-4" id="modificar-cita-usuario">
            <div class="border">
              <div class="card-body">
                <!-- form no tiene el atributo action porque lo vamos a procesar por JS -->
                <form class="form" id="editar-cita">
                  <input type="hidden" id="idCita" />
                  <div class="form-label">
                    <input type="date" id="edit-fecha" placeholder="Fecha" class="form-control mb-3" />
                    <input type="text" id="edit-motivo" class="form-control mb-3" placeholder="Motivo de la cita">
                  </div>
                  <button type="submit" class="btn btn-success col-12 text-center">
                    Modificar cita
                  </button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-8 text-center mt-4" id="datos-cita-usuario">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <td>IdUser</td>
                  <td>IdCita</td>
                  <td>Fecha</td>
                  <td>Motivo</td>
                  <td>Modificar cita</td>
                  <td>Cancelar cita</td>
                </tr>
              </thead>
              <tbody id="citas-usuarios"></tbody>
            </table>
          </div>
        </div>
        <div class="col-md-12 mt-4" id="solicitar-cita">
          <div class="border">
            <h3 class="text-center mt-3">SOLICITAR NUEVA CITA</h3>
            <div class="card-body">
              <form class="form" id="form-editar2">
                <input type="hidden" id="idUser2" />
                <div class="form-label">
                  <input type="date" id="fecha" placeholder="Fecha" class="form-control mb-3" />
                  <input type="text" id="motivo" class="form-control mb-3" placeholder="Motivo de la cita">
                </div>
                <button type="submit" class="btn btn-success col-12 text-center">
                  Pedir cita
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php
    } else {
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