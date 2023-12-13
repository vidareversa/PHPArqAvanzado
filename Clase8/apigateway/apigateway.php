<?php

// Rutas de los servicios backend
$serviceRoutes = array(
    "/usuario" => "http://192.168.1.2:8081/",
    "/producto" => "http://servicio-externo.com/",
    "/pedido" => "http://10.0.0.5:8082/"
);

// Obtener la ruta de la solicitud
$requestPath = $_SERVER['REQUEST_URI'];

$requestPath = '/usuario';

// Buscar la ruta en las definiciones de servicios backend
foreach ($serviceRoutes as $gatewayPath => $backendUrl) {
    if (strpos($requestPath, $gatewayPath) === 0) {
        $backendPath = substr($requestPath, strlen($gatewayPath));
        $backendUrl = rtrim($backendUrl, '/') . '/' . ltrim($backendPath, '/');
        header("Location: $backendUrl");
        exit;
    }
}

// Si no se encuentra la ruta, devolver un error 404
http_response_code(404);
echo json_encode(array("error" => "Servicio no encontrado"));