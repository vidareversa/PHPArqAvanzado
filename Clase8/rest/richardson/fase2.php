<?php
// Nivel 2: Recursos + Verbos (HTTP)
/*
    Incorporamos los verbos HTTP (GET,POST,PUT Y DELETE)
    Cada verbo realiza operaciones específicas en el recurso.
*/

$simpsonsData = array(
    "characters" => array(
        array("name" => "Homer", "age" => 39),
        array("name" => "Marge", "age" => 36),
        array("name" => "Bart", "age" => 10),
        array("name" => "Lisa", "age" => 8),
        array("name" => "Maggie", "age" => 1)
    )
);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($_GET['trigger'] == 2) {
        echo json_encode($simpsonsData);
    } else {
        echo json_encode(array("error" => "Disparador incorrecto"));
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Implementación de creación de personajes de los simpsons
    // ...

} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Actualizamos los personajes de las simpsons
    // ...

} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Eliminamos los personajes de los simpsons (como Seymour Skinner original)
    // ...

} else {
    http_response_code(405); // Método no permitido | method not allowed
}