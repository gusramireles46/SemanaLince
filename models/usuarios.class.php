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

    public function registrar($datos)
    {
        if (!filter_var($datos->correo, FILTER_VALIDATE_EMAIL)) {
            Sistema::alert('danger', 'El correo electrónico no es válido.');
            return false;
        }

        try {
            $this->conn->beginTransaction();

            // Verificar si ya existe username o correo
            $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE username = :username OR correo = :correo");
            $stmt->bindParam(":username", $datos->username, PDO::PARAM_STR);
            $stmt->bindParam(":correo", $datos->correo, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                Sistema::alert('danger', 'El nombre de usuario o correo ya está registrado.');
                $this->conn->rollback();
                return false;
            }

            // Insertar nuevo usuario
            $datos->password = password_hash($datos->password, PASSWORD_DEFAULT);
            $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, apellidos, username, correo, password) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([
                $datos->nombre,
                $datos->apellidos,
                $datos->username,
                $datos->correo,
                $datos->password
            ]);

            $this->conn->commit();
            return true;
        } catch (PDOException $e) {
            $this->conn->rollback();
            Sistema::alert('danger', 'Ocurrió un error al registrar. Intenta de nuevo.');
            return false;
        }
    }


    public function login($username, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE username = ? OR correo = ?");
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->bindParam(2, $username, PDO::PARAM_STR);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_OBJ);
        if ($usuario && password_verify($password, $usuario->password)) {
            $_SESSION['usuario'] = $usuario;
            return true;
        }
        return false;
    }
}