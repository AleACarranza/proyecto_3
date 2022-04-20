<?php

	$idUsuario   = $datos[0]['id_usuario'];
	$usuario     = $datos[0]['usuario'];
	$contrasena  = $datos[0]['contrasena'];
	$rol         = $datos[0]['rol'];
	$estado      = $datos[0]['estado'];

	$adminS = "";
	$doctorS = "";
	$recepcionS = "";
	if ($rol == "Admin") {
		$adminS = 'selected';
	} else if ($rol == "Doctor") {
		$doctorS = 'selected';
	} elseif ($rol == "Recepción") {
		$recepcionS = "selected";
	}

	$activoS = "";
	$inactivoS = "";

	if ($estado == "Activo") {
		$activoS = 'selected';
	} elseif ($estado == "Inactivo") {
		$inactivoS = 'selected';
	}

?>

<!doctype html>
<html lang="en">
  <head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/bootstrap/bootstrap.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/menu_nav.css">

	<title><?php echo $titulo ?></title>
  </head>
<body>

<br>

<div class="d-flex justify-content-between align-items-center ml-3 mr-3">

  <div class="d-flex align-items-center">
    <img class="img-small" src="<?php echo base_url(); ?>/public/img/icono_salud_bajio_dental.jpg" alt="LogoClinica">
    <h2 class="font-coolvetica ml-2 font-weight-bold">Salud Bajio Dental</h2>
  </div>

  <h2>Usuarios y Roles</h2>

  <ul class="nav justify-content-end">
    <li class="nav-item h1">
      <a class="btn btn-outline-dark" href="<?php echo base_url() . '/recepcion_view'; ?>">Recepción</a>
    </li>
    <li class="nav-item h1 ml-3">
      <a class="btn btn-outline-dark" href="<?php echo base_url().'/admin_view'; ?>">Usuarios y Roles</a>
    </li>
    <li class="nav-item h1 ml-3">
      <a class="btn btn-outline-dark" href="<?php echo base_url().'/pacientes_view'; ?>">Pacientes</a>
    </li>
    <li class="nav-item h1 ml-3">
      <a class="btn btn-outline-dark" href=""<?php echo base_url().'/citas_view'; ?>"">Citas</a>
    </li>
    <li class="nav-item h1 ml-3">
      <a class="btn btn-outline-dark" href="#">Tratamientos</a>
    </li>
    <li class="nav-item h1 ml-3">
      <a class="btn btn-outline-dark" href="#">Dentistas</a>
    </li>
  </ul>
</div>
<br>

<div class="container">
	<div class="">
		<div class="col-sm-12 ">
			<form class="d-flex flex-column" method="POST" action="<?php echo base_url().'/actualizarUsuario' ?>">
				<input type="text" name="idUsuario" id="idUsuario" hidden=""
				value="<?php echo $idUsuario ?>">    

				<label class="font-weight-bold" for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" class="form-control"
				value="<?php echo $usuario ?>">

				<label class="font-weight-bold" for="rol">Rol</label>
                <select name="rol" id="rol" class="fit-jala custom-select">
                    <option value="Admin"     <?php echo $adminS;     ?> >Admin</option>
                    <option value="Doctor"    <?php echo $doctorS;    ?> >Doctor</option>
                    <option value="Recepción" <?php echo $recepcionS; ?> >Recepción</option>
					
                </select>

				<label class="font-weight-bold" for="contrasena">Contraseña</label> 
				<input type="password" name="contrasena" id="contrasena" class="form-control" required="">

				<label class="font-weight-bold" for="estado">Estado</label>
				<select name="estado" id="estado" class="fit-jala custom-select">
					<option value="Activo"   <?php echo $activoS;   ?> >Activo</option>
					<option value="Inactivo" <?php echo $inactivoS; ?> >Inactivo</option>
				</select>
				<br>
				<button class="btn btn-success fit-jala">Actualizar</button>
			</form>
		</div>
	</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="<?php echo base_url(); ?>/public/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/bootstrap/bootstrap.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
</html>