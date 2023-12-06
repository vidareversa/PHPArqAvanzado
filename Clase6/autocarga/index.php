<?php

// index.php
function miAutocarga($nombreClase) {
    $rutaClase = __DIR__ . '/clases/' . $nombreClase . '.php';
    if (file_exists($rutaClase)) {
        require $rutaClase;
    }
}

spl_autoload_register('miAutocarga');

$miObjeto = new MiClase();
$miObjetoTNT = new ClaseTNT();
$miObjetoErrante = new ClaseErrante();