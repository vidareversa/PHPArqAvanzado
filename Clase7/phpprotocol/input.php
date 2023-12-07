<?php

$input_data = file_get_contents("php://input"); //Leer el cuerpo de la solicitud POST desde php://input

$request_data = json_decode($input_data, true);

if ($request_data) { 
    print_r($request_data);
} else {
    echo "Error al decodificar los datos JSON.";
}