<?php

trait Saludador {
    
    private $variableTrait = 'trait';

    public function saludar() {
        echo "Hola, soy un trait!\n";
    }
}

class ClaseA {
    use Saludador;
}

class ClaseB {
    use Saludador;
}

$a = new ClaseA();
$a->saludar();  // Imprime: Hola, soy un trait!

$b = new ClaseB();
$b->saludar();  // Imprime: Hola, soy un trait!