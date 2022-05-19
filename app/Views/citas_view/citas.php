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
Citas View
<?= $this->endSection(); ?>

<?= $this->section('view_title'); ?>
Citas
<i class="fa-solid fa-calendar-check"></i>
<?= $this->endSection(); ?>

<?= $this->section('contenido'); ?>

<div class="container">
    <hr class="hr_black">
    <div class="row mt-4">
        <div class="col-sm-12">
            <div class="table table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Paciente</th>
                            <th>Doctor</th>
                            <th>Fecha Cita</th>
                            <th>Hora</th>
                            <th>Estado</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                        <?php 
                        
                        $arrayDecode = json_decode(json_encode($datos), true);

                        $nuevoArreglo = [

                        ];

                        for ($i = 0; $i < count($arrayDecode); $i++) {
                            if ($arrayDecode[$i]['estado'] == "Activo") {
                                $nuevoArreglo[] = $arrayDecode[$i];
                            }
                        }

                        for ($i = 0; $i < count($arrayDecode); $i++) {
                            if ($arrayDecode[$i]['estado'] == "Completado") {
                                $nuevoArreglo[] = $arrayDecode[$i];
                            }
                        }

                        for ($i = 0; $i < count($arrayDecode); $i++) {
                            if ($arrayDecode[$i]['estado'] == "Cancelado") {
                                $nuevoArreglo[] = $arrayDecode[$i];
                            }
                        }
                        
                        
                        
                        ?>
                        <?php foreach ($nuevoArreglo as $key) : ?>
                            <tr>
                                <td><?php echo $key['nombre_paciente'] ?></td>
                                <td><?php echo $key['nombre_doctor'] ?></td>
                                <td><?php echo $key['fecha_cita'] ?></td>
                                <td><?php echo substr($key['hora'], 0, 5);
                                        
                                    ?>
                                </td>
                                <td class="<?php 
                                            $color = "text-success";
                                            if ($key['estado'] == "Cancelado") {
                                                $color = "text-danger";
                                            } elseif ($key['estado'] == "Completado") {
                                                $color = "text-info";
                                            }
                                            
                                            echo $color; ?>"><?php echo $key['estado'] ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'/view_mas_informacion_cita/' . $key['id_cita'] ?>" class="btn btn-info btn-sm text-white">Más Información
                                    <i class="fa-solid fa-circle-info fa-lg"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'/view_editar_cita/' . $key['id_cita'] ?>" class="btn btn-warning btn-sm text-white">Editar
                                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'/eliminar_cita/' . $key['id_cita'] ?>" class="btn btn-danger btn-sm">Eliminar
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