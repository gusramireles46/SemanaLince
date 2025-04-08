<?php
require_once __DIR__ . "/models/sistema.class.php";
$titulo = "Favoritos | Explorador Espacial";
$vistaActiva = "favoritos";

include "components/header.php";
include "components/navbar.php";
if (isset($_GET['status'])) {
    if ($_GET['status'] === 'deleted') {
        Sistema::alert("success", "Favorito eliminado correctamente.");
    } elseif ($_GET['status'] === 'error') {
        Sistema::alert("danger", "No se pudo eliminar el favorito.");
    }
}
include "controllers/favoritos.controller.php";
include "components/footer.php";
