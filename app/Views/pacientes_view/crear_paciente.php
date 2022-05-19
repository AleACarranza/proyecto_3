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
Pacientes View - Crear Registro
<?= $this->endSection(); ?>

<?= $this->section('view_title'); ?>
Pacientes
<i class="fa-solid fa-user-pen fa-sm"></i>
<?= $this->endSection(); ?>

<?= $this->section('contenido'); ?>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h4>Nuevo Registro: Pacientes</h4>
            <hr class="hr_black_5">
            <h3 class="font-weight-bold text-center mb-4 mt-4">Información Primaria</h3>
            <form class="d-flex flex-column" method="POST" action="<?php echo base_url(). '/crear_registro_paciente' ?> ">
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
                        <input required type="date" min="1900-01-01" name="fecha_nacimiento" class="form-control">
                    </div>
                </div>

                <div class="d-flex mt-3">
                    <div class="d-flex flex-column">
                        <label class="font-weight-bold" for="telefono">Teléfono</label>
                        <input autocomplete="off" required type="tel" name="telefono" minlength="10" maxlength="10" id="telefono" class="form-control">
                    </div>
                </div>

                <h3 class="font-weight-bold text-center mb-4 mt-4">Información General</h3>

                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <label class="font-weight-bold" for="peso">Peso (en kg)</label>
                        <input min="0" type="number" name="peso" id="peso" class="form-control">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="talla">Talla</label>
                        <input min="0" type="number" step="0.01" name="talla" id="talla" class="form-control">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="presion">Presión Arterial</label>
                        <input type="number" min="0" name="presion" id="presion" class="form-control">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="glucosa">Glucosa</label>
                        <input type="number" min="0" name="glucosa" id="glucosa" class="form-control">
                    </div>
                    
                </div>

                <div class="d-flex justify-content-between mt-3">
                    
                    <div class="d-flex flex-column">
                        <label class="font-weight-bold" for="medio">Medio</label>
                        <input autocomplete="off" minlength="0" maxlength="50" type="text" name="medio" id="medio" class="form-control">
                    </div>

                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="correo">Correo</label>
                        <input autocomplete="off" minlength="0" maxlength="100" type="email" name="correo" id="correo" class="form-control">
                    </div>

                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="telefono2">Teléfono 2</label>
                        <input autocomplete="off" type="tel" name="telefono2" minlength="10" maxlength="10" id="telefono2" class="form-control">
                    </div>

                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="fecha_ingreso">Fecha de Ingreso</label>
                        <input type="date" min="1900-01-01" name="fecha_ingreso" class="form-control">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="fecha_vencimiento">Fecha de Vencimiento</label>
                        <input type="date" min="1900-01-01" name="fecha_vencimiento" class="form-control">
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