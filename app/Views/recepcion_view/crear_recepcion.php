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
Recepción View - Crear Registro
<?= $this->endSection(); ?>

<?= $this->section('view_title'); ?>
Recepción
<i class="fa-solid fa-bell-concierge"></i>
<?= $this->endSection(); ?>

<?= $this->section('contenido'); ?>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h4>Nuevo Registro: Recepción</h4>
            <hr class="hr_black_5">
            <h3 class="font-weight-bold text-center mb-4 mt-4">Información Primaria</h3>
            <form class="d-flex flex-column" method="POST" action="<?php echo base_url(). '/crearNuevoRegistroRecepcion' ?> ">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column w-100">
                        <label class="font-weight-bold" for="nombre">Nombre(s)</label>
                        <input autocomplete="off" required type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                    <div class="d-flex flex-column w-100 ml-3">
                        <label class="font-weight-bold" for="apellidos">Apellido(s)</label>
                        <input autocomplete="off" required type="text" name="apellidos" id="apellidos" class="form-control">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="genero">Género</label>
                        <select name="genero" id="genero" class="fit-jala custom-select">
                            <option selected disabled>Seleccionar</option>
                            <option value="M">M</option>
                            <option value="F">F</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input required type="date" name="fecha_nacimiento" class="form-control">
                    </div>
                </div>

                <div class="d-flex mt-3">
                    <div class="d-flex flex-column">
                        <label class="font-weight-bold" for="telefono">Teléfono</label>
                        <input autocomplete="off" required type="tel" name="telefono" minlength="10" maxlength="10" id="telefono" class="form-control">
                    </div>
                    <div class="d-flex flex-column w-50 ml-3">
                        <label class="font-weight-bold" for="correo">Correo</label>
                        <input autocomplete="off" required type="email" name="correo" id="correo" class="form-control">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="estado">Estado</label>
                        <select required name="estado" id="estado" class="fit-jala custom-select">
                            <option value="Activo" selected>Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>

                <h3 class="font-weight-bold text-center mb-4 mt-4">Información Domiciliar</h3>

                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column w-75">
                        <label class="font-weight-bold" for="calle">Calle</label>
                        <input autocomplete="off" required type="text" name="calle" id="calle" class="form-control">
                    </div>
                    <div class="d-flex flex-column w-75 ml-3">
                        <label class="font-weight-bold" for="colonia">Colonia</label>
                        <input autocomplete="off" required type="text" name="colonia" id="colonia" class="form-control">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="numint">N° Interior</label>
                        <input type="number" name="numint" id="numint" class="form-control">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="numext">N° Exterior</label>
                        <input type="number" name="numext" id="numext" class="form-control">
                    </div>
                    
                </div>

                <div class="d-flex mt-3">
                    
                    <div class="d-flex flex-column w-25">
                        <label class="font-weight-bold" for="estadoRepublica">Estado</label>
                        <input autocomplete="off" required type="text" name="estadoRepublica" id="estadoRepublica" class="form-control">
                    </div>

                    <div class="d-flex flex-column w-25 ml-3">
                        <label class="font-weight-bold" for="cuidad">Cuidad</label>
                        <input autocomplete="off" required type="text" name="cuidad" id="cuidad" class="form-control">
                    </div>

                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="cp">Código Postal</label>
                        <input required type="number" name="cp" id="cp" class="form-control">
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