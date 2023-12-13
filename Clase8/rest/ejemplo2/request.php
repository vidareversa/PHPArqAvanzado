<?php

$apiUrl = 'http://localhost/EducacionIt/Clase8/rest/ejemplo2/SimpsonsAPI.php';

$triggerValue = 2;
$fullUrl = $apiUrl . '?trigger=' . $triggerValue;

$ch = curl_init($fullUrl);


curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error al realizar la solicitud: ' . curl_error($ch);
} else {
    echo 'Respuesta de la API: ' . $response;
}

curl_close($ch);