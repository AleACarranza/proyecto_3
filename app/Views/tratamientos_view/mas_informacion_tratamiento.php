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
$inactivoS = "";

if ($estado == "Activo") {
    $activoS = 'selected';
} elseif ($estado == "Inactivo") {
    $inactivoS = 'selected';
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
            <h4>Más Información: Tratamientos</h4>
            <hr class="hr_black_5">
            <form class="d-flex flex-column" enctype ="multipart/form-data" method="POST" action="<?php echo base_url(). '/crearTratamiento' ?> ">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column w-50">
                        
                        <input type="text" name="nombrepaciente" id="nombrepaciente" hidden=""
                        value="<?php echo $nombre_paciente ?>">

                        <label class="font-weight-bold" for="paciente">Paciente</label>
                        <select  required name="paciente" id="paciente" class="custom-select">
                            <option value="<?php echo $id_paciente ?>"><?php echo $nombre_paciente ?></option>
                        </select>
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="fecha_inicio">Fecha de Inicio</label>
                        <input disabled value="<?php echo $fecha_inicio ?>" required type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="fecha_fin">Fecha de Fin</label>
                        <input disabled value="<?php echo $fecha_fin ?>" required type="date" name="fecha_fin" id="fecha_fin" class="form-control">
                    </div>
                </div>

                <div class="d-flex mt-3 justify-content-between">
                    <div class="d-flex flex-column">
                        <label class="font-weight-bold" for="costo">Costo</label>
                        <input disabled value="<?php echo $costo ?>" autocomplete="off" required type="number" name="costo" minlength="10" maxlength="10" id="costo" class="form-control">
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
                            <option value="" ><?php echo $estado; ?></option>
                        </select>
                    </div>
                </div>


                <div class="d-flex mt-3">
                    <div class="d-flex flex-column w-100">
                        <label class="font-weight-bold" for="notas">Notas</label>
                        <textarea disabled autocomplete="off" style="resize: none;" rows="10" required class="form-control" id="notas" name="notas"><?php echo $notas; ?></textarea>
                    </div>                 
                </div>

                <div class="d-flex mt-3 mb-5">
                    <div class="d-flex flex-column w-100">
                        <h4>Radiografias</h4>
                        <img class="" src="<?php echo base_url(); ?>/public/uploads/<?php echo $url_radiografia?>" alt="radiografia">
                    </div>
                </div>

                <br>
                <a href="<?php echo base_url().'/tratamientos_view' ?>" class="btn btn-info fit-jala">
                    <i class="fa-solid fa-arrow-left-long"></i>
                    Atras
                </a>
            </form>
        </div>
    </div>
    <hr class="hr_black">
    
</div>


<?= $this->endSection(); ?>