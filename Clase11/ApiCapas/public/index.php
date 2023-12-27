<?php

require_once '../vendor/autoload.php';

use App\Http\Router;
use App\Http\Request;

$router = new Router();
$router->get('/characters', 'CharacterController@getAllCharacters');

//$router->get('/characters/{id}',    'CharacterController@getCharacterById'); //get personaje
//$router->post('/characters',        'CharacterController@createCharacter');
//$router->put('/characters/{id}',    'CharacterController@updateCharacter'); //editar personaje
//$router->delete('/characters/{id}', 'CharacterController@deleteCharacter'); //eliminar personae

$router->get('/characters/{id}/episodes', 'EpisodeController@getEpisodesByCharacterId');

$request = new Request();
$r = $request->fromGlobal();
$response = $router->handle($r);

echo $response;