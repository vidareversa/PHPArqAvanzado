<?php
// Nivel 1: Recursos (HTTP)
/*
 En el Nivel 1, hemos evolucionado hacia una arquitectura
 En este caso, el recurso es la información básica de los Simpsons,
 y se accede a través de una URL específica.
*/
if ($_GET['trigger'] == 2) {
    // Datos básicos de los Simpsons
    $simpsonsData = array(
        "characters" => array(
            array("name" => "Homer", "age" => 39),
            array("name" => "Marge", "age" => 36),
            array("name" => "Bart", "age" => 10),
            array("name" => "Lisa", "age" => 8),
            array("name" => "Maggie", "age" => 1)
        )
    );
    echo json_encode($simpsonsData);
} else {
    echo json_encode(array("error" => "Disparador incorrecto"));
}