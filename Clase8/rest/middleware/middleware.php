<?php

function authenticate() {
    $token = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : null;

    // Verificar el token (esto es un ejemplo básico, debes implementar la lógica real de autenticación)
    if ($token !== 'miSuperTokenMortal') {
        header('HTTP/1.1 401 Unauthorized');
        echo json_encode(['error' => 'Unauthorized']);
        die;
    }
}