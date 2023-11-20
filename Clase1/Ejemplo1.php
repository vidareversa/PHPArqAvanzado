<?php

#Clase basica en PHP
class Animal {
    public $nombre;
    
    public function saludar() {
        return "Hola, soy un animal llamado " . $this->nombre;
    }
}

// Uso de la clase
$miAnimal = new Animal();
$miAnimal->nombre = "Tommy";
echo $miAnimal->saludar();