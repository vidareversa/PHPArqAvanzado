<?php

require 'vendor/autoload.php';

use Cron\CronExpression;

$expression = CronExpression::factory('*/5 * * * *'); // Cada 5 minutos

if ($expression->isDue()) {
    echo "Ejecutando script...\n";
    $resultado = shell_exec('php index.php');
    echo $resultado;
} else {
    echo "No es el momento de ejecutar el script.\n";
}