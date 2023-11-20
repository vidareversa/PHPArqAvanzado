<?php

class Animal {
    public function hacerSonido() {
        echo "Haciendo un sonido genérico\n";
    }
}

class Perro extends Animal {
    public function hacerSonido() {
        echo "¡Guau, guau!\n";
    }

    protected function ponersePatasParaArriba() {
        echo "(Perro se pone patas para arriba)";
    }
}