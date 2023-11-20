<?php

class CajaDeJuguetes {
    private $juguetes;  // Esto es como los juguetes dentro de la caja

    public function __construct() {
        $this->juguetes = array();  // Inicializamos la caja sin juguetes al principio
    }

    public function agregarJuguete($juguete) {
        $this->juguetes[] = $juguete;  // Agregamos un juguete a la caja
    }

    public function obtenerJuguetes() {
        return $this->juguetes;  // Devolvemos todos los juguetes de la caja
    }
}

// Uso de la caja de juguetes
$miCaja = new CajaDeJuguetes();
$miCaja->agregarJuguete("Carrito");
$miCaja->agregarJuguete("Muñeca");

$juegosEnMiCaja = $miCaja->obtenerJuguetes();

foreach ($juegosEnMiCaja as $juego) {
    echo $juego . "\n";
}
