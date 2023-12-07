<?php

$id_producto = $_GET['id'];

// Configuración de la conexión a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'tienda');

// Verificar la conexión
if ($mysqli->connect_error) {
    die('Error de conexión a la base de datos: ' . $mysqli->connect_error);
}

try {
    // Consulta preparada para evitar inyecciones SQL
    $stmt = $mysqli->prepare('SELECT * FROM productos WHERE id = '.$id_producto);
    $stmt->execute();

    // Obtener el resultado
    $result = $stmt->get_result();
    $producto = $result->fetch_assoc();
    
    print_r($producto);

    // Cerrar la consulta preparada
    $stmt->close();

} catch (Exception $e) {
    echo 'Error de base de datos: ' . $e->getMessage();
}

// Cerrar la conexión
$mysqli->close();