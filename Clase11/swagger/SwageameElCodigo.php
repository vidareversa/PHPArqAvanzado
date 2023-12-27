<?php

// index.php
require_once 'vendor/autoload.php';
require_once 'src/ApiInfo.php';

$openapi = \OpenApi\Generator::scan(['src/']);
$openapi->info = ApiInfo::class; // Agrega la información general de la API

$rutaArchivo = 'swagger/openapi.json';
file_put_contents($rutaArchivo, $openapi->toJson());
echo 'Archivo OpenAPI guardado en: ' . $rutaArchivo;