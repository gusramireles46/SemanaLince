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
}