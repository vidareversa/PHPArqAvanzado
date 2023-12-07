<?php
// Enviar datos a una API utilizando una solicitud POST
$url = 'https://api.example.com/create';

$data = ['nombre' => 'Ejemplo', 'edad' => 25];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$response = curl_exec($ch);
curl_close($ch);

// Procesar la respuesta
$result = json_decode($response, true);
print_r($result);