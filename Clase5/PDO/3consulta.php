<?php
try {
    // 1- Conexión a la base de datos:
    $pdo = new PDO('mysql:host=localhost;dbname=tienda', 'root', '');

    // 2- Ejecución de la consulta SELECT: El resultado se almacena en el objeto $stmt (que significa "statement" o "sentencia preparada").
    $stmt = $pdo->query('SELECT * FROM usuarios');

    // 3- Recuperación de datos y visualización:
    echo "<pre>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        print_r($row);
    }
    echo "</pre>";
    
} catch (PDOException $e) {
    echo "Error al ejecutar la consulta: " . $e->getMessage();
}