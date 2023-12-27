<?php

$queueFile = __DIR__ . '/queue.txt';

function simularPeticion($data)
{
    $timestamp = date('Y-m-d H:i:s') . '.' . sprintf('%06d', microtime(true) * 1000000);
    $message = [
        'timestamp' => $timestamp,
        'data' => $data,
    ];
    $jsonMessage = json_encode($message);
    enviarMensajeACola($jsonMessage);
}

function enviarMensajeACola($message)
{
    $queueFile = __DIR__ . '/queue.txt';
    file_put_contents($queueFile, $message . PHP_EOL, FILE_APPEND);
    echo "Mensaje encolado: " . $message . "\n";
}

for ($i = 0; $i < 20000; $i++)  {
    simularPeticion(['key' => 'valor']);
    //file_put_contents($queueFile, $message . PHP_EOL, FILE_APPEND);
}