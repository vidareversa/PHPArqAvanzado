<?php

class UserController
{
    private $eventEmitter;

    public function __construct(EventEmitter $eventEmitter)
    {
        $this->eventEmitter = $eventEmitter;
    }

    public function createUser($userData)
    {
        // Lógica para crear un nuevo usuario en la base de datos
        // ...
        // ...

        // Emitir el evento 'user.created' con los datos del usuario
        $this->eventEmitter->emit('user.created', $userData);
        
        // Emulamos la creación del usuario
        return json_encode(['message' => 'Usuario creado exitosamente']);
    }
}