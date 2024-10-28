<?php
include_once '../core/db.php';

class RecomendacionController {
    private $apiUrl;

    public function __construct() {
        $this->apiUrl = 'http://localhost:5000/recommendations'; // Asegúrate de que esta URL apunte a tu API
    }

    public function handleRequest() {
        $mejores_profesores = $this->getRecommendations();
        include '../views/respuestas/recomendations.php'; // Asegúrate de que el path sea correcto
    }

    private function getRecommendations() {
        // Inicializar cURL
        $ch = curl_init($this->apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        // Ejecutar la solicitud
        $response = curl_exec($ch);
        curl_close($ch);

        // Convertir la respuesta JSON a un array PHP
        return json_decode($response, true);
    }
}

// Crear una instancia del controlador y manejar la solicitud
$controller = new RecomendacionController();
$controller->handleRequest();
