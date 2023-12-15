<?php

require_once 'storage/simpsonsData.php';

// Define feature flags para cada método
$featureFlags = array(
    'GET'    => false,
    'POST'   => false, // Puedes cambiar esto dinámicamente según tus necesidades
    'PUT'    => true,
    'DELETE' => false
);

// Nivel 3: Hipermedia (HTTP)
$requestMethod = $_SERVER['REQUEST_METHOD'];

if (array_key_exists($requestMethod, $featureFlags)) {
    $featureFlagEnabled = $featureFlags[$requestMethod];
    
    if ($featureFlagEnabled) {
        if ($requestMethod === 'GET') {
            if ($_GET['trigger'] == 2) {
                $response = array(
                    "data" => $simpsonsData,
                    "links" => array(
                        "about" => "/simpsons/about"
                    )
                );
                echo json_encode($response, JSON_PRETTY_PRINT);
            } else {
                echo json_encode(array("error" => "Disparador incorrecto"));
            }
        } elseif ($requestMethod === 'POST') {
            // Implementación de creación de recursos
            // ...
        } elseif ($requestMethod === 'PUT') {
            // Implementación de actualización de recursos
            // ...
        } elseif ($requestMethod === 'DELETE') {
            // Eliminamos los personajes de los simpsons (como Seymour Skinner original)
            // ...
        }
    } else {
        echo json_encode(array("error" => "La característica para el método '$requestMethod' está deshabilitada"));
    }
} else {
    http_response_code(405); // Método no permitido | method not allowed
}