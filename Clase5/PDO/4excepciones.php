<?php

/*
    Las excepciones son los casos no contemplados. Una excepción es un error que no forma parte del
    funcionamiento normal del programa. 
*/
try {
    $pdo = new PDO('mysql:host=localhost;dbname=estaddbbnoexiste', 'root', '');
    // Resto del código...
} catch (PDOException $e) {
    echo "Error exception: " . $e->getMessage();
}