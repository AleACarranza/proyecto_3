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
Recepción View
<?= $this->endSection(); ?>

<?= $this->section('view_title'); ?>
Recepción
<?= $this->endSection(); ?>

<?= $this->section('contenido'); ?>

    <h3>Ho l A</h3>

<?= $this->endSection(); ?>