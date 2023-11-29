<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email  = $_POST["email"];

    echo "Nombre: " . $nombre . "<br>";
    echo "Correo electrónico: " . $email;
}