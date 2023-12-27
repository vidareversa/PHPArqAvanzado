<?php

require 'vendor/autoload.php';

$miClase = new App\MiClase();
$miClase->saludar();

$miClaseNinja = new App\Ninja\MiClaseNinja();
$miClaseNinja->saludar();

$miClaseNinja = new App\Pomelo\MiClasePomelo();
$miClaseNinja->saludar();