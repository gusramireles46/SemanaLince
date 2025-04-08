<?php
require_once __DIR__ . "/../models/nasa.api.php";
$api = new NasaAPI();

$action = $_GET['action'] ?? 'default';

switch ($action) {
    case 'byDate':
        $fecha = $_GET['fecha'] ?? date("Y-m-d");
        $apod = $api->obtenerAPOD($fecha);
        include __DIR__ . "/../views/apod.php";
        break;
    case 'gallery':
        $pagina = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $porPagina = 10;

        // Rango del mes actual
        $hoy = new DateTime();                             // Fecha actual
        $inicioMes = new DateTime($hoy->format("Y-m-01")); // Primer día del mes
        $finMes = new DateTime();                          // Hoy (no el último día del mes)

        // Obtener todas las imágenes del mes
        $imagenesDelMes = $api->getGallery($inicioMes->format('Y-m-d'), $finMes->format('Y-m-d'));

        // Paginación
        $total = count($imagenesDelMes);
        $paginas = ceil($total / $porPagina);
        $offset = ($pagina - 1) * $porPagina;
        $galeria = array_slice($imagenesDelMes, $offset, $porPagina);

        include __DIR__ . "/../views/gallery.php";
        break;
    default:
        $apod = $api->obtenerAPOD();
        include __DIR__ . "/../views/apod.php";
        break;
}
