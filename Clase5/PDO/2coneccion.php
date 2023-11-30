<?php

//dsn = Data Source Name 
$dsn = 'mysql:host=localhost;dbname=tienda';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    echo "Conexión establecida";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}