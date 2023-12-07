<?php

//imaginemos que queremos almacenar una contraseña 
//y encriptarla para que nadie que acceda a la base de datos
//pueda conocer su valor original
$usuario = [
    'username'   => 'CosmeFulanito',
    'password'   => 'Eseperrotienelacolapeluda123',
    'created_at' => '01-12-2023', // fecha de creación
];

$passwordHash = password_hash('Eseperrotienelacolapeluda123', PASSWORD_BCRYPT);

//---------Imaginemos que despues queremos saber si ese password es correcto ---------//
//...
//...
$verificacionOk = password_verify('Eseperrotienelacolapeluda123', $passwordHash);

if ($verificacionOk) {
    echo "Password OK!";
} else {
    echo "Password KO!";
}