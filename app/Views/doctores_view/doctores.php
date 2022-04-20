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
Doctores View
<?= $this->endSection(); ?>

<?= $this->section('view_title'); ?>
Doctores
<?= $this->endSection(); ?>

<?= $this->section('contenido'); ?>

    <h3>Estamos en Doctores, ponte buso</h3>

<?= $this->endSection(); ?>