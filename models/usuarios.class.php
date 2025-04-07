<?php
require_once __DIR__ . "/sistema.class.php";

class Usuario extends Sistema
{
    public function getUsuarios()
    {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUsuario($id) {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function registrar ($datos) {
        $datos->password = password_hash($datos->password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, apellidos, username, correo, password) VALUES (?, ?, ?, ?, ?);");
        $stmt->bindParam(1, $datos->nombre, PDO::PARAM_STR);
        $stmt->bindParam(2, $datos->apellidos, PDO::PARAM_STR);
        $stmt->bindParam(3, $datos->username, PDO::PARAM_STR);
        $stmt->bindParam(4, $datos->correo, PDO::PARAM_STR);
        $stmt->bindParam(5, $datos->password, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function login ($username, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE username = ? OR correo = ?;");
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_OBJ);
        return ($usuario && password_verify($password, $usuario->password)) ? $usuario : false;
    }
}