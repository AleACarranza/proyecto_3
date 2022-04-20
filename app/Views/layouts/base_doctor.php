<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/bootstrap/bootstrap.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/menu_nav.css">

  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <title><?= $this->renderSection('page_title') ?></title>
</head>

<body>

  <br>
  <div class="d-flex justify-content-between align-items-center ml-3 mr-3">
    <div class="d-flex align-items-center">
      <img class="img-small" src="public\img\icono_salud_bajio_dental.jpg" alt="LogoClinica">

      <h2 class="font-coolvetica ml-2 font-weight-bold">Salud Bajio Dental</h2>
    </div>

    <h2><?= $this->renderSection('view_title') ?></h2>

    <ul class="nav justify-content-end">
      <li class="nav-item h1 ml-3">
        <a class="btn btn-outline-dark" href="<?php echo base_url() . '/pacientes_view'; ?>">Pacientes</a>
      </li>
      <li class="nav-item h1 ml-3">
        <a class="btn btn-outline-dark" href="<?php echo base_url() . '/citas_view'; ?>">Citas</a>
      </li>
      <li class="nav-item h1 ml-3">
        <a class="btn btn-outline-dark" href="#">Tratamientos</a>
      </li>
    </ul>
  </div>


  <?= $this->renderSection('contenido') ?>

  <div class="d-flex justify-content-end align-items-center mr-3">
    <h5 class="mb-0">Bienvenido <?php echo session('usuario') ?>, Su rol es: <span class="
    <?php if (session('rol') == 'Admin') {
      echo 'text-danger';
    } ?>
    
    <?php if (session('rol') == 'Recepción') {
      echo 'text-success';
    } ?>

    <?php if (session('rol') == 'Doctor') {
      echo 'text-primary';
    } ?>

    "><?php echo session('rol') ?></span> </h5>
    <ul class="nav-item h1 ml-3 mr-0 p-0">
      <a class="btn btn-outline-danger" href="<?php echo base_url('/cerrar_sesion') ?>">Cerrar Sesión</a>
    </ul>
  </div>

  <script src="<?php echo base_url(); ?>/public/js/jquery-3.6.0.min.js"></script>
  <script src="<?php echo base_url(); ?>/public/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>/public/js/bootstrap/bootstrap.js"></script>
  <script src="https://kit.fontawesome.com/cf56801d52.js" crossorigin="anonymous"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>