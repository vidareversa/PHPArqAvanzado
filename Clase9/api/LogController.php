<?php

function logRequestResponse($request, $response, $esCacheResponse = false)
{
    $logDirectory = __DIR__ . '/logs/';
    $logFilename = $logDirectory . date('Y-m-d') . '-log.txt';

    $logData = "[" . date('Y-m-d H:i:s') . "]\nRequest: " . json_encode($request, JSON_PRETTY_PRINT) . "\nResponse: " . json_encode($response, JSON_PRETTY_PRINT) . "\nCacheResponse: " . ($esCacheResponse ? 'Sí' : 'No') . "\n\n";

    // Asegúrate de que el directorio de logs exista
    if (!file_exists($logDirectory)) {
        mkdir($logDirectory, 0777, true);
    }

    // Agrega la entrada al archivo de log
    file_put_contents($logFilename, $logData, FILE_APPEND | LOCK_EX);
}
