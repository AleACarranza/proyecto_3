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
Tratamientos View - Crear Registro
<?= $this->endSection(); ?>

<?= $this->section('view_title'); ?>
Tratamientos
<i class="fa-solid fa-tooth"></i>
<?= $this->endSection(); ?>

<?= $this->section('contenido'); ?>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h4>Nuevo Registro: Tratamientos</h4>
            <hr class="hr_black_5">
            <form class="d-flex flex-column" enctype ="multipart/form-data" method="POST" action="<?php echo base_url(). '/crearTratamiento' ?> ">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column w-50">

                        <label class="font-weight-bold" for="paciente">Paciente</label>
                        <select  required name="paciente" id="paciente" class="custom-select">
                            <option selected disabled>Seleccionar</option>
                            <?php foreach($datos as $key): ?>
                                <option value="<?php echo $key->id_paciente ?>"><?php echo $key->nombre; ?> <?php echo $key->apellidos ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="fecha_inicio">Fecha de Inicio</label>
                        <input required type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="fecha_fin">Fecha de Fin</label>
                        <input required type="date" name="fecha_fin" id="fecha_fin" class="form-control">
                    </div>
                </div>

                <div class="d-flex mt-3 justify-content-between">
                    <div class="d-flex flex-column">
                        <label class="font-weight-bold" for="costo">Costo</label>
                        <input autocomplete="off" type="number" name="costo" min="0" id="costo" class="form-control">
                    </div>
                    <div class="d-flex flex-column w-50 ml-3">
                        <label class="font-weight-bold" for="tratamiento">Tratamiento</label>
                            <select  required name="tratamiento" id="tratamiento" class="custom-select">
                                <option selected disabled>Seleccionar</option>
                                <option value="Blanqueamiento"     >Blanqueamiento</option>
                                <option value="Ortodoncia"         >Ortodoncia</option>
                                <option value="Endodoncias"        >Endodoncias</option>
                                <option value="Ciruguia"           >Ciruguia</option>
                                <option value="Prótesis Fija"      >Prótesis Fija</option>
                                <option value="Prótesis Removible" >Prótesis Removible</option>
                                <option value="Rehabilitación"     >Rehabilitación</option>
                            </select>
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="estado">Estado</label>
                        <select required name="estado" id="estado" class="fit-jala custom-select">
                            <option value="Activo" selected>Activo</option>
                            <option value="Cancelado">Cancelado</option>
                            <option value="Completado">Completado</option>
                        </select>
                    </div>
                </div>


                <div class="d-flex mt-3">
                    <div class="d-flex flex-column w-100">
                        <label class="font-weight-bold" for="notas">Notas</label>
                        <textarea autocomplete="off" style="resize: none;" rows="10" class="form-control" id="notas" name="notas"></textarea>
                    </div>                 
                </div>

                <div class="d-flex mt-3 mb-5">
                    <div class="d-flex flex-column w-100">
                        <h4>Radiografias</h4>
                        <div class="form-group">
                            <label for="radiografia"></label>
                            <input required type="file" class="form-control" name="radiografia" id="radiografia">
                        </div>
                    </div>
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


<?= $this->endSection(); ?>