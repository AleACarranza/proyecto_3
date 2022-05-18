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
Tratamientos View
<?= $this->endSection(); ?>

<?= $this->section('view_title'); ?>
Tratamientos
<?= $this->endSection(); ?>

<?= $this->section('contenido'); ?>

<link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/tratamientos/tratamientos_view.css">

<div class="container_tratamientos">
    <hr class="hr_black">
    <div class="d-flex justify-content-end align-items-center mb-2">
        <a href="<?php echo base_url() . '/view_crear_tratamiento' ?>" class="btn btn-success ">Añadir Nuevo Registro
            <i class="fa-solid fa-circle-plus fa-lg fa-beat ml-2" style="--fa-animation-duration: 5s;"></i>
        </a>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="table table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Paciente</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de Fin</th>
                            <th>Tratamiento</th>
                            <th>Estado</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                        <?php foreach ($datos as $key) : ?>
                            <tr>
                                <td><?php echo $key->nombre_paciente ?></td>
                                <td><?php echo $key->fecha_inicio ?></td>
                                <td><?php echo $key->fecha_fin ?></td>
                                <td><?php echo $key->tratamiento ?></td>
                                <td class="<?php 
                                            $color = "text-success";
                                            if ($key->estado == "Cancelado") {
                                                $color = "text-danger";
                                            } elseif ($key->estado == "Completado") {
                                                $color = "text-info";
                                            }
                                            
                                            echo $color; ?>"><?php echo $key->estado ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'/view_mas_informacion_tratamiento/'. $key->id_tratamiento ?>" class="btn btn-info btn-sm text-white">Más Información
                                    <i class="fa-solid fa-circle-info fa-lg"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'/view_editar_tratamiento/'. $key->id_tratamiento ?>" class="btn btn-warning btn-sm text-white">Editar
                                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'/eliminar_tratamiento/'. $key->id_tratamiento ?>" class="btn btn-danger btn-sm">Eliminar
                                        <i class="fa-solid fa-circle-minus fa-lg"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;  ?>
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