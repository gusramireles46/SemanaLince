<?php
class Database {
    private $host = "localhost";
    private $db_name = "nasa_explorer";
    private $username = "nasa_explorer";
    private $password = "@admin";
    private $dbms = "mysql";
    public $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("{$this->dbms}:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
        } catch(PDOException $e) {
            echo "Conexión fallida: " . $e->getMessage();
        }
        return $this->conn;
    }
}
