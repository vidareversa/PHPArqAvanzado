<?php

/** 
 * Consultas que devuelven un objeto de la clase
 * PDOStatement antes de ejecutar el SQL 
 * y dan la opción de ejecutar la consulta en la base de datos:
 */
try {
    $pdo = new PDO('mysql:host=localhost;dbname=tienda', 'root', '');

    // Consulta preparada
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE id = :id');

    // Asignar valores a los parámetros
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    
    // Definir un valor para $userId
    $userId = 1;

    // Ejecutar la consulta
    $stmt->execute();

    // Procesar los resultados
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        print_r($row);
    }
} catch (PDOException $e) {
    echo "Error al ejecutar la consulta: " . $e->getMessage();
}