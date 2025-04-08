<?php
require_once __DIR__ . "/../models/sistema.class.php";
class NasaAPI extends Sistema
{
    private $apiKey = "kypAAIhnWbsgdKZrsndki9ATrYGEJj6cxLaqWWNY";
    private $baseUrl = "https://api.nasa.gov";

    public function obtenerAPOD()
    {
        $url = $this->baseUrl . "/planetary/apod?api_key={$this->apiKey}";

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
        $resource = curl_init($url);
        curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($resource, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($resource);
        $error = curl_error($resource);
        curl_close($resource);

        if ($response === false) {
            throw new Exception("Error al consultar la API: $error");
        }

        return $response;
    }

    public function getGallery($start_date, $end_date)
    {
        $url = "https://api.nasa.gov/planetary/apod?api_key={$this->apiKey}&start_date={$start_date}&end_date={$end_date}";

        try {
            $response = $this->fetchData($url);
            $data = json_decode($response); // sigue siendo stdClass (objetos)
            return is_array($data) ? $data : []; // protegemos contra errores
        } catch (Exception $e) {
            return [];
        }
    }

}
