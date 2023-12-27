<?php

//POE = Programacion Orientada a Eventos

require_once 'Controllers/UserController.php';
require_once 'Emitter/EventEmitter.php';
require_once 'Listeners/LogListener.php';
require_once 'Listeners/EmailBienvenidaListener.php';

// 0- Creamos la instancia de nuestro emitter (el manejador de eventos)
$eventEmitter = new EventEmitter();

//  1- Creamos instancias de oyentes (listeners) 
$emailBienvenidaListener = new EmailBienvenidaListener();
$logListener = new LogListener();

// 2- Los subscribimos a eventos
$eventEmitter->on('user.created', [$emailBienvenidaListener, 'handleUserCreation']); //
$eventEmitter->on('user.created', [$logListener, 'handleUserCreation']);

// 3- Flujo de trabajo comun: Crear instancia del controlador de usuario, e inyectamos una instancia de  EventEmmiter
$userController = new UserController($eventEmitter);

// 4- Flujo de trabajo comun: Simulamos la creación de un nuevo usuario
$userData = ['username' => 'Max Power', 'email' => 'cosme@fulano.com'];
$response = $userController->createUser($userData);

// 5- Imprimimos la respuesta de la API
echo $response;