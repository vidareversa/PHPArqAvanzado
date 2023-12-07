<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre  = $_POST["nombre"];
        $email   = $_POST["email"];
        $mensaje = $_POST["mensaje"];

        // Validación básica para prevenir ataques XSS
        //$nombre  = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
        //$email   = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        //$mensaje = htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8');

        $sql = "INSERT INTO mensajes (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";

        if ($conn->query($sql) === true) {
            echo "Datos almacenados correctamente.";
        } else {
            throw new Exception("Error: " . $sql . "<br>" . $conn->error);
        }
    }
} catch (Exception $e) {
    echo "Error al procesar datos: " . $e->getMessage();
}

$conn->close();