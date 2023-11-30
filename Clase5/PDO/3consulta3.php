<?php

/*
    Consultas que ejecutan el SQL 
    y devuelven un número entero, 
    correspondiente a la cantidad 
    de filas afectadas por la operación:
*/
try {
    $pdo = new PDO('mysql:host=localhost;dbname=tienda', 'root', '');

    // Consulta de actualización
    $rowCount = $pdo->exec('UPDATE usuarios SET activo = 1 WHERE tipo = "premium"');

    // Mostrar la cantidad de filas afectadas
    echo "Filas afectadas: " . $rowCount;
} catch (PDOException $e) {
    echo "Error al ejecutar la consulta: " . $e->getMessage();
}