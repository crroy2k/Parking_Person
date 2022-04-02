<?php

require_once "conexion.php";

class Datos extends Conexion
{

    public static function registroUsuarioModel($datos, $tabla)
    {
        $stnt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, password, email) VALUES (:nombre, :password, :email)");
        $stnt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stnt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stnt->bindParam(":email", $datos["email"], PDO::PARAM_STR);

        if ($stnt->execute()) {
            return "success";
        } else {
            $stnt->errorInfo();
        }
    }


    #Cargar usuarios

    public static function vistaUsuariosModel($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT id, nombre, email FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function borrarUsuarioModel($datos, $tabla)
    {
        $stnt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stnt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stnt->execute()) {
            return "success";
        } else {
            return $stnt->errorInfo();
        }
    }

    public static function editarUsuarioModel($datos, $tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT id, nombre, email FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function actualizarUsuarioModel($datos, $tabla)
    {
        $stnt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, email = :email WHERE id = :id");
        $stnt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stnt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stnt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stnt->bindParam(":email", $datos["email"], PDO::PARAM_STR);

        if ($stnt->execute()) {
            return "success";
        } else {
            $stnt->errorInfo();
        }
    }

    public static function ingresarUsuarioModel($datos, $tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT nombre, password FROM $tabla WHERE nombre = :nombre");
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function validarUsuariosModel($datos)
    {
        $stmt = Conexion::conectar()->prepare("SELECT count(nombre) FROM usuarios WHERE nombre = :nombre");
        $stmt->bindParam(":nombre", $datos, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    #######################################################################################################################################################################################################################

    public static function registroParqueoModel($datos, $tabla)
    {
        $stnt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, placas, telefono) VALUES (:usuario, :placas, :telefono)");
        $stnt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stnt->bindParam(":placas", $datos["placas"], PDO::PARAM_STR);
        $stnt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);




        if ($stnt->execute()) {
            return "success";
        } else {
            $stnt->errorInfo();
        }
    }

    public static function vistaParqueoModel($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT id, usuario, placas, telefono FROM $tabla WHERE activo = 1");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public static function salidaParqueoModel($datos, $tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT id, usuario, placas, telefono FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

   

    public static function horaSalidaModel($datos, $tabla){
        $stnt = Conexion::conectar()->prepare("INSERT INTO $tabla (h_salida) VALUES(:h_salida) WHERE id = id");
        $stnt->bindParam(":id", $datos, PDO::PARAM_INT);
        $stnt->bindParam(":h_salida",$datos["h_salida"], PDO::PARAM_STR);
        if ($stnt->execute()) {
            $respuesta= "success";
        } else {
            $stnt->errorInfo();
        }
    }
    public static function traerHEntradaModel($datos)
    {

        $stmt = Conexion::conectar()->prepare("SELECT h_entrada FROM parqueo WHERE id = :id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

 public static function inactivarUsuarioModel($h_salida, $id) {

        ini_set('date.timezone', 'America/Costa_Rica');
        $stnt = Conexion::conectar()->prepare("UPDATE parqueo SET activo = 0, h_salida = '$h_salida'  WHERE id = :id");
        $stnt->bindParam(":id", $id, PDO::PARAM_INT);
      
        if ($stnt->execute()) {
            return "success";
        } else {
            $stnt->errorInfo();
        }
    }

   


 }




