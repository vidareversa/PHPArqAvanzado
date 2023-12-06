<?php

class Persona {
    private $nombre;
    private $edad;

    public function setNombre($nombre) {
        $this->nombre = $nombre;
        return $this; // Devuelve la instancia para permitir el encadenamiento
    }

    public function setEdad($edad) {
        $this->edad = $edad;
        return $this; // Devuelve la instancia para permitir el encadenamiento
    }

    public function getInfo() {
        return "Nombre: {$this->nombre}, Edad: {$this->edad}";
    }
}

$persona = new Persona();
$persona->setNombre('Juan Manolo')->setEdad(30);
echo $persona->getInfo();