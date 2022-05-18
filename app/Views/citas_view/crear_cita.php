<?php 

/* Información General Paciente */
$id_paciente       = $datosPaciente[0]['id_paciente'];
$nombre            = $datosPaciente[0]['nombre'];
$apellidos         = $datosPaciente[0]['apellidos'];
$fecha_nacimiento  = $datosPaciente[0]['fecha_nacimiento'];
$genero            = $datosPaciente[0]['genero'];
$telefono          = $datosPaciente[0]['telefono'];

/* Información Tratamiento */
$id_tratamiento   = $datosTratamiento[0]['id_tratamiento'];
$fecha_inicio     = $datosTratamiento[0]['fecha_inicio'];
$fecha_fin        = $datosTratamiento[0]['fecha_fin'];
$tratamiento      = $datosTratamiento[0]['tratamiento'];
$costo            = $datosTratamiento[0]['costo'];
$notas            = $datosTratamiento[0]['notas'];
$estado           = $datosTratamiento[0]['estado'];
$id_paciente      = $datosTratamiento[0]['id_paciente'];
$nombre_paciente  = $datosTratamiento[0]['nombre_paciente'];

$base = 'layouts/base_recepcion';

if (session('rol') == "Admin") {
    $base = 'layouts/base_admin';
} else if(session('rol') == "Doctor") {
    $base = 'layouts/base_doctor';
}

$this->extend($base);

?>

<?= $this->section('page_title'); ?>
Citas View - Crear Registro
<?= $this->endSection(); ?>

<?= $this->section('view_title'); ?>
Citas
<?= $this->endSection(); ?>

<?= $this->section('contenido'); ?>

<link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/citas/citas_view.css">

<?php  for ($i = 0; $i < count($datosTratamiento); $i++) { ?>
                            
    <?php if ($datosTratamiento[$i]['estado'] == "Activo") { ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h6>Nuevo Registro: Citas</h6>
                    <hr class="hr_black_5">
                    <h3 class="font-weight-bold text-center mb-4 mt-4">Información Cita</h3>
                    <form class="d-flex flex-column" method="POST" action="<?php echo base_url(). '/crear_registro_cita' ?> ">
                        
                    <input type="text" hidden="" id="tratamiento_id" name="tratamiento_id" value="<?php echo $id_tratamiento ?>">
                    <input type="text" hidden="" id="paciente_nombre" name="paciente_nombre" value="<?php echo $nombre; echo " "; echo $apellidos; ?>">

                        <div class="d-flex justify-content-between">

                            <div class="d-flex flex-column w-25">
                                <label class="font-weight-bold" for="paciente">Paciente</label>
                                <input disabled value="<?php echo $nombre; echo " "; echo $apellidos; ?>"
                                autocomplete="off" required type="text" name="paciente" id="paciente" class="form-control">
                            </div>

                            <div class="d-flex flex-column ml-3">
                                <label class="font-weight-bold" for="doctor_id">Doctor</label>
                                <select required name="doctor_id" id="doctor_id" class="fit-jala custom-select">
                                    <option disabled value="" selected>Seleccionar</option>
                                    <?php foreach ($datosDoctor as $key) : ?>

                                        <?php if ($key->estado == "Activo") { ?>
                                            <option value="<?php echo $key->id_doctor ?>"><?php echo $key->nombre; echo " "; echo $key->apellidos; ?></option>
                                        <?php } ?>
                                        
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="d-flex flex-column ml-3">
                                <label class="font-weight-bold" for="tratamiento">Tratamiento</label>
                                <select required name="doctor" id="tratamiento" class="fit-jala custom-select">
                                    <option disabled value="" selected>Seleccionar</option>
                                    <?php  for ($i = 0; $i < count($datosTratamiento); $i++) { ?>
                                    
                                        <?php if ($datosTratamiento[$i]['estado'] == "Activo") { ?>
                                            <option value="<?php echo $datosTratamiento[$i]['id_tratamiento'] ?>">
                                                <?php echo $datosTratamiento[$i]['tratamiento']; ?>
                                            </option>
                                        <?php } ?>
                                            
                                    <?php } ?>
                                </select>
                            </div>

                        </div>
                            
                        <div class="d-flex justify-content-between mt-3">
                            <div class="d-flex flex-column">
                                <label class="font-weight-bold" for="estado">Estado</label>
                                <select required name="estado" id="estado" class="fit-jala custom-select">
                                    <option value="Activo" selected>Activo</option>
                                    <option value="Cancelado">Cancelado</option>
                                    <option value="Completado">Completado</option>
                                </select>
                            </div>

                            <div class="d-flex flex-column">
                                <label class="font-weight-bold" for="fecha_cita">Fecha de Cita</label>
                                <input required type="date" min="1900-01-01" name="fecha_cita" class="form-control">
                            </div>

                            <div class="d-flex flex-column">
                                <label class="font-weight-bold" for="hora_cita">Hora de Cita</label>
                                <input required type="time" min="08:00" max="18:00" name="hora_cita" class="form-control">
                            </div>
                        </div>

                        <div class="d-flex mt-3">
                            <div class="d-flex flex-column w-100">
                                <label class="font-weight-bold" for="observaciones">Observaciones</label>
                                <textarea autocomplete="off" style="resize: none;" rows="10" class="form-control" id="observaciones" name="observaciones"></textarea>
                            </div>                 
                        </div>

                        <div class="d-flex flex-column mt-3 w-50">
                            <label class="font-weight-bold" for="firma">Firma</label>
                            <input autocomplete="off" type="text" name="firma" id="firma" class="form-control">
                        </div>

                        <br>
                        <button class="btn btn-primary fit-jala">Guardar
                            <i class="fa-solid fa-floppy-disk ml-2"></i>
                        </button>
                    </form>
                </div>
            </div>
            <hr class="hr_black">
            
        </div>
    <?php break; } else { ?>

        <div class="d-flex flex-column align-items-center">
            <div class="tratamiento_error_green_soft d-flex align-content-center flex-column">
                <h3 class="text-center mt-3 mb-3">Este Paciente cuenta con Tratamientos, pero ninguno <span class="text-success">Activo</span> </h3>
                <h3 class="text-center mt-3 mb-3">Crea un nuevo Tratamiento y vuelve a intentar!</h3>
            </div>

            <div class="d-flex">
                <a href="<?php echo base_url().'/pacientes_view' ?>" class="btn btn-info fit-jala mt-3 mr-3">
                    <i class="fa-solid fa-arrow-left-long"></i>
                    Regresar a Pacientes
                </a>

                <a href="<?php echo base_url().'/tratamientos_view' ?>"  style="background-color: rgb(85,137,196); color: white;" class="btn fit-jala mt-3">
                    Ir a Tratamientos
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
            
        </div>

    <?php break; } ?>
                                
<?php } ?>



<?= $this->endSection(); ?>