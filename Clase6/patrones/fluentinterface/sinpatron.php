<?php

class Persona {
    private $nombre;
    private $edad;

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function getInfo() {
        return "Nombre: {$this->nombre}, Edad: {$this->edad}";
    }
}

$persona = new Persona();
$persona->setNombre('Juan');
$persona->setEdad(25);
echo $persona->getInfo();