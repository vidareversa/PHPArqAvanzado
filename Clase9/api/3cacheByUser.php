<?php

require_once 'storage/simpsonsData.php';

// Define feature flags para cada método
$featureFlags = array(
    'GET'    => true,
    'POST'   => false, // Puedes cambiar esto dinámicamente según tus necesidades
    'PUT'    => true,
    'DELETE' => false
);

// Ruta de caché (ajústala según tus necesidades)
$cacheDirectory = __DIR__ . '/cache/';
$requestMethod = $_SERVER['REQUEST_METHOD'];

$userId   = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'invitado'; // Concatenamos al hash del caché el id de usuario, si no está logeado y le permitimos acceder a la api lo catalogamos como "invitado"
$cacheKey = md5($userId . $requestMethod . $_SERVER['REQUEST_URI']);

if (array_key_exists($requestMethod, $featureFlags)) {
    $featureFlagEnabled = $featureFlags[$requestMethod];
    
    if ($featureFlagEnabled) {
        // Intenta cargar desde la caché
        $cachedData = loadFromCache($cacheDirectory, $cacheKey);

        if ($cachedData === false) {
            if ($requestMethod === 'GET') {
                if ($_GET['trigger'] == 2) {
                    $response = array(
                        "data" => $simpsonsData,
                        "links" => array(
                            "about" => "/simpsons/about"
                        )
                    );
                    
                    // Guarda en caché la respuesta
                    saveToCache($cacheDirectory, $cacheKey, json_encode($response));
                    echo json_encode($response);
                } else {
                    echo json_encode(array("error" => "Disparador incorrecto"));
                }
            } elseif ($requestMethod === 'POST') {
                // Implementación de creación de recursos
                // ...

                // Invalidamos la caché si actualizamos, o eliminamos o creamos un nuevo
                invalidateCache($cacheDirectory, $cacheKey);
            } elseif ($requestMethod === 'PUT') {
                // Implementación de actualización de recursos
                // ...

                // Invalidamos la caché si actualizamos, o eliminamos o creamos un nuevo
                invalidateCache($cacheDirectory, $cacheKey);
            } elseif ($requestMethod === 'DELETE') {
                // Eliminamos los personajes de los simpsons (como Seymour Skinner original)
                // ...

                // Invalidamos la caché si actualizamos, o eliminamos o creamos un nuevo
                invalidateCache($cacheDirectory, $cacheKey);
            }
        } else { // Usar datos en caché
            echo $cachedData;
        }
    } else {
        echo json_encode(array("error" => "La característica para el método '$requestMethod' está deshabilitada"));
    }
} else {
    http_response_code(405); // Método no permitido | method not allowed
}

function loadFromCache($directory, $key)
{
    $cacheFilePath = $directory . $key;

    if (file_exists($cacheFilePath)) {
        $cacheData = file_get_contents($cacheFilePath);
        return $cacheData;
    }

    return false;
}

function saveToCache($directory, $key, $data)
{
    $cacheFilePath = $directory . $key;
    file_put_contents($cacheFilePath, $data);
}

function invalidateCache($directory, $key)
{
    $cacheFilePath = $directory . $key;

    if (file_exists($cacheFilePath)) {
        unlink($cacheFilePath);
    }
}