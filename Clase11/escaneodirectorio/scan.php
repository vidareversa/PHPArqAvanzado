<?php

function scanDirectory($directory)
{
    $files = [];

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $files[] = $file->getPathname();
        }
    }

    return $files;
}

function extractDirectoryStructure($directory, $indent = 0)
{
    $structure = [];

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($iterator as $file) {
        $path = $iterator->getSubPathname();
        $pathParts = explode(DIRECTORY_SEPARATOR, $path);

        if ($pathParts[0] === '.' || $pathParts[0] === '..') {
            continue;
        }

        $currentDir = &$structure;

        foreach ($pathParts as $part) {
            if (!isset($currentDir[$part])) {
                $currentDir[$part] = [];
            }
            $currentDir = &$currentDir[$part];
        }
    }

    return formatStructure($structure, $indent);
}

function formatStructure($structure, $indent)
{
    $result = '';
    foreach ($structure as $name => $content) {
        $isDir = is_array($content);
        $result .= str_repeat("\t", $indent) . $name . ($isDir ? '/' : '') . PHP_EOL;
        if ($isDir) {
            $result .= formatStructure($content, $indent + 1);
        }
    }
    return $result;
}

$directory = __DIR__ . '/';
$structure = extractDirectoryStructure($directory);

$filename = 'directory_structure.txt';
file_put_contents($filename, $structure);

echo "La estructura de directorios se ha guardado en el archivo '$filename'.\n";