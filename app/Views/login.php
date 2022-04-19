<?= $this->extend('layouts/layout'); ?>



<?= $this->section('titulo'); ?>
Log In
<?= $this->endSection(); ?>

<?= $this->section('contenido'); ?>

    <div class="login-box">
      <img src="<?php echo base_url(); ?>/public/img/icono_salud_bajio_dental.jpg" class="avatar" alt="Avatar Image">
      <h1>Login Salud Bajío Dental</h1>
      <form>
        <!-- USERNAME INPUT -->
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" placeholder="Ingresar Usuario" class="form-control">
        <!-- PASSWORD INPUT -->
        <label for="contrasena">Password</label>
        <input type="password" id="contrasena" placeholder="Ingresar Contraseña" class="form-control">
        <input type="submit" value="Ingresar">
      </form>
    </div>

<?= $this->endSection(); ?>