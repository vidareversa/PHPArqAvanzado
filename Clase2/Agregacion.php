<?php

/* 
La agregación representa una relación "parte de", 
donde una clase está compuesta por otras clases, 
pero las partes pueden existir de forma independiente.
*/

class Rueda {
    private $tamano;

    public function __construct($tamano) {
        $this->tamano = $tamano;
    }

    public function getTamanio() {
        return $this->tamano;
    }
}

class Automovil {
    private $modelo;
    private $ruedas = [];

    public function __construct($modelo) {
        $this->modelo = $modelo;
    }

    public function agregarRueda(Rueda $rueda) {
        $this->ruedas[] = $rueda;
    }

    public function obtenerRuedas() {
        return $this->ruedas;
    }
}

// Agregación: Un automóvil tiene varias ruedas
$automovil = new Automovil("Citroen");
$rueda1 = new Rueda("Grande");
$rueda2 = new Rueda("Mediana");
$rueda3 = new Rueda("Pequeña");
$rueda4 = new Rueda("Pequeña");

$automovil->agregarRueda($rueda1);
$automovil->agregarRueda($rueda2);
$automovil->agregarRueda($rueda3);
$automovil->agregarRueda($rueda4);

$ruedasDelAutomovil = $automovil->obtenerRuedas();

//echo "<pre>";var_dump($ruedasDelAutomovil);die;
foreach ($ruedasDelAutomovil as $rueda) {
    echo "Rueda de tamaño: " . $rueda->getTamanio() . " <br/> ";
}
