<?php
// about.php

// Información sobre la API
$apiInfo = array(
    "name" => "API de Los Simpsons",
    "version" => "1.0",
    "description" => "Una API para obtener información sobre los personajes y episodios de Los Simpsons.",
    "author" => "Nombre del autor",
    "contact" => "contacto@ejemplo.com"
);


// Devolver la información en formato JSON
header('Content-Type: application/json');
echo json_encode($apiInfo, JSON_PRETTY_PRINT);