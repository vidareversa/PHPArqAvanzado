<?php

// Obtener datos de una API pública (sin autenticación)
$url = 'https://jsonplaceholder.typicode.com/posts/1';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

// Procesar la respuesta
$data = json_decode($response, true);
print_r($data);