<?php


function verificarToken($token) { //el token es valido?
    $tokensValidos = ['secret_token']; //Esto deberia venir de tokens validos, como una DDBB por ejemplo
    return in_array($token, $tokensValidos);
}

if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    $authorizationHeader = $_SERVER['HTTP_AUTHORIZATION'];
    $token = str_replace('Bearer ', '', $authorizationHeader);

    if (verificarToken($token)) {
        echo "Acceso permitido. ¡Bienvenido!";
    } else {
        header('HTTP/1.1 401 Unauthorized');
        echo "Acceso denegado. Token inválido.";
    }

} else {
    header('HTTP/1.1 401 Unauthorized');
    echo "Acceso denegado. Encabezado Authorization no encontrado.";
}