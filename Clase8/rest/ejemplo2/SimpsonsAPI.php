<?php
header('Content-Type: application/json');

// Datos básicos de los Simpsons
$simpsonsData = [
    "characters" => [
        ["name" => "Homer", "age" => 39],
        ["name" => "Marge", "age" => 36],
        ["name" => "Bart", "age" => 10],
        ["name" => "Lisa", "age" => 8],
        ["name" => "Maggie", "age" => 1]
    ]
];

// Comprobamos si el disparador es 2
if ($_GET['trigger'] == 2) {
    echo json_encode($simpsonsData, JSON_PRETTY_PRINT);
} else {
    // En caso contrario, devolvemos un mensaje de error
    echo json_encode(array("error" => "Disparador incorrecto"));
}