<?php
require_once __DIR__ . "/../models/sistema.class.php";
class NasaAPI extends Sistema {
    private $apiKey = "kypAAIhnWbsgdKZrsndki9ATrYGEJj6cxLaqWWNY";
    private $baseUrl = "https://api.nasa.gov";

    public function obtenerAPOD()
    {
        $url = $this->baseUrl . "/planetary/apod?api_key=" . $this->apiKey;

        try {
            $json = $this->fetchData($url);
            return json_decode($json);
        } catch (Exception $e) {
            Sistema::alert("danger", "No se pudo obtener la imagen del día: " . $e->getMessage());
            return null;
        }
    }

    private function fetchData($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($response === false) {
            throw new Exception("Error al consultar la API: $error");
        }

        return $response;
    }

    // - obtenerEventos()
    // - buscarImagenPorFecha($fecha)
    // - obtenerDetalleDeAsteroide($id)
}
