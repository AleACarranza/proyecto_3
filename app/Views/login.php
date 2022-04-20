<?= $this->extend('layouts/base_login'); ?>

<?= $this->section('titulo'); ?>
Log In
<?= $this->endSection(); ?>

<?= $this->section('contenido'); ?>

    <div class="login-box">
      <img src="<?php echo base_url(); ?>/public/img/icono_salud_bajio_dental.jpg" class="avatar" alt="Avatar Image">
      <h1>Login Salud Bajío Dental</h1>
      <form action="<?php echo base_url('/login') ?>" method="POST">
        <!-- USERNAME INPUT -->
        <label for="usuario">Usuario</label>
        <input autocomplete="off" type="text" name="usuario" placeholder="Ingresar Usuario" class="form-control" required="">
        <!-- PASSWORD INPUT -->
        <label for="password">Contraseña</label>
        <input autocomplete="off" type="password" name="password" placeholder="Ingresar Contraseña" class="form-control" required="">
        <input type="submit" value="Ingresar">
      </form>
    </div>

    
<?= $this->endSection(); ?>