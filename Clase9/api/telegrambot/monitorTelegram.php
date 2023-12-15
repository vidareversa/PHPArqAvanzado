<?php

require __DIR__ . '/vendor/autoload.php';

use SergiX44\Nutgram\Nutgram;

$token = 'tokenalfanumerico123';
$bot = new Nutgram($token);

// --aca empieza la funcionalidad -- //
$bot->onCommand('start', function(Nutgram $bot) {
    $bot->sendMessage('Soy un bot de telegram');
});

$bot->onCommand('miApi', function(Nutgram $bot) {
    $result = exec('php ../monitor/monitor.php');
    $bot->sendMessage("Resultado de ejecutar el otro script: $result");
});

$bot->onText('My name is {name}', function(Nutgram $bot, string $name) {
    $bot->sendMessage("Hi $name");
});

$bot->run();