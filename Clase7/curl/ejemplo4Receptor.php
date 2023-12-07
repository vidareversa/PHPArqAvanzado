<?php

$headers = getallheaders();
$authorizationHeader = isset($headers['Authorization']) ? $headers['Authorization'] : '';

// Verificar la presencia del encabezado de autorización
if (!isset($authorizationHeader)) {
    header('HTTP/1.1 401 Unauthorized');
    echo 'Token de acceso no proporcionado.';
    die;
}

// Validar el token de acceso (aquí asumimos que el token esperado es 'token123')
$expectedToken = 'token123';
$providedToken = trim(str_replace('Bearer ', '', $authorizationHeader));

if ($providedToken !== $expectedToken) {
    header('HTTP/1.1 401 Unauthorized');
    echo 'Token de acceso no válido.';
    die;
}

// Simular la lógica de negocio para obtener datos (en un entorno real, aquí estaría la lógica de tu aplicación)
$data = ['example' => 'data', 'from' => 'API'];

// Devolver datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);