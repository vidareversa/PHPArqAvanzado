<?php
// Configuración de conexión a la base de datos
$dsn = 'mysql:host=localhost;dbname=tienda';
$usuario = 'root';
$contrasena = '';

try {
    // Conexión con PDO
    $pdo = new PDO($dsn, $usuario, $contrasena);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ejemplo con query()
    $queryResult = $pdo->query('SELECT nombre, descripcion FROM categoria');
    
    echo "Ejemplo con query(): <br/>";
    while ($row = $queryResult->fetch(PDO::FETCH_ASSOC)) {
        echo "Nombre: {$row['nombre']}, Edad: {$row['descripcion']}<br>";
    }
    echo "<br/>";

    // --------------------------------//
    // Ejemplo con prepare() y execute()
    $stmt = $pdo->prepare('SELECT nombre, descripcion FROM categoria WHERE id = :id');
    $id = 1;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    echo "Ejemplo con prepare() y execute():<br>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Nombre: {$row['nombre']}, Edad: {$row['categoria']}<br>";
    }
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
}