<?php 

/* Información General Doctor */
$id_doctor         = $datos[0]['id_doctor'];
$nombre            = $datos[0]['nombre'];
$apellidos         = $datos[0]['apellidos'];
$fecha_nacimiento  = $datos[0]['fecha_nacimiento'];
$genero            = $datos[0]['genero'];
$correo            = $datos[0]['correo'];
$telefono          = $datos[0]['telefono'];
$estado            = $datos[0]['estado'];

/* Información Domiciliar Doctor */

$id_domDoctor         = $datos_dom[0]['id_domDoctor'];
$calle                = $datos_dom[0]['calle'];
$numExt               = $datos_dom[0]['numExt'];
$numInt               = $datos_dom[0]['numInt'];
$colonia              = $datos_dom[0]['colonia'];
$cp                   = $datos_dom[0]['cp'];
$cuidad               = $datos_dom[0]['cuidad'];
$estadoRepublica      = $datos_dom[0]['estado'];

/* Colocar el "selected" en donde corresponda, ya sea si su estado es activo o inactivo*/
$activoS = "";
$inactivoS = "";

if ($estado == "Activo") {
    $activoS = 'selected';
} elseif ($estado == "Inactivo") {
    $inactivoS = 'selected';
}

/* Colocar el "selected" en donde corresponda, ya sea si su genero es M,F u Otro*/
$masculinoS = "";
$femeninoS = "";
$otroS = "";

if ($genero == "M") {
    $masculinoS = 'selected';
} elseif ($genero == "F") {
    $femeninoS = 'selected';
} elseif ($genero == "Otro") {
    $otroS = 'selected';
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
Doctores View - Actualizar Registro
<?= $this->endSection(); ?>

<?= $this->section('view_title'); ?>
Doctores
<?= $this->endSection(); ?>

<?= $this->section('contenido'); ?>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h6>Actualizar Registro: Doctores</h6>
            <hr class="hr_black_5">
            <h3 class="font-weight-bold text-center mb-4 mt-4">Información Primaria</h3>
            <form class="d-flex flex-column" method="POST" action="<?php echo base_url(). '/update_doctor_info' ?> ">
                
                <div class="d-flex justify-content-between">

                    <input type="text" name="idDoctor" id="idDoctor" hidden=""
                    value="<?php echo $id_doctor ?>">
                    <input type="text" name="idDoctorDom" id="idDoctorDom" hidden=""
                    value="<?php echo $id_domDoctor ?>">

                    <div class="d-flex flex-column w-100">
                        <label class="font-weight-bold" for="nombre">Nombre(s)</label>
                        <input autocomplete="off" required type="text" name="nombre" id="nombre" class="form-control"
                        value="<?php echo $nombre ?>" >
                    </div>
                    <div class="d-flex flex-column w-100 ml-3">
                        <label class="font-weight-bold" for="apellidos">Apellido(s)</label>
                        <input autocomplete="off" required type="text" name="apellidos" id="apellidos" class="form-control"
                        value="<?php echo $apellidos ?>">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="genero">Género</label>
                        <select name="genero" id="genero" class="fit-jala custom-select">
                            <option selected disabled>Seleccionar</option>
                            <option value="M"    <?php echo $masculinoS ?>  >M</option>
                            <option value="F"    <?php echo $femeninoS  ?>  >F</option>
                            <option value="Otro" <?php echo $otroS      ?>  >Otro</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input required type="date" name="fecha_nacimiento" class="form-control"
                        value="<?php echo $fecha_nacimiento ?>">
                    </div>
                </div>

                <div class="d-flex mt-3">
                    <div class="d-flex flex-column">
                        <label class="font-weight-bold" for="telefono">Teléfono</label>
                        <input autocomplete="off" required type="tel" name="telefono" minlength="10" maxlength="10" id="telefono" class="form-control"
                        value="<?php echo $telefono ?>">
                    </div>
                    <div class="d-flex flex-column w-50 ml-3">
                        <label class="font-weight-bold" for="correo">Correo</label>
                        <input autocomplete="off" required type="email" name="correo" id="correo" class="form-control"
                        value="<?php echo $correo ?>">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="estado">Estado</label>
                        <select required name="estado" id="estado" class="fit-jala custom-select">
                            <option value="Activo"   <?php echo $activoS;   ?> >Activo</option>
					        <option value="Inactivo" <?php echo $inactivoS; ?> >Inactivo</option>
                        </select>
                    </div>
                </div>

                <h3 class="font-weight-bold text-center mb-4 mt-4">Información Domiciliar</h3>

                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column w-75">
                        <label class="font-weight-bold" for="calle">Calle</label>
                        <input autocomplete="off" required type="text" name="calle" id="calle" class="form-control"
                        value="<?php echo $calle ?>">
                    </div>
                    <div class="d-flex flex-column w-75 ml-3">
                        <label class="font-weight-bold" for="colonia">Colonia</label>
                        <input autocomplete="off" required type="text" name="colonia" id="colonia" class="form-control"
                        value="<?php echo $colonia ?>">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="numint">N° Interior</label>
                        <input type="number" name="numint" id="numint" class="form-control"
                        value="<?php echo $numExt ?>">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="numext">N° Exterior</label>
                        <input type="number" name="numext" id="numext" class="form-control"
                        value="<?php echo $numInt ?>">
                    </div>
                    
                </div>

                <div class="d-flex mt-3">
                    
                    <div class="d-flex flex-column w-25">
                        <label class="font-weight-bold" for="estadoRepublica">Estado</label>
                        <input autocomplete="off" required type="text" name="estadoRepublica" id="estadoRepublica" class="form-control"
                        value="<?php echo $estadoRepublica ?>">
                    </div>

                    <div class="d-flex flex-column w-25 ml-3">
                        <label class="font-weight-bold" for="cuidad">Cuidad</label>
                        <input autocomplete="off" required type="text" name="cuidad" id="cuidad" class="form-control"
                        value="<?php echo $cuidad ?>">
                    </div>

                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="cp">Código Postal</label>
                        <input required type="number" name="cp" id="cp" class="form-control"
                        value="<?php echo $cp ?>">
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