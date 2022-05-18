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

    <div class="tratamiento_error d-flex align-content-center flex-column">
        <h3 class="text-center mt-3 mb-3">No se encontraron Tratamientos de este Paciente para poder crear una cita:(</h3>
        <h3 class="text-center mt-3 mb-3">Asigna un Tratamiento y vuelve a intentar!</h3>
    </div>

<?= $this->endSection(); ?>