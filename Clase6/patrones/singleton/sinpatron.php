<?php

class Configuracion {
    private $datos = [];

    public function set($clave, $valor) {
        $this->datos[$clave] = $valor;
    }

    public function get($clave) {
        return $this->datos[$clave] ?? null;
    }
}

$configuracion1 = new Configuracion();
$configuracion1->set('idioma', 'es');

$configuracion2 = new Configuracion();
echo $configuracion2->get('idioma'); // Salida: null