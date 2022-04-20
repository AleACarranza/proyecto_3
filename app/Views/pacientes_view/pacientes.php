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
Pacientes View
<?= $this->endSection(); ?>

<?= $this->section('view_title'); ?>
Pacientes
<?= $this->endSection(); ?>

<?= $this->section('contenido'); ?>

    <h3>Estamos en pacientes, ponte buso</h3>

<?= $this->endSection(); ?>