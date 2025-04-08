<?php
require_once __DIR__ . "/../models/favoritos.class.php";
$favorito = new Favorito();

$action = $_GET['action'] ?? 'view';

switch ($action) {
    case 'add':
        // print_r($_POST);
        // print_r($_SESSION);
        // die;
        if (!isset($_SESSION['usuario'])) {
            header("Location: ../auth.php?view=login&alert=login_required");
            exit;
        }

        $datos = (object) $_POST;
        if ($favorito->agregar($datos)) {
            header("Location: ../gallery.php?action=gallery&page=1&alert=added");
        } else {
            header("Location: ../gallery.php?action=gallery&page=1&alert=error");
        }
        break;
    case 'view':
        if (!isset($_SESSION['usuario'])) {
            header("Location: ../auth.php?view=login&alert=login_required");
            exit;
        }

        $favoritos = $favorito->obtenerPorUsuario($_SESSION['usuario']->id_usuario);
        include __DIR__ . "/../views/favoritos.php";
        break;
    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id && $favorito->eliminar($id, $_SESSION['usuario']->id_usuario)) {
            header("Location: ../favoritos.php?status=deleted");
        } else {
            header("Location: ../favoritos.php?status=error");
        }
        break;
}
