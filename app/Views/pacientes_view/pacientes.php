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