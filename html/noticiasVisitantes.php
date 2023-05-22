<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/styles.css" />
  <link href="../css/css/bootstrap.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/3875013913.js" crossorigin="anonymous"></script>
  <title>Noticias</title>
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
            <a href="./index.html" class="navbar-brand">Inicio</a>
          </li>
          <li>
            <a href="" id="nav-link-active" class="navbar-brand">Noticias</a>
          </li>
        </ul>
        <ul class="nav-btn navbar-nav me-3">
          <a href="../php/login.php" class="btn btn-primary rounded">Login</a>
          <a href="../php/registro.php" class="btn btn-success rounded">Registro</a>
        </ul>
      </nav>
    </div>
  </header>

  <!-- MAIN NOTICIAS -->
  <main>
    <div class="grid-container pt-4" id="ver-noticias">
      <?php
      include('./mostrarNoticiasVisitantes.php');
      ?>
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