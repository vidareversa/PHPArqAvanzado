<?php

#Polimorfismo de Tiempo de Ejecución:
class Figura {
    public function obtenerDescripcion() {
        return "Soy una figura geométrica";
    }
}

class Cuadrado extends Figura {
    public function obtenerDescripcion() {
        return "Soy un cuadrado";
    }
}

class Circulo extends Figura {
    public function obtenerDescripcion() {
        return "Soy un círculo";
    }
}

// Uso del polimorfismo de tiempo de ejecución
$figuras = [new Cuadrado(), new Circulo(), new Figura()];

foreach ($figuras as $figura) {
    echo $figura->obtenerDescripcion() . "\n";
}