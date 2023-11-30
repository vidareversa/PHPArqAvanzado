<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=estaddbbnoexiste', 'root', '');
    // Resto del código...
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    // Código que se ejecuta siempre, independientemente de si hubo una excepción o no.
    echo "<hr/>  Me ejecuto pase lo que pase";
}