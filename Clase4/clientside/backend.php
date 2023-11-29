<?php
header('Content-Type: application/json');

// Simulación de datos desde la base de datos o cualquier otra fuente de datos
$datos = array(
    'mensaje' => '¡Hola desde el servidor!',
    'fecha' => date('Y-m-d H:i:s')
);

echo json_encode($datos);