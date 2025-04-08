<?php
include __DIR__ ."/models/sistema.class.php";
$titulo = "Galería del mes | Explorador Espacial";
$vistaActiva = "gallery";

include "components/header.php";
include "components/navbar.php";
if (isset($_GET['alert']) && $_GET['alert'] === 'added') {
    Sistema::alert("success", "¡Agregado a favoritos!");
} elseif (isset($_GET['alert']) && $_GET['alert'] === 'error') {
    Sistema::alert("danger", "No se pudo agregar a favoritos.");
}
include "controllers/apod.controller.php";
include "components/footer.php";
