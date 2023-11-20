<?php

#Constructor y propiedades privadas
class Persona {
    private $nombre;
    
    public function __construct($nombre) {
        $this->nombre = $nombre;
    }
    
    public function obtenerNombre() {
        return $this->nombre;
    }
}

// Uso de la clase con constructor
$persona = new Persona("Juan");
echo "Nombre: " . $persona->obtenerNombre();