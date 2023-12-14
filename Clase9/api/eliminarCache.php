<?php

// Ruta de la carpeta que deseas limpiar
$carpeta = __DIR__."/cache/";

// Verificar si la carpeta existe
if (is_dir($carpeta)) {
    // Obtener todos los archivos en la carpeta
    $archivos = glob($carpeta . '/*');

    // Iterar sobre los archivos y eliminarlos
    foreach ($archivos as $archivo) {
        if (is_file($archivo)) {
            unlink($archivo);
            echo "Archivo eliminado: $archivo\n";
        }
    }

    echo "Todos los archivos han sido eliminados de la carpeta.\n";
} else {
    echo "La carpeta no existe.\n";
}