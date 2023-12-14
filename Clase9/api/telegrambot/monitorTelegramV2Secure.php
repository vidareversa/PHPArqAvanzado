<?php

require __DIR__ . '/vendor/autoload.php';

use SergiX44\Nutgram\Nutgram;
use Dotenv\Dotenv;

// Cargar variables de entorno desde el archivo .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Acceder al token de la API
$token = $_ENV['API_TOKEN'];

$bot = new Nutgram($token);

$bot->onCommand('start', function (Nutgram $bot) {
    $bot->sendMessage('¡Hola!');
});

$bot->onCommand('miApi', function(Nutgram $bot) {
    $result = exec('php ../monitor/monitor.php');
    $bot->sendMessage("Resultado de ejecutar el otro script: $result");
});

$bot->onText('My name is {name}', function (Nutgram $bot, string $name) {
    $bot->sendMessage("Hi $name");
});

$bot->run();