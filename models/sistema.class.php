<?php
require_once __DIR__ . "/../config/database.class.php";

class Sistema extends Database
{
    public function __construct()
    {
        $this->conn = $this->connect();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function alert($type, $message)
    {
        $alert = (object)[
            'type' => $type,
            'message' => $message
        ];
        include __DIR__ . '/../components/alert.php';
    }

    public function testConnect() {
        echo $this->conn ? "<br>Conectado" : "<br>Error de conexion";
    }
}