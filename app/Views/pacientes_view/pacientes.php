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
<i class="fa-solid fa-user-pen fa-sm"></i>
<?= $this->endSection(); ?>

<?= $this->section('contenido'); ?>

<link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/pacientes/pacientes.css">

<div class="container_pacientes">
    <hr class="hr_black">
    <div class="d-flex justify-content-end align-items-center mb-2">
        <a href="<?php echo base_url() . '/view_crear_paciente' ?>" class="btn btn-success ">Añadir Nuevo Registro
            <i class="fa-solid fa-circle-plus fa-lg fa-beat ml-2" style="--fa-animation-duration: 5s;"></i>
        </a>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="table table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre(s)</th>
                            <th>Apellidos</th>
                            <th>Género</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Teléfono</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                        <?php foreach ($datos as $key) : ?>
                            <tr>
                                <td><?php echo $key->nombre ?></td>
                                <td><?php echo $key->apellidos ?></td>
                                <td><?php echo $key->genero ?></td>
                                <td><?php echo $key->fecha_nacimiento ?></td>
                                <td><?php echo $key->telefono ?></td>
                                <td>
                                    <a href="<?php echo base_url().'/view_mas_informacion_paciente/' . $key->id_paciente  ?>" class="btn btn-info btn-sm text-white">Más Información
                                    <i class="fa-solid fa-circle-info fa-lg"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'/view_actualizar_paciente/' . $key->id_paciente ?>" class="btn btn-warning btn-sm text-white">Editar
                                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'/eliminar_paciente/' . $key->id_paciente ?>" class="btn btn-danger btn-sm">Eliminar
                                        <i class="fa-solid fa-circle-minus fa-lg"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'/view_crear_cita/' . $key->id_paciente ?>" class="btn btn-sm" style="background-color: rgb(165, 80, 232); color: rgb(255, 255, 255)">Nueva Cita
                                        <i class="fa-solid fa-calendar-plus fa-lg"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
      let mensaje = '<?php echo $mensaje ?>'
      if (mensaje == '1') {
        swal('Completado', 'Agregado exitosamente!', 'success')
      } else if(mensaje == '0'){
        swal('Hay un error', 'No se pudo agregar', 'error')
      }

      if (mensaje == '2') {
        swal('Completado', 'Registro actualizado exitosamente!', 'success')
      } else if(mensaje == '3'){
        swal('Hay un error', 'El registro no se pudo actualizar', 'error')
      }

      if (mensaje == '4') {
        swal('Completado', 'Eliminado exitosamente!', 'success')
      } else if(mensaje == '5'){
        swal('Hay un error', 'No se pudo eliminar', 'error')
      }

</script>

<?= $this->endSection(); ?>
</html>