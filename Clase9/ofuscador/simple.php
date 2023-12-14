<?php
function ofuscarCodigo($codigo)
{
    // Remover espacios, tabulaciones y saltos de línea
    $codigo = preg_replace('/\s+/', '', $codigo);

    // Ofuscar nombres de funciones y variables
    $codigo = preg_replace_callback('/(\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)/', function ($matches) {
        return '$' . base64_encode($matches[1]);
    }, $codigo);

    // Ofuscar nombres de clases
    $codigo = preg_replace_callback('/\b(class\s+|new\s+)([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)/', function ($matches) {
        return $matches[1] . base64_encode($matches[2]);
    }, $codigo);

    return $codigo;
}

function desofuscarCodigo($codigoOfuscado)
{
    // Ofuscar nombres de variables y funciones
    $codigo = preg_replace_callback('/(\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)/', function ($matches) {
        return '$' . str_shuffle($matches[1]);
    }, $codigo);

    // Ofuscar nombres de funciones
    $codigo = preg_replace_callback('/\b(function\s+)([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)/', function ($matches) {
        return $matches[1] . str_shuffle($matches[2]);
    }, $codigo);

    return $codigo;

}



function mostrarMenu()
{
    echo "Mini Menú:\n";
    echo "a - Ofuscar código\n";
    echo "b - Desofuscar código\n";
    echo "q - Salir\n";
}

// Proceso principal
mostrarMenu();

while (true) {
    echo "\nIngrese su elección: ";
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 'a':
            $codigoFuente = file_get_contents('unCodigoCualquiera.php');
            $codigoOfuscado = ofuscarCodigo($codigoFuente);
            file_put_contents('archivoOfuscado.php', $codigoOfuscado);
            echo "Código ofuscado y guardado como 'archivoOfuscado.php'.\n";
            break;

        case 'b':
            $codigoOfuscado = file_get_contents('archivoOfuscado.php');
            $codigoDesofuscado = desofuscarCodigo($codigoOfuscado);
            file_put_contents('archivoOfuscado.php', $codigoDesofuscado);
            echo "Código desofuscado:\n";
            echo $codigoDesofuscado;
            break;

        case 'q':
            echo "Saliendo del programa.\n";
            exit;

        default:
            echo "Opción no válida. Intente nuevamente.\n";
    }

    mostrarMenu();
}