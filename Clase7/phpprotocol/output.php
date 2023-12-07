<?php

$responseData = ["status" => "success", "message" => "La solicitud fue procesada correctamente"];
$responseJson = json_encode($responseData);

header("Content-Type: application/json");

$output = fopen("php://output", "w");
fwrite($output, $responseJson);
fclose($output);