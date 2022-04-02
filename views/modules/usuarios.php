<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Usuarios</title>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="vendors/simple-datatables/style.css">

	<link rel="stylesheet" href="vendors/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" href="vendors/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" href="css/app.css">
	<link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon">
</head>

<body>

	<?php

	if (isset($_SESSION)) {
		if (!$_SESSION["usuarioActivo"]) {
			echo '<script>
                window.location.href = "ingresar_error";
              </script>';
			exit();
		}
	} else {
		echo '<script>
	            window.location.href = "ingresar_error";
	          </script>';
		exit();
	}

	$usuarios = new MvcController();

	?>



	<div id="app">

		<div id="main">
			<header class="mb-3">
				<a href="#" class="burger-btn d-block d-xl-none">
					<i class="bi bi-justify fs-3"></i>
				</a>
			</header>

			<div class="page-heading">
				<div class="page-title">
					<div class="row">
						<div class="col-12 col-md-6 order-md-1 order-last">
							<h3>Tabla de datos.</h3>
							<p class="text-subtitle text-muted">Para los usuarios.</p>
						</div>
						<div class="col-12 col-md-6 order-md-2 order-first">
							<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">

							</nav>
						</div>
					</div>
				</div>
				<section class="section">
					<div class="card">
						<div class="card-header">
							Usuarios
						</div>
						<div>
							<table class="table table-striped" id="h1Users">
								<thead>
									<tr>
										<th>Usuario</th>
										<th>Contraseña</th>
										<th>Email</th>
										<th>Editar</th>
										<th>Eliminar</th>
									</tr>
								</thead>

								<tbody>

									<?php
									$usuarios->vistaUsuariosController();
									?>

								</tbody>
							</table>
							</table>
						</div>
					</div>

				</section>
			</div>
			<footer>
				<div class="footer clearfix mb-0 text-muted">
					<div class="float-start">
						<p>2021 &copy; Mazer</p>
					</div>
					<div class="float-end">
						<p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="https://www.instagram.com/urena_r17/?hl=es-la">Roy</a></p>
					</div>
				</div>
			</footer>
		</div>
	</div>
</body>

<?php

$usuarios->borrarUsuarioController();

if (isset($_GET["action"]) && isset($_SESSION["user"])) {
	if ($_GET["action"] == "ingresar_ok") {
		echo '<div class="alert alert-success flagShowUser text-dark mt-2 text-center">"Bienvenido, ' . $_SESSION["user"] . '"</div>';
	}
}

if (isset($_GET["action"])) {
	if ($_GET["action"] == "eliminado_ok") {
		echo '<div class="alert alert-success flagDelete text-dark mt-2 text-center">Usuario eliminado correctamente</div>';
	} else if ($_GET["action"] == "eliminado_error") {
		echo '<div class="alert alert-danger flagDelete text-dark mt-2 text-center">Ocurrio un error al eliminar</div>';
	} else if ($_GET["action"] == "eliminarIdUsuario_error_invalido") {
		echo '<div class="alert alert-danger flagDelete text-dark mt-2 text-center">Ocurrio una invalidacion al eliminar</div>';
	} else if ($_GET["action"] == "eliminarIdUsuario_error_vacio") {
		echo '<div class="alert alert-danger flagDelete text-dark mt-2 text-center">Ocurrio una error fatal al eliminar</div>';
	}
}

if (isset($_GET["action"])) {
	if ($_GET["action"] == "actualizado_ok") {
		echo '<div class="alert alert-success flagUpdate text-dark mt-2 text-center">Usuario actualizado correctamente</div>';
	} else if ($_GET["action"] == "actualizado_error") {
		echo '<div class="alert alert-danger flagUpdate text-dark mt-2 text-center">Ocurrio un error al actualizar</div>';
	} else if ($_GET["action"] == "obtenerIdUpdate_error_invalido") {
		echo '<div class="alert alert-danger flagUpdate text-dark mt-2 text-center">Ocurrio una invalidacion al obtener el usuario para actualizar</div>';
	} else if ($_GET["action"] == "obtenerIdUpdate_error_vacio") {
		echo '<div class="alert alert-danger flagUpdate text-dark mt-2 text-center">Ocurrio una invalidacion al obtener el usuario para actualizar</div>';
	}
}
?>

<script src="vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<script src="vendors/simple-datatables/simple-datatables.js"></script>
<script>
	// Simple Datatable
	let table1 = document.querySelector('h1Users');
	let dataTable = new simpleDatatables.DataTable(table1);
</script>

<script src="js/main.js"></script>
</body>
</html>