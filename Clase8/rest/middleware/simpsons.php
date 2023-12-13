<?php

require 'middleware.php';
authenticate(); //Función dentro del middleware

// Nivel 3: Hipermedia (HTTP)
/*
    En el Nivel 3, hemos introducido la idea de hipermedia, 
    donde la API proporciona enlaces (links) 
    en las respuestas que permiten a los clientes descubrir 
    y navegar a recursos relacionados.
*/
$simpsonsData = array(
    "characters" => array(
        array(
            "name" => "Homer",
            "age" => 39,
            "links" => array(
                "self" => array("href" => "/simpsons/character/1", "method" => "GET"),
                "episodes" => array("href" => "/simpsons/character/1/episodes", "method" => "GET")
            )
        ),
        array(
            "name" => "Marge",
            "age" => 36,
            "links" => array(
                "self" => array("href" => "/simpsons/character/2", "method" => "GET"),
                "episodes" => array("href" => "/simpsons/character/2/episodes", "method" => "GET")
            )
        ),
        array(
            "name" => "Bart",
            "age" => 10,
            "links" => array(
                "self" => array("href" => "/simpsons/character/3", "method" => "GET"),
                "episodes" => array("href" => "/simpsons/character/3/episodes", "method" => "GET")
            )
        ),
        array(
            "name" => "Lisa",
            "age" => 8,
            "links" => array(
                "self" => array("href" => "/simpsons/character/4", "method" => "GET"),
                "episodes" => array("href" => "/simpsons/character/4/episodes", "method" => "GET")
            )
        ),
        array(
            "name" => "Maggie",
            "age" => 1,
            "links" => array(
                "self" => array("href" => "/simpsons/character/5", "method" => "GET"),
                "episodes" => array("href" => "/simpsons/character/5/episodes", "method" => "GET")
            )
        )
    )
);

// Nivel 3: Hipermedia (HTTP)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($_GET['trigger'] == 1) {
        $response = array(
            "data" => $simpsonsData,
            "links" => array(
                "about" => "/simpsons/about"
            )
        );
        echo json_encode($response);
    } else {
        echo json_encode(array("error" => "Disparador incorrecto"));
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Implementación de creación de recursos
    // ...
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Implementación de actualización de recursos
    // ...
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Eliminamos los personajes de los simpsons (como Seymour Skinner original)
    // ...
} else {
    http_response_code(405); // Método no permitido | method not allowed
}