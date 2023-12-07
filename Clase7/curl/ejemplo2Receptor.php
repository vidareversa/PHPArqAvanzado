<?php

$validUser = 'user'; //el usuario posta
$validPassword = 'password'; //la clave posta

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || $_SERVER['PHP_AUTH_USER'] !== $validUser || $_SERVER['PHP_AUTH_PW'] !== $validPassword) {
    header('HTTP/1.1 401 Unauthorized');
    echo 'Authentication required.';
    die;
}

// si esta todo ok...
$data = ['example' => 'data', 'from' => 'API'];
header('Content-Type: application/json');
echo json_encode($data);