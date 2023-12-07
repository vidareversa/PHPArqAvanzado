<?php

// Consumir el servicio de usuarios
$userServiceUrl = 'http://localhost:8000/users';
$users = json_decode(file_get_contents($userServiceUrl), true);
print_r($users);

echo "<hr/>";

// Consumir el servicio de productos
$productServiceUrl = 'http://localhost:8001/products';
$products = json_decode(file_get_contents($productServiceUrl), true);
print_r($products);