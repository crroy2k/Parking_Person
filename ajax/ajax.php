<?php
require_once "../controllers/controller.php";
require_once "../models/crud.php";

class Ajax
{
    public $validar_usuario;

    public function validarUsuarioAjax()
    {
        $datos = $this->validar_usuario;

        $respuesta = MvcController::validarUsuarioController($datos);
        //$respuesta="Success";

        echo $respuesta;
    }
}

if (isset($_POST["nombre"])) {

    $a = new Ajax();
    $a->validar_usuario = $_POST["nombre"];
    $a->validarUsuarioAjax();
}