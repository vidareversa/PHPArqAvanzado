<?php

//$url = 'https://api.example.com/data';
$url = 'http://localhost/EducacionIt/Clase7/curl/ejemplo2Receptor.php';


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, 'user:password'); //authenticacion con usuario & contraseña

$response = curl_exec($ch);
curl_close($ch);

echo $response;
// Procesar la respuesta
$data = json_decode($response, true);
print_r($data);