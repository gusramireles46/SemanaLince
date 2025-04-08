<?php
require_once __DIR__ . "/sistema.class.php";

class Favorito extends Sistema
{
    public function agregar($datos)
{
    if (!isset($_SESSION['usuario'])) {
        echo "No hay sesión";
        return false;
    }

    $stmt = $this->conn->prepare("INSERT INTO favoritos (id_usuario, url, titulo, fecha) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $_SESSION['usuario']->id_usuario, PDO::PARAM_INT);
    $stmt->bindParam(2, $datos->url, PDO::PARAM_STR);
    $stmt->bindParam(3, $datos->titulo, PDO::PARAM_STR);
    $stmt->bindParam(4, $datos->fecha, PDO::PARAM_STR);

    if (!$stmt->execute()) {
        return false;
    }
    return true;
}



    public function obtenerPorUsuario($id_usuario)
    {
        $stmt = $this->conn->prepare("SELECT * FROM favoritos WHERE id_usuario = ?");
        $stmt->bindParam(1, $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function eliminar($id, $id_usuario)
    {
        $stmt = $this->conn->prepare("DELETE FROM favoritos WHERE id_favorito = ? AND id_usuario = ?");
        return $stmt->execute([$id, $id_usuario]);
    }
}
