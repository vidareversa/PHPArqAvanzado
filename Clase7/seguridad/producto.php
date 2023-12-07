<?php

$id_producto = $_GET['id'];

try {
    $pdo = new PDO('mysql:host=localhost;dbname=tienda', 'root', '');
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare('SELECT * FROM productos WHERE id = :id');
    $stmt->bindParam(':id', $id_producto, PDO::PARAM_INT);
    $stmt->execute();
    
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($producto);

} catch (PDOException $e) {
    echo 'Error de base de datos: ' . $e->getMessage();
}