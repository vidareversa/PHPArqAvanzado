<?php

function verificarTokenAuthorization() {
    $headers = apache_request_headers(); // | getallheaders()
    
    if (isset($headers['Authorization'])) {
        $token = $headers['Authorization'];
        if ($token === 'tu_token_secreto') {
            return true; // Token válido
        } else {
            return false; // Token inválido
        }
    } else {
        return false; // 'Authorization' no presente en los encabezados
    }
}

if (verificarTokenAuthorization()) {
    echo "Token válido. Acceso permitido.";
} else {
    echo "Token inválido o no presente. Acceso denegado.";
}