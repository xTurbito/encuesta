<?php

$url_base = "http://localhost/encuesta/";
?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="http://localhost/encuesta/layout/style.css">
  <!-- SWEETALERT -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
  <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
</head>

<body>
  <header>
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container justify-content-center ">
      <a class="navbar-brand" href="#">Encuestador</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse flex-grow-0 " id="navbarNavDropdown">
        <ul class="navbar-nav text-center">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo $url_base ?>" class="nav__link">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_base ?>/modulos/misencuestas/">Mis Encuestas</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Secciones
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Ver Secciones</a></li>
              <li><a class="dropdown-item" href="<?php echo $url_base ?>/modulos/jefas"">Jefas de Secciones</a></li>
            </ul>
          </li>
          <li class=" nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Manzanas
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php echo $url_base ?>/modulos/manzanas"">Ver Manzanas</a></li>
                    <li><a class="dropdown-item" href="<?php echo $url_base ?>/modulos/Manzaneras">Jefas de Manzana</a></li>
            </ul>
          </li>
                    <li class=" nav-item">
                        <a class="nav-link" href="<?php echo $url_base ?>/modulos/Partidos">Partidos</a>
                    </li>
                    <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_base ?>/modulos/encuestadoras/">Encuestadoras</a>
          </li>

      </div>
    </div>
  </nav>
  </header>
  <main class="container">


