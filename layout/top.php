<?php

$url_base = "http://localhost/encuesta/";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS -->
  <link rel="stylesheet" href="http://localhost/encuesta/layout/style.css">
  <link rel="stylesheet" href="http://localhost/encuesta/Assets/tables.css">
  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- SWEETALERT -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--=============== REMIXICONS ===============-->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

  <title>Encuesta</title>
</head>

<body>
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
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_base ?>/modulos/jefas">Jefa de Secciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_base ?>/modulos/Manzaneras">Manzaneras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $url_base ?>/modulos/Partidos">Partidos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown link
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>

      </div>
    </div>
  </nav>