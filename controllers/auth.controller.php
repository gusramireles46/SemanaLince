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
    case 'LOGIN':
        $datos = (object) $_POST;

        // Validación básica
        if (empty($datos->usuario) || empty($datos->password)) {
            header("Location: auth.php?view=login");
            exit;
        }

        // Intentar login
        $usuarioLogeado = $usuario->login($datos->usuario, $datos->password);

        if ($usuarioLogeado) {
            // Si loguea correctamente puedes redirigir a otra vista, como dashboard o index
            header("Location: ../index.php?login=ok");
        } else {
            // Error en credenciales
            header("Location: ../auth.php?view=login&login=error");
        }
        break;

}
