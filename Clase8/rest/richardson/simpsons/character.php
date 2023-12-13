<?php

// Datos simulados de personajes de Los Simpsons
$simpsonsCharacters = [
    1 => ["name" => "Homer", "age" => 39, "occupation" => "Nuclear Safety Inspector"],
    2 => ["name" => "Marge", "age" => 36, "occupation" => "Housewife"]
];

// Obtener el ID del personaje desde la URL
$characterId = isset($_GET['id']) ? intval($_GET['id']) : null;

// Verificar si el ID del personaje es válido
if ($characterId && array_key_exists($characterId, $simpsonsCharacters)) {
    $character = $simpsonsCharacters[$characterId];
    $response = array(
        "id" => $characterId,
        "name" => $character["name"],
        "age" => $character["age"],
        "occupation" => $character["occupation"],
        "links" => array(
            "episodes" => array("href" => "/simpsons/characters/{$characterId}/episodes", "method" => "GET")
        )
    );

    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
} else {
    http_response_code(404);
    echo json_encode(array("error" => "Personaje no encontrado"));
}