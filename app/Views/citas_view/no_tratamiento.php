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
Citas View
<?= $this->endSection(); ?>

<?= $this->section('view_title'); ?>
Citas
<?= $this->endSection(); ?>

<?= $this->section('contenido'); ?>

    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/citas/citas_view.css">

    <div class="d-flex flex-column align-items-center">
            <div class="tratamiento_error d-flex align-content-center flex-column">
                <h3 class="text-center mt-3 mb-3">No se encontraron Tratamientos de este Paciente para poder crear una cita:(</h3>
                <h3 class="text-center mt-3 mb-3">Asigna un Tratamiento y vuelve a intentar!</h3>
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

<?= $this->endSection(); ?>