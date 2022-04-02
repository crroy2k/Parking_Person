<?php

if (isset($_SESSION)) {
	if (!$_SESSION["usuarioActivo"]) {
		header("location:ingresar_error");
		exit();
	} else {
	}
}

?>
<div style=" margin-left: 250px">
	<h1>EDITAR USUARIO</h1>

	<div class="d-flex justify-content-center text-center">
		<form method="post" class="p-5 bg-light">

			<?php

			$editar = new MvcController();
			$editar->editarUsuarioController();
			$editar->actualizarUsuarioController();

			if (isset($_GET["action"])) {
				if ($_GET["action"] == "editar&idEditar") {
					echo '<div class="alert alert-danger flagDelete text-dark mt-2 text-center">Invalidacion durante la actualizacion</div>';
				} else if ($_GET["action"] == "actualizado_error_vacio") {
					echo '<div class="alert alert-danger flagDelete text-dark mt-2 text-center">Error fatal durante la actualizacion</div>';
				}
			}

			?>

		</form>
	</div>
</div>