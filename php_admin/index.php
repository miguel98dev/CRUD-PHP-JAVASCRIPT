<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/css/bootstrap.css" />
  <link rel="stylesheet" href="../css/styles.css">
  <script src="https://kit.fontawesome.com/3875013913.js" crossorigin="anonymous"></script>
  <title>Index</title>
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
              <a href="" id="nav-link-active" class="navbar-brand">Inicio</a>
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
              <a href="" id="nav-link-active" class="navbar-brand">Inicio</a>
            </li>
            <li>
              <a href="./noticias.php" class="navbar-brand">Noticias</a>
            </li>
            <li>
              <a href="./perfil.php" class="navbar-brand">Perfil</a>
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

  <!-- MAIN INDEX - php -->
  <main>
    <!-- CABECERA -->
    <section class="bg-light">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-lg-6 col-md-12">
            <div class="card-body">
              <h1 class="text-primary fs-5">Miguel | Physique Coach</h1>
              <h2 class="fs-3 mb-3">ASESORÍAS</h2>
              <ul class="list-unstyled">
                <li>
                  <p>
                    Hoy en día tenemos al alcance de la mano la información
                    suficiente para poder ajustar por nosotros mismos los
                    entrenamientos y la nutrición de acuerdo a nuestros
                    objetivos.
                  </p>
                </li>
                <li>
                  <p>
                    Pero si lo que buscas es lograr resultados sostenibles de
                    la forma más óptima y eficaz posible, no perder más el
                    tiempo tratando de encontrar el “programa perfecto” y
                    sacar el máximo rendimiento a tus esfuerzos, necesitarás
                    contar con un entrenador con la experiencia y
                    conocimientos necesarios que te indique el camino a
                    seguir.
                  </p>
                </li>
                <li>
                  <p>
                    Un entrenador que diseñe un programa completamente
                    individualizado adaptado a tu estilo de vida, que te
                    empuje a mejorar cada día, que te ofrezca un punto de
                    vista objetivo y honesto, que haga los ajustes necesarios
                    con el tiempo para que nunca dejes de progresar y que
                    además te enseñe las herramientas necesarias para poder
                    continuar por tu cuenta en el futuro.
                  </p>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <img class="img-web" src="../img/img-cabecera.png" alt="cabecera" />
          </div>
        </div>
      </div>
    </section>

    <!-- FASE 1 -->
    <section class="container">
      <div class="row align-items-center justify-content-between">
        <h2 class="text-center mb-5">¿CÓMO FUNCIONAN LAS ASESORÍAS?</h2>
        <div class="col-lg-6 col-md-12">
          <div class="card-body">
            <h2 class="text-primary fs-3 mb-3">
              Fase 1: Diseño de los planes
            </h2>
            <p>
              En esta primera fase nos encargaremos de diseñar el programa más
              adecuado para ti.
            </p>
            <p>
              A partir de un cuestionario en el que te haré todo tipo de
              preguntas sobre tu experiencia, objetivos, material disponible,
              estilo de vida, etc. elaboraré un plan de entrenamiento y
              alimentación completamente individualizado que cubrirá, entre
              otras cosas:
            </p>
            <ul>
              <li>
                <p>
                  Rutina de entrenamiento ajustada a tu nivel, objetivos,
                  material disponible, disponibilidad de horarios, posibles
                  molestias o lesiones, etc.
                </p>
              </li>
              <li>
                <p>
                  Sistemas de progresión y periodización de los ejercicios que
                  conforman el programa basados en un sistema de
                  autorregulación, para que puedas progresar de la forma más
                  rápida y efectiva posible.
                </p>
              </li>
              <li>
                <p>
                  Guía nutricional con un enfoque flexible, que te permitirá
                  incluir los alimentos que tú prefieras y ajustar el número
                  de comidas y horarios de acuerdo a tus preferencias.
                </p>
              </li>
              <li>
                <p>
                  Macronutrientes objetivo de cada día junto a una serie de
                  pautas sobre su distribución para maximizar los resultados
                  que deseas lograr.
                </p>
              </li>
              <li>
                <p>
                  Suplementos recomendados. El papel de los suplementos en
                  relación a la alimentación, el entrenamiento y el descanso
                  es casi irrelevante. Sin embargo, cuando se tienen estos
                  aspectos cubiertos sí que pueden ofrecer una pequeña ayuda.
                  Como norma general, el gasto en suplementos de un nuevo
                  cliente se reduce drásticamente cuando empezamos a trabajar
                  juntos.
                </p>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <img class="img-web" src="../img/img-planes.png" alt="planes" />
        </div>
      </div>
    </section>

    <!-- FASE 2 -->
    <section class="container">
      <div class="row align-items-center justify-content-between">
        <div class="col-lg-6 col-md-12 order-md-2">
          <div class="card-body">
            <h2 class="text-primary fs-3 mb-3">Fase 2: Orientación</h2>

            <p>Esta es la parte más importante de las asesorías.</p>
            <p>
              Cada par de semanas haremos una revisión, en la que valoraremos
              tu progreso y llevaremos a cabo los ajustes necesarios en los
              entrenamientos y la alimentación para que sigas avanzando de la
              manera más óptima y eficiente.
            </p>
            <p>Para valorar tu progreso utilizaremos varias herramientas:</p>
            <ul>
              <li>
                <p>Un registro detallado de tus entrenamientos.</p>
              </li>
              <li>
                <p>La evolución de tus medidas corporales.</p>
              </li>
              <li>
                <p>
                  Un diario en el que me darás información detallada sobre tus
                  sensaciones, opiniones, niveles de estrés, calidad y
                  cantidad de sueño, etc.
                </p>
              </li>

              <li>
                <p>Fotos corporales.</p>
              </li>
            </ul>
            <p>
              El objetivo final es que tú mismo/a aprendas las herramientas
              necesarias para que seas capaz de continuar por tu cuenta en el
              futuro.
            </p>
          </div>
        </div>

        <div class="col-lg-6 col-md-12 order-md-1">
          <img class="img-web" src="../img/img-orientacion.png" alt="orientacion" />
        </div>
      </div>
    </section>
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