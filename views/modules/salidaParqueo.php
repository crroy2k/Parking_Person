<?php

if (isset($_SESSION)) {
    if (!$_SESSION["usuarioActivo"]) {
        header("location:ingresar_error");
        exit();
    } else {
    }
}

?>



<div style=" margin-left: 320px">
    <h1>Salida de parqueo</h1>

    <div class="d-flex justify-content-center text-center">
        <form method="post" class="p-5 bg-light">

            <?php

            $salida = new MvcController();
            $salida->salidaParqueoController();

            if(isset($_POST["usuario"])) {
                $h_salida = $_POST["h_salida"];
                $id = $_POST["id"];
                $respuesta = $salida->inactivarUsuarioController($h_salida, $id);
            }

            // $confirmarSalida = new MvcController();
            // $confirmarSalida->registroParqueoController();
            

            if (isset($_GET["action"])) {
                if ($_GET["action"] == "salidaParqueo&id") {
                    echo '<div class="alert alert-danger flagDelete text-dark mt-2 text-center"Accion Invalida</div>';
                }
            }
            ?>
           
        </form>
    </div>
</div>