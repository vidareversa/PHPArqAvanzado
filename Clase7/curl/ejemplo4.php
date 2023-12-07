<?php
// Enviar una solicitud con encabezados personalizados y manejo de errores
//$url = 'https://api.example.com/data';
$url = 'http://localhost/EducacionIt/Clase7/curl/ejemplo4Receptor.php';

$headers = [
    'Authorization: Bearer token123',
    'Content-Type: application/json',
];


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


$response = curl_exec($ch);

// Manejo de errores
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}

curl_close($ch);

// Procesar la respuesta
$data = json_decode($response, true);
print_r($data);