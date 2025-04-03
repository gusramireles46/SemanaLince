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
}