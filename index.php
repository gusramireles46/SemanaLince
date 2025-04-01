<?php
require_once __DIR__ . "/config/database.class.php";
$db = new Database();
$conn = $db->connect();

echo $conn ? "Si" : "No";