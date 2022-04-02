<?php
$usuarios = new MvcController();

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



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="css/app.css">

</head>




<body>

    <div style="margin-left: 320px">
        <div id="app">
            <div class="auth-logo">
                <a href=""><img src="images/logo/logo.png" alt="Logo"></a>
            </div>
            <h1 class="auth-title">Registro de usuario.</h1>
            <p class="auth-subtitle mb-5">Ingrese sus datos para el registro.</p>

            <form method="post">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" placeholder="Usuario" name="usuario" id="usuario" required>
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>


                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" placeholder="Placa" name="placas" id="placas" required>
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>


                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" placeholder="Telefono" name="telefono" id="telefono" required>
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Agregar vehiculo</button>

                <?php
                $registro = new MvcController();
                $registro->registroParqueoController();
                ?>
            </form>
        </div>
    </div>



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
                            <h3>Usarios actuales.</h3>
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
                                        <th>Placas</th>
                                        <th>Telefono</th>
                                        <th>Salida</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    $usuarios->vistaParkingController();
                                   
                                    ?>

                                </tbody>
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