<?php

/*
La composición es una relación fuerte "todo de", 
donde una clase está compuesta por 
otras clases y las partes no pueden existir sin la clase principal.
*/

class Motor {
    public function encender() {
        echo "Motor encendido.\n";
    }
}

class Coche {
    private $modelo;
    private $motor;

    public function __construct($modelo) {
        $this->modelo = $modelo;
        $this->motor = new Motor();
    }

    public function arrancar() {
        echo "Arrancando el coche modelo $this->modelo...\n";
        $this->motor->encender();
    }
}

// Composición: Un coche tiene un motor
$coche = new Coche("Audi");
$coche->arrancar();
