<?php

/*
Clases abstractas:
Pueden contener métodos abstractos y concretos:
    Las clases abstractas pueden tener tanto métodos abstractos (sin implementación) como métodos concretos (con implementación).

Soportan herencia simple:
    Una clase puede heredar de una sola clase abstracta. No se permite la herencia múltiple de clases en PHP.

Pueden contener propiedades:
    Las clases abstractas pueden tener propiedades, lo que permite definir y compartir datos entre las clases que heredan.

Son útiles para compartir código común:
    Las clases abstractas son más adecuadas cuando deseas proporcionar una implementación básica común a varias clases derivadas.
*/

abstract class Animal {
    protected $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    abstract public function hacerSonido();
}

class Perro extends Animal {
    public function hacerSonido() {
        echo "Guau!\n";
    }
}

class Gato extends Animal {
    public function hacerSonido() {
        echo "Miau!\n";
    }
}
