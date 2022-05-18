<?php 

/* Información Cita */
$id_cita          = $datos[0]['id_cita'];
$fecha_cita       = $datos[0]['fecha_cita'];
$hora             = $datos[0]['hora'];
$observaciones    = $datos[0]['observaciones'];
$estado           = $datos[0]['estado'];
$firma            = $datos[0]['firma'];
$nombre_doctor    = $datos[0]['nombre_doctor'];
$nombre_paciente  = $datos[0]['nombre_paciente'];
$id_doctorCita    = $datos[0]['id_doctor'];
$id_tratamiento   = $datos[0]['id_tratamiento2'];

$tratamiento      = $datos_tratamiento[0]['tratamiento'];

/* Colocar el "selected" en donde corresponda, ya sea si su estado es activo o inactivo*/
$activoS = "";
$canceladoS = "";
$completadoS = "";

if ($estado == "Activo") {
    $activoS = 'selected';
} elseif ($estado == "Cancelado") {
    $canceladoS = 'selected';
} elseif ($estado == "Completado") {
    $completadoS = 'selected';
}

$base = 'layouts/base_recepcion';

if (session('rol') == "Admin") {
    $base = 'layouts/base_admin';
} else if(session('rol') == "Doctor") {
    $base = 'layouts/base_doctor';
}

$this->extend($base);

?>

<?= $this->section('page_title'); ?>
Citas View - Editar
<?= $this->endSection(); ?>

<?= $this->section('view_title'); ?>
Citas
<?= $this->endSection(); ?>

<?= $this->section('contenido'); ?>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h4>Editar Registro: Citas</h4>
            <hr class="hr_black_5">
            <form class="d-flex flex-column" method="POST" action="<?php echo base_url(). '/update_cita_info' ?> ">

                    <input type="text" hidden="" id="cita_id" name="cita_id" value="<?php echo $id_cita ?>">
                    <input type="text" hidden="" id="tratamiento_id" name="tratamiento_id" value="<?php echo $id_tratamiento ?>">
                    <input type="text" hidden="" id="paciente_nombre" name="paciente_nombre" value="<?php echo $nombre_paciente; ?>">

                        <div class="d-flex justify-content-between">

                            <div class="d-flex flex-column w-25">
                                <label class="font-weight-bold" for="paciente">Paciente</label>
                                <input disabled value="<?php echo $nombre_paciente; ?>"
                                autocomplete="off" required type="text" name="paciente" id="paciente" class="form-control">
                            </div>

                            <div class="d-flex flex-column ml-3">
                                <label class="font-weight-bold" for="doctor_id">Doctor</label>
                                <select required name="doctor_id" id="doctor_id" class="fit-jala custom-select">
                                    <?php foreach ($datosDoctor as $key) : ?>
                            
                                        <?php if ($key->estado == "Activo") { ?>
                                            <option 
                                            <?php $doctorSelected = $id_doctorCita == $key->id_doctor ? "selected" : ""; echo $doctorSelected; ?>
                                            value="<?php echo $key->id_doctor ?>"><?php echo $key->nombre; echo " "; echo $key->apellidos; ?></option>
                                        <?php } ?>
                                        
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="d-flex flex-column ml-3">
                                <label class="font-weight-bold" for="tratamiento">Tratamiento</label>
                                <select required name="doctor" id="tratamiento" class="fit-jala custom-select">
                                    <option value="<?php echo $tratamiento ?>" selected><?php echo $tratamiento ?></option>
                                </select>
                            </div>

                        </div>
                            
                        <div class="d-flex justify-content-between mt-3">
                            <div class="d-flex flex-column">
                                <label class="font-weight-bold" for="estado">Estado</label>
                                <select required name="estado" id="estado" class="fit-jala custom-select">
                                    <option value="Activo"   <?php echo $activoS;   ?> >Activo</option>
					                <option value="Cancelado" <?php echo $canceladoS; ?> >Cancelado</option>
					                <option value="Completado" <?php echo $completadoS; ?> >Completado</option>
                                </select>
                            </div>

                            <div class="d-flex flex-column">
                                <label class="font-weight-bold" for="fecha_cita">Fecha de Cita</label>
                                <input value="<?php echo $fecha_cita ?>" required type="date" min="1900-01-01" name="fecha_cita" class="form-control">
                            </div>

                            <div class="d-flex flex-column">
                                <label class="font-weight-bold" for="hora_cita">Hora de Cita</label>
                                <input value="<?php echo $hora ?>" required type="time" min="08:00" max="18:00" name="hora_cita" class="form-control">
                            </div>
                        </div>

                        <div class="d-flex mt-3">
                            <div class="d-flex flex-column w-100">
                                <label class="font-weight-bold" for="observaciones">Observaciones</label>
                                <textarea autocomplete="off" style="resize: none;" rows="10" class="form-control" id="observaciones" name="observaciones"><?php echo $observaciones; ?></textarea>
                            </div>                 
                        </div>

                        <div class="d-flex flex-column mt-3 w-50">
                            <label class="font-weight-bold" for="firma">Firma</label>
                            <input value="<?php echo $firma ?>" autocomplete="off" type="text" name="firma" id="firma" class="form-control">
                        </div>

                        <br>
                        <button class="btn btn-warning fit-jala" style="color: white;">Actualizar
                            <i class="fa-solid fa-floppy-disk ml-2"></i>
                        </button>
                    </form>
        </div>
    </div>
    <hr class="hr_black">
    
</div>


<?= $this->endSection(); ?>