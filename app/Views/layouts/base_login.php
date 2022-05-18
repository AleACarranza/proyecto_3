<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/bootstrap/bootstrap.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/login/login.css">

    <title><?= $this->renderSection('titulo') ?></title>
  </head>
  <body>


    <?= $this->renderSection('contenido') ?>


    <script src="<?php echo base_url(); ?>/public/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/bootstrap/bootstrap.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
      
      let mensaje = '<?php echo $mensaje ?>'
      if (mensaje == '0') {
        swal('Hay un error', 'Las credenciales son invalidas', 'error')
      }

    </script>

  </body>
</html>