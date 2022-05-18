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

$tratamiento  = $datos_tratamiento[0]['tratamiento'];


$base = 'layouts/base_recepcion';

if (session('rol') == "Admin") {
    $base = 'layouts/base_admin';
} else if(session('rol') == "Doctor") {
    $base = 'layouts/base_doctor';
}

$this->extend($base);

?>

<?= $this->section('page_title'); ?>
Citas View - Más Información
<?= $this->endSection(); ?>

<?= $this->section('view_title'); ?>
Citas
<?= $this->endSection(); ?>

<?= $this->section('contenido'); ?>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h6>Más Información Registro: Citas</h6>
            <hr class="hr_black_5">
            <h3 class="font-weight-bold text-center mb-4 mt-4">Información Primaria</h3>
            <form class="d-flex flex-column" method="POST" action="<?php echo base_url(). '/crear_registro_cita' ?> ">

                        <div class="d-flex justify-content-between">

                            <div class="d-flex flex-column w-25">
                                <label class="font-weight-bold" for="paciente">Paciente</label>
                                <input disabled value="<?php echo $nombre_paciente; ?>"
                                autocomplete="off" required type="text" name="paciente" id="paciente" class="form-control">
                            </div>

                            <div class="d-flex flex-column ml-3">
                                <label class="font-weight-bold" for="doctor_id">Doctor</label>
                                <select disabled required name="doctor_id" id="doctor_id" class="fit-jala custom-select">
                                    <option value=""><?php echo $nombre_doctor; ?></option>
                                </select>
                            </div>

                            <div class="d-flex flex-column ml-3">
                                <label class="font-weight-bold" for="tratamiento">Tratamiento</label>
                                <select disabled required name="doctor" id="tratamiento" class="fit-jala custom-select">
                                    <option disabled value="" selected><?php echo $tratamiento ?></option>
                                </select>
                            </div>

                        </div>
                            
                        <div class="d-flex justify-content-between mt-3">
                            <div class="d-flex flex-column">
                                <label class="font-weight-bold" for="estado">Estado</label>
                                <select disabled required name="estado" id="estado" class="fit-jala custom-select">
                                    <option disabled value="Activo" selected><?php echo $estado ?></option>
                                </select>
                            </div>

                            <div class="d-flex flex-column">
                                <label class="font-weight-bold" for="fecha_cita">Fecha de Cita</label>
                                <input disabled value="<?php echo $fecha_cita ?>" required type="date" min="1900-01-01" name="fecha_cita" class="form-control">
                            </div>

                            <div class="d-flex flex-column">
                                <label class="font-weight-bold" for="hora_cita">Hora de Cita</label>
                                <input disabled value="<?php echo $hora ?>" required type="time" min="08:00" max="18:00" name="hora_cita" class="form-control">
                            </div>
                        </div>

                        <div class="d-flex mt-3">
                            <div class="d-flex flex-column w-100">
                                <label class="font-weight-bold" for="observaciones">Observaciones</label>
                                <textarea disabled autocomplete="off" style="resize: none;" rows="10" class="form-control" id="observaciones" name="observaciones"><?php echo $observaciones; ?></textarea>
                            </div>                 
                        </div>

                        <div class="d-flex flex-column mt-3 w-50">
                            <label class="font-weight-bold" for="firma">Firma</label>
                            <input disabled value="<?php echo $firma ?>" autocomplete="off" type="text" name="firma" id="firma" class="form-control">
                        </div>

                        <br>
                        <a href="<?php echo base_url().'/citas_view' ?>" class="btn btn-info fit-jala">
                            <i class="fa-solid fa-arrow-left-long"></i>
                            Atras
                        </a>
                    </form>
        </div>
    </div>
    <hr class="hr_black">
    
</div>


<?= $this->endSection(); ?>