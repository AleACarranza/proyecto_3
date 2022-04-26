<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    Pacientes
    <div class="container">
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Género</th>
                    <th>Fecha Nacimiento</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nombre</td>
                    <td>Apellidos</td>
                    <td>Género</td>
                    <td>Fecha Nacimiento</td>
                    <td>Teléfono</td>   
                    <td>Más información</td>
                    <td>Editar</td>
                    <td>Borrar</td>
                    <td>Nueva Cita</td>

                </tr>
            </tbody>
        </table>
    </div>
=======
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

    <h3>Estamos en pacientes, ponte buso</h3>
    <p>porfi chequen lo que hacen:c</p>

<?= $this->endSection(); ?>
</html>