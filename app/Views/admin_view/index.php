
<div class="container">
    <div class="row">
        <div class="col-sm-12 ">
            <form class="d-flex flex-column" method="POST" action="<?php echo base_url(). '/crearNuevoUsuario' ?> ">
                <label class="font-weight-bold" for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario" class="form-control">

                <label class="font-weight-bold" for="rol">Rol</label>
                <select name="rol" id="rol" class="fit-jala custom-select">
                    <option value="Admin" selected>Admin</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Recepción">Recepción</option>
                </select>

                <label class="font-weight-bold" for="contrasena">Contraseña</label>
                <input type="password" name="contrasena" id="contrasena" class="form-control">

                <label class="font-weight-bold" for="estado">Estado</label>
                <select name="estado" id="estado" class="fit-jala custom-select">
                    <option value="Activo" selected>Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>

                <br>
                <button class="btn btn-primary fit-jala">Guardar</button>
            </form>
        </div>
    </div>
    <hr class="hr_black">
    
    <div class="row">
        <div class="col-sm-12">
            <div class="table table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Usuario</th>
                            <th>Rol</th>
                            <th>Contraseña</th>
                            <th>Estado</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($datos as $key): ?>
                            <tr>
                                <td><?php echo $key->usuario ?> </td>
                                <td><?php echo $key->rol     ?> </td>
                                <td>**********</td>
                                <td class="<?php $color = $key->estado == "Activo" ? "text-success" : "text-danger"; echo $color; ?>"><?php echo $key->estado ?></td>
                                <td>
                                    <a href="<?php echo base_url(). '/obtenerIdUsuario/'.$key->id_usuario  ?>" class="btn btn-warning btn-sm text-white">Editar</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(). '/eliminarUsuario/'.$key->id_usuario  ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                </table>
            </div> 
        </div>
    </div>
</div>

<div class="d-flex justify-content-end align-items-center mr-3">
    <h5 class="mb-0">Bienvenido <?php echo session('usuario') ?>, Su rol es: <span class="
    <?php if (session('rol') == 'Admin') {
        echo 'text-danger';
    }?>
    
    <?php if (session('rol') == 'Recepción') {
        echo 'text-success';
    }?>

    <?php if (session('rol') == 'Doctor') {
        echo 'text-primary';
    }?>

    "><?php echo session('rol') ?></span> </h5>
    <ul class="nav-item h1 ml-3 mr-0 p-0">
        <a class="btn btn-outline-danger" href="<?php echo base_url('/cerrar_sesion') ?>">Cerrar Sesión</a>
    </ul>
</div>