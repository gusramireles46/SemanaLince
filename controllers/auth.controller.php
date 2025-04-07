<?php
require_once __DIR__ . "/../models/usuarios.class.php";

$action = $_GET['action'] ?? null;
$usuario = new Usuario();

switch ($action) {
    case 'REGISTER':
        $datos = (object) $_POST;

        // Opcional: puedes validar campos aquí también antes de llamar al método
        if ($usuario->registrar($datos)) {
            header("Location: ../auth.php?view=login&registro=ok");
        } else {
            // Puedes manejar un error aquí
            header("Location: ../auth.php?view=register&registro=error");
        }
        break;

    // Aquí más adelante puedes agregar case 'LOGIN'
}
