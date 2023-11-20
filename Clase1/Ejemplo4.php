<?php

#Herencia
class Vehiculo {
    protected $marca;
    
    public function __construct($marca) {
        $this->marca = $marca;
    }
    
    public function obtenerMarca() {
        return $this->marca;
    }
}

class Coche extends Vehiculo {
    private $modelo;
    
    public function __construct($marca, $modelo) {
        parent::__construct($marca);
        $this->modelo = $modelo;
    }
    
    public function obtenerModelo() {
        return $this->modelo;
    }
}

// Uso de la herencia
$miCoche = new Coche("Toyota", "Camry");
echo "Marca: " . $miCoche->obtenerMarca() . ", Modelo: " . $miCoche->obtenerModelo();