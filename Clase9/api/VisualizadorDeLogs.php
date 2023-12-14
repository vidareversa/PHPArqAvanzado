<?php

function getFormattedLogs($logDirectory)
{
    $formattedLogs = '';

    $logFiles = glob($logDirectory . '*.txt');

    foreach ($logFiles as $logFile) {
        $logs = file_get_contents($logFile);
        $formattedLogs .= "<div class='log-container'>";
        $formattedLogs .= "<h2>Logs de " . basename($logFile, '.txt') . "</h2>";
        $formattedLogs .= "<pre>$logs</pre>";
        $formattedLogs .= "</div>";
    }

    return $formattedLogs;
}

$logDirectory = __DIR__ . '/logs/';

if (file_exists($logDirectory)) {
    $formattedLogs = getFormattedLogs($logDirectory);
} else {
    $formattedLogs = "<p>No hay logs disponibles.</p>";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizador de Logs</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
            color: #333;
        }

        h1 {
            color: #333;
        }

        .log-container {
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #555;
            margin-bottom: 10px;
        }

        pre {
            background-color: #f8f8f8;
            padding: 10px;
            border: 1px solid #ddd;
            overflow: auto;
            border-radius: 5px;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>

    <h1>Visualizador de Logs</h1>
    
    <?= $formattedLogs ?>

</body>
</html>