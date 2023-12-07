<?php

//imaginemos que queremos generar un api_key y almacenarlo:
$usuario = [
    'username'   => 'CosmeFulanito',
    'password'   => 'Eseperrotienelacolapeluda123',
    'created_at' => '01-12-2023', // fecha de creación
];

$microtime = microtime(true);
$api_key = password_hash(implode('', $usuario) . $microtime, PASSWORD_BCRYPT);
echo "API Key generado: $api_key";

//aca continuaremos a guardar el api_key del usuario
//...
//...