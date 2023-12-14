<?php

require_once 'SimpsonsSDK/ApiClient.php';

use SimpsonsSDK\ApiClient;

// Crear una instancia del cliente
$simpsonsClient = new ApiClient();

// Obtener la lista de usuarios
$users = $simpsonsClient->getUsers();
echo "Users: " . json_encode($users) . PHP_EOL;

// Obtener la lista de episodios
$episodes = $simpsonsClient->getEpisodes();
echo "Episodes: " . json_encode($episodes) . PHP_EOL;