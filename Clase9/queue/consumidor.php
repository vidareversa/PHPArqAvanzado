<?php

$queueFile = __DIR__ . '/queue.txt';
$finishFile = __DIR__ . '/mensajesProcesados.txt';

while (true) {
    while (!file_exists($queueFile) || !filesize($queueFile)) {
        usleep(100000); // Espera 100ms
    }

    $message = file_get_contents($queueFile);
    $messages = explode(PHP_EOL, trim($message));

    foreach ($messages as $message) {
        if (!empty($message)) {
            $data = json_decode($message, true);

            //sleep(2); // Simular un tiempo de procesamiento

            echo "Mensaje procesado: " . json_encode($data) . "\n";

            // Elimina el mensaje procesado del archivo de la cola
            $queueContent = file_get_contents($queueFile);
            $queueContent = str_replace($message . PHP_EOL, '', $queueContent);
            file_put_contents($queueFile, $queueContent);

            // Almacena el mensaje procesado en el archivo finish
            file_put_contents($finishFile, json_encode($data) . PHP_EOL, FILE_APPEND);
        }
    }
}