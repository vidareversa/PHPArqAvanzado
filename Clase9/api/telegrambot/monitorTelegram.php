<?php

require __DIR__ . '/vendor/autoload.php';

use SergiX44\Nutgram\Nutgram;

$token = '6427066178:AAFfIh5QHdRqtcaer4A40tmE5ZLlgcRZREA';
$bot = new Nutgram($token);

$bot->onCommand('start', function(Nutgram $bot) {
    $bot->sendMessage('Holas charolas!');
});

$bot->onCommand('miApi', function(Nutgram $bot) {
    $result = exec('php ../monitor/monitor.php');
    $bot->sendMessage("Resultado de ejecutar el otro script: $result");
});

$bot->onText('My name is {name}', function(Nutgram $bot, string $name) {
    $bot->sendMessage("Hi $name");
});

$bot->run();