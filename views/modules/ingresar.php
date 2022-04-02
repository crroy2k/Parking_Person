<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ingreasar</title>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" href="css/app.css">
	<link rel="stylesheet" href="css/pages/auth.css">
</head>

<body>

	<div style=" margin-left: 200px">
		<div id="auth">
			<div class="row h-100">
				<div class="col-lg-5 col-12">
					<div id="auth-left">
						<div class="auth-logo">
							<a href="index.html"><img src="images/logo/logo.png" alt="Logo"></a>
						</div>
						<h1 class="auth-title">Ingresar.</h1>
						<p class="auth-subtitle mb-5">Ingrese con sus credenciales.</p>
						<form method="post">
							<form action="index.html">
								<div class="form-group position-relative has-icon-left mb-4">
									<input type="text" class="form-control form-control-xl" placeholder="Nombre" name="nombre" required>
									<div class="form-control-icon">
										<i class="bi bi-person"></i>
									</div>
								</div>
								<div class="form-group position-relative has-icon-left mb-4">
									<input type="password" class="form-control form-control-xl" placeholder="Password" name="password" required>
									<div class="form-control-icon">
										<i class="bi bi-shield-lock"></i>
									</div>
								</div>

								<button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Iniciar sesion.</button>
							</form>
						</form>
						<div class="text-center mt-5 text-lg fs-4">
							<p class="text-gray-600">Sin una cuenta? <a href="registro" class="font-bold">Registrarse</a>.</p>


						</div>
					</div>
				</div>
				<div class="col-lg-7 d-none d-lg-block">
					<div id="auth-right">

					</div>
				</div>
			</div>
		</div>
	</div>

	<?php

	$ingresar = new MvcController();
	$ingresar->ingresarUsuarioController();

	if (isset($_GET["action"])) {
		if ($_GET["action"] == "registro_ok") {
			echo '<div class="alert alert-success">Usuario registrado correctamente</div>';
		} else if ($_GET["action"] == "ingresar_error") {
			echo '<div class="alert alert-danger">Ocurrio un error, debe de ingresar primero.</div>';
		} else if ($_GET["action"] == "error_salir") {
			echo '<div class="alert alert-danger">
                 <h4 class="alert-heading">Danger</h4>
                 <p>This is a danger alert.</p>
             </div>';
		} else if ($_GET["action"] == "ingresar_error_invalido") {
			echo '<div class="alert alert-danger ">Error al ingresar, su usuario o contraseña no cumple con los requerimientos minimos (Usuarios: letras, numeros y guiones. Contraseña: Minimo 8 caracteres, una letra y un numero.)</div>';
		} else if ($_GET["action"] == "ingresar_error_bacio") {
			echo '<div class="alert alert-danger">Error al ingresar, debe de ingresar un usuario y una contraseña</div>';
		}
	}
	?>
</body>

</html>