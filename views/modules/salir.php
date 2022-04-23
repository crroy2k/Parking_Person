<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Salir</title>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/bootstrap.css">

	<link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" href="assets/css/app.css">
	<link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
	<?php

	if (isset($_SESSION)) {
		if (!$_SESSION["usuarioActivo"]) {
			echo '<script>
                 window.location.href = "error_salir";
              </script>';
			exit();
		}
	} else {
		echo '<script>
                 window.location.href = "error_salir";
              </script>';
		exit();
	}

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
							<h3>Saliste de la aplicacion.</h3>
							<p class="text-subtitle text-muted">Gracias por su visita.</p>
						</div>
						<div class="col-12 col-md-6 order-md-2 order-first">
							<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Inicio</a></li>

								</ol>
								<div class="card-body">
									Iniciar de nuevo la sesion <a href="ingresar"target=_blank">Vamos!</a>
								</div>
							</nav>
						</div>
					</div>
				</div>
				<section class="section">
					<div class="row">
						<div class="col-12">

						</div>
					</div>
				</section>
			</div>
			<?php
			if (isset($_GET["action"]) && isset($_SESSION["user"])) {
				if ($_GET["action"] == "salir") {
					echo '<div class= "alert alert-success flagSalir text-dark mt-2 text-center">"Vuelve pronto ' . $_SESSION["user"] . '"</div>';
					$_SESSION = array("");
					session_destroy();
				}
			}
			?>

			<footer>
				<div class="footer clearfix mb-0 text-muted">
					<div class="float-start">
						<p>2021 &copy; Mazer</p>
					</div>
					<div class="float-end">
						<p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="">Roy & Ale</a></p>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>

	<script src="assets/js/main.js"></script>
</body>


</html>