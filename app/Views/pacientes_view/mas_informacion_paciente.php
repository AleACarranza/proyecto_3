<?php 

/* Información General Paciente */
$id_paciente       = $datos[0]['id_paciente'];
$nombre            = $datos[0]['nombre'];
$apellidos         = $datos[0]['apellidos'];
$fecha_nacimiento  = $datos[0]['fecha_nacimiento'];
$genero            = $datos[0]['genero'];
$telefono          = $datos[0]['telefono'];

/* Información Domiciliar Paciente */

$id_domPaciente       = $datos_dom[0]['id_domPaciente'];
$calle                = $datos_dom[0]['calle'];
$numExt               = $datos_dom[0]['numExt'];
$numInt               = $datos_dom[0]['numInt'];
$colonia              = $datos_dom[0]['colonia'];
$cp                   = $datos_dom[0]['cp'];
$cuidad               = $datos_dom[0]['cuidad'];
$estadoRepublica      = $datos_dom[0]['estado'];

/* Información General Paciente */

$id_datosGenerales    = $datos_generales[0]['id_datosGenerales'];
$telefono2            = $datos_generales[0]['telefono2'];
$medio                = $datos_generales[0]['medio'];
$fecha_ingreso        = $datos_generales[0]['fecha_ingreso'];
$fecha_vencimiento    = $datos_generales[0]['fecha_vencimiento'];
$correo               = $datos_generales[0]['correo'];
$peso                 = $datos_generales[0]['peso'];
$talla                = $datos_generales[0]['talla'];
$presion              = $datos_generales[0]['presion'];
$glucosa              = $datos_generales[0]['glucosa'];


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
Pacientes View - Más Información
<?= $this->endSection(); ?>

<?= $this->section('view_title'); ?>
Pacientes
<?= $this->endSection(); ?>

<?= $this->section('contenido'); ?>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h6>Más Información Registro: Pacientes</h6>
            <hr class="hr_black_5">
            <h3 class="font-weight-bold text-center mb-4 mt-4">Información Primaria</h3>
            <form class="d-flex flex-column" method="POST" action="<?php echo base_url(). '/pacientes_view' ?> ">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column w-100">
                        <label class="font-weight-bold" for="nombre">Nombre(s)</label>
                        <input disabled value="<?php echo $nombre ?>" type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                    <div class="d-flex flex-column w-100 ml-3">
                        <label class="font-weight-bold" for="apellidos">Apellido(s)</label>
                        <input disabled value="<?php echo $apellidos ?>" type="text" name="apellidos" id="apellidos" class="form-control">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="genero">Género</label>
                        <select disabled name="genero" id="genero" class="fit-jala custom-select">
                            <option selected disabled>Seleccionar</option>
                            <option value="M"    <?php echo $masculinoS ?>  >M</option>
                            <option value="F"    <?php echo $femeninoS  ?>  >F</option>
                            <option value="Otro" <?php echo $otroS      ?>  >Otro</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input disabled value="<?php echo $fecha_nacimiento ?>" type="date" min="1900-01-01" name="fecha_nacimiento" class="form-control">
                    </div>
                </div>

                <div class="d-flex mt-3">
                    <div class="d-flex flex-column">
                        <label class="font-weight-bold" for="telefono">Teléfono</label>
                        <input disabled value="<?php echo $telefono ?>" type="tel" name="telefono" minlength="10" maxlength="10" id="telefono" class="form-control">
                    </div>
                </div>

                <h3 class="font-weight-bold text-center mb-4 mt-4">Información General</h3>

                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <label class="font-weight-bold" for="peso">Peso (en kg)</label>
                        <input disabled value="<?php echo $peso ?>" min="0" type="number" name="peso" id="peso" class="form-control">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="talla">Talla</label>
                        <input disabled value="<?php echo $talla ?>" min="0" type="number" step="0.01" name="talla" id="talla" class="form-control">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="presion">Presión Arterial</label>
                        <input disabled value="<?php echo $presion ?>" type="number" min="0" name="presion" id="presion" class="form-control">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="glucosa">Glucosa</label>
                        <input disabled value="<?php echo $glucosa ?>" type="number" min="0" name="glucosa" id="glucosa" class="form-control">
                    </div>
                    
                </div>

                <div class="d-flex justify-content-between mt-3">
                    
                    <div class="d-flex flex-column">
                        <label class="font-weight-bold" for="medio">Medio</label>
                        <input disabled value="<?php echo $medio ?>" minlength="0" maxlength="50" type="text" name="medio" id="medio" class="form-control">
                    </div>

                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="correo">Correo</label>
                        <input disabled value="<?php echo $correo ?>" minlength="0" maxlength="100" type="email" name="correo" id="correo" class="form-control">
                    </div>

                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="telefono2">Teléfono 2</label>
                        <input disabled value="<?php echo $telefono2 ?>" type="tel" name="telefono2" minlength="10" maxlength="10" id="telefono2" class="form-control">
                    </div>

                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="fecha_ingreso">Fecha de Ingreso</label>
                        <input disabled value="<?php echo $fecha_ingreso ?>" type="date" min="1900-01-01" name="fecha_ingreso" class="form-control">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="fecha_vencimiento">Fecha de Vencimiento</label>
                        <input disabled value="<?php echo $fecha_vencimiento ?>" type="date" min="1900-01-01" name="fecha_vencimiento" class="form-control">
                    </div>
                    
                </div>

                <h3 class="font-weight-bold text-center mb-4 mt-4">Información Domiciliar</h3>

                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column w-75">
                        <label class="font-weight-bold" for="calle">Calle</label>
                        <input disabled value="<?php echo $calle ?>" type="text" name="calle" id="calle" class="form-control">
                    </div>
                    <div class="d-flex flex-column w-75 ml-3">
                        <label class="font-weight-bold" for="colonia">Colonia</label>
                        <input disabled value="<?php echo $colonia ?>" type="text" name="colonia" id="colonia" class="form-control">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="numint">N° Interior</label>
                        <input disabled value="<?php echo $numInt ?>" type="number" name="numint" id="numint" class="form-control">
                    </div>
                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="numext">N° Exterior</label>
                        <input disabled value="<?php echo $numExt ?>" type="number" name="numext" id="numext" class="form-control">
                    </div>
                    
                </div>

                <div class="d-flex mt-3">
                    
                    <div class="d-flex flex-column w-25">
                        <label class="font-weight-bold" for="estadoRepublica">Estado</label>
                        <input disabled value="<?php echo $estadoRepublica ?>" type="text" name="estadoRepublica" id="estadoRepublica" class="form-control">
                    </div>

                    <div class="d-flex flex-column w-25 ml-3">
                        <label class="font-weight-bold" for="cuidad">Cuidad</label>
                        <input disabled value="<?php echo $cuidad ?>"  type="text" name="cuidad" id="cuidad" class="form-control">
                    </div>

                    <div class="d-flex flex-column ml-3">
                        <label class="font-weight-bold" for="cp">Código Postal</label>
                        <input disabled value="<?php echo $cp ?>" type="number" name="cp" id="cp" class="form-control">
                    </div>

                </div>

                <br>
                <a href="<?php echo base_url().'/pacientes_view' ?>" class="btn btn-info fit-jala">
                    <i class="fa-solid fa-arrow-left-long"></i>
                    Atras
                </a>
            </form>
        </div>
    </div>
    <hr class="hr_black">
    
</div>


<?= $this->endSection(); ?>