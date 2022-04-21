<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<header>
    Salud Bajío Dental
</header>
</head>
<body>
    <h1>Pacientes</h1>
    <section>
        <h2>Nombre</h2>
        <p>Manuel Bello Olivares</p>
    </section>

    
</body>
</html>
<?php 

$base = 'layouts/base_recepcion';

if (session('rol') == "Admin") {
    $base = 'layouts/base_admin';
} else if(session('rol') == "Doctor") {
    $base = 'layouts/base_doctor';
}

$this->extend($base);


?>


<?= $this->section('page_title'); ?>
Pacientes View
<?= $this->endSection(); ?>

<?= $this->section('view_title'); ?>
Pacientes
<?= $this->endSection(); ?>

<?= $this->section('contenido'); ?>

    <h3>Ho l A</h3>

<?= $this->endSection(); ?>
</html>