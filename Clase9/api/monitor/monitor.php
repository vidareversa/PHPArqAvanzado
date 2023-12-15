<?php

// Define los endpoints que deseas monitorear
$endpoints = array(
    'http://localhost/EducacionIt/Clase9/api/2cache.php?trigger=2',
);

$timeout = 5; //tiempo de espera maximo a una API

foreach ($endpoints as $endpoint) {  // Intenta hacer una solicitud a cada endpoint
    $result = checkEndpoint($endpoint, $timeout);
    echo "Endpoint: $endpoint - ";
    echo $result ? "¡Vivo!\n" : "¡No disponible!\n";
}

function checkEndpoint($url, $timeout)
{
    $context = stream_context_create([
        'http' => [
            'timeout' => $timeout,
        ],
    ]);

    $response = @file_get_contents($url, false, $context);
    return ($response !== false);
}