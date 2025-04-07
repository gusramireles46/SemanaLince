<?php
require_once __DIR__ . "/../models/nasa.api.php";
$api = new NasaAPI();

$action = $_GET['action'] ?? 'default';

switch ($action) {
    case 'byDate':
        $fecha = $_GET['fecha'] ?? date("Y-m-d");
        $apod = $api->obtenerAPOD($fecha);
        break;
    default:
        $apod = $api->obtenerAPOD(); // Imagen del día
        break;
}

include __DIR__ . "/../views/apod.php";
