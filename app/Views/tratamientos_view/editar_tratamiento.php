<?php 

/* Información Tratamiento */
$id_tratamiento   = $datos[0]['id_tratamiento'];
$fecha_inicio     = $datos[0]['fecha_inicio'];
$fecha_fin        = $datos[0]['fecha_fin'];
$tratamiento      = $datos[0]['tratamiento'];
$costo            = $datos[0]['costo'];
$notas            = $datos[0]['notas'];
$estado           = $datos[0]['estado'];
$id_paciente      = $datos[0]['id_paciente'];
$nombre_paciente  = $datos[0]['nombre_paciente'];
$url_radiografia  = $datosR[0]['url_radiografia'];

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
Tratamiento View - Más Información
<?= $this->endSection(); ?>

<?= $this->section('view_title'); ?>
Tratamiento
<i class="fa-solid fa-tooth"></i>
<?= $this->endSection(); ?>

<?= $this->section('contenido'); ?>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h4>Editar: Tratamientos</h4>
            <hr class="hr_black_5">
            <form class="d-flex flex-column" enctype ="multipart/form-data" method="POST" action="<?php echo base_url(). '/actualizar_tratamiento' ?> ">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column w-50">
                        
                        <input type="text" name="id_tratamiento" id="id_tratamiento" hidden=""
                        value="<?php echo $id_tratamiento ?>">

                        <input type="text" name="nombrepaciente" id="nombrepaciente" hidden=""
                        value="<?php echo $nombre_paciente ?>">

                        <label class="font-weight-bold" for="paciente">Paciente</label>
                        <select  required name="paciente" id="paciente" class="custom-select">
                            <option value="<?php echo $id_paciente ?>"><?php echo $nombre_paciente ?></option>
                        </select>
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="fecha_inicio">Fecha de Inicio</label>
                        <input value="<?php echo $fecha_inicio ?>" required type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="fecha_fin">Fecha de Fin</label>
                        <input value="<?php echo $fecha_fin ?>" required type="date" name="fecha_fin" id="fecha_fin" class="form-control">
                    </div>
                </div>

                <div class="d-flex mt-3 justify-content-between">
                    <div class="d-flex flex-column">
                        <label class="font-weight-bold" for="costo">Costo</label>
                        <input value="<?php echo $costo ?>" autocomplete="off" required type="number" name="costo" minlength="10" maxlength="10" id="costo" class="form-control">
                    </div>
                    <div class="d-flex flex-column w-50 ml-3">
                        <label class="font-weight-bold" for="tratamiento">Tratamiento</label>
                            <select  required name="tratamiento" id="tratamiento" class="custom-select">
                                <option value="<?php echo $tratamiento ?>"><?php echo $tratamiento ?></option>
                            </select>
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="estado">Estado</label>
                        <select required name="estado" id="estado" class="fit-jala custom-select">
                            <option value="Activo"   <?php echo $activoS;   ?> >Activo</option>
					        <option value="Cancelado" <?php echo $canceladoS; ?> >Cancelado</option>
					        <option value="Completado" <?php echo $completadoS; ?> >Completado</option>
                        </select>
                    </div>
                </div>


                <div class="d-flex mt-3">
                    <div class="d-flex flex-column w-100">
                        <label class="font-weight-bold" for="notas">Notas</label>
                        <textarea autocomplete="off" style="resize: none;" rows="10" required class="form-control" id="notas" name="notas"><?php echo $notas; ?></textarea>
                    </div>                 
                </div>

                <div class="d-flex mt-3 mb-5">
                    <div class="d-flex flex-column w-100">
                        <h4>Radiografias</h4>
                        <img class="" src="<?php echo base_url(); ?>/public/uploads/<?php echo $url_radiografia?>" alt="radiografia">
                    </div>
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