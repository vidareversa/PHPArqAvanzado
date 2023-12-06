<?php

require_once 'Animales/Mamiferos/Gato.php';
require_once 'Animales/Mamiferos/Perro.php';
require_once 'OtrosAnimales/Gato.php';

// Creamos instancias de ambos gatos
$miGato = new Animales\Mamiferos\Gato();
$miPerro = new Animales\Mamiferos\Perro();
$otroGato = new OtrosAnimales\Gato();

// Hacemos que ambos gatos hagan sonidos
echo $miGato->hacerSonido();  // Imprimirá ¡Miau!
echo $miPerro->hacerSonido();  // Imprimirá ¡Miau!
echo $otroGato->hacerSonido(); // Imprimirá ¡Ronroneo!