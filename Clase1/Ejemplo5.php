<?php

#Metodos Protegidos

/**
 * public
 * protected
 * private
 * 
 */
class Animal {
    protected function hacerSonido() {
        return "Haciendo un sonido genérico";
    }
}

class Perro extends Animal {
    public function comunicarse() {
        return $this->hacerSonido() . ": ¡Guau, guau!";
    }
}

// Uso de la herencia con métodos protegidos
$miPerro = new Perro();
echo $miPerro->comunicarse();