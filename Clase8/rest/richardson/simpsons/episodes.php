<?php

// Episodios de los simpsons
$simpsonsEpisodes = array(
    1 => array(
        "title" => "Simpsons Roasting on an Open Fire",
        "season" => 1,
        "episode" => 1,
        "characters" => array(1, 2, 3) // IDs de personajes que aparecen en este episodio
    ),
    2 => array(
        "title" => "Bart Gets an F",
        "season" => 2,
        "episode" => 1,
        "characters" => array(1, 4, 5)
    )
);

// Obtener el ID del episodio desde la URL
$characterId = isset($_GET['id']) ? intval($_GET['id']) : null;

// Verificar si el ID del episodio es válido
if ($characterId) {
    $charactersInEpisode = array();
    foreach ($simpsonsEpisodes as $episode) {
        if (in_array($characterId, $episode['characters'])) {
            $episodiosDelPersonaje[] = $episode;
        }
    }

    $response = array(
        "personajeId" => $characterId,
        "episodios" => $episodiosDelPersonaje
    );

    // Devolver la respuesta en formato JSON
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
} else {
    // ID de episodio no válido
    http_response_code(404); // Not Found
    echo json_encode(array("error" => "Episodio no encontrado"));
}