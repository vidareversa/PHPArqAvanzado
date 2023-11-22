<?php

/*
Interfaces:

Solo contienen la definición de métodos:
     Las interfaces no pueden contener implementaciones de métodos; solo definen la firma de los métodos que las clases que las implementan deben proporcionar.
     
Soportan herencia múltiple:
    Una clase puede implementar múltiples interfaces, lo que permite que una clase tenga varios contratos.

No pueden contener propiedades:
    Las interfaces no pueden tener propiedades, solo métodos.

Son ligeros y flexibles:
    Las interfaces son ideales cuando se busca una implementación más ligera y flexible. Permiten a las clases compartir comportamientos sin imponer una estructura específica.
*/

interface Nadador {
    public function nadar();
}

interface Volador {
    public function volar();
}

class Pato implements Nadador, Volador {
    public function nadar() {
        echo "El pato nada en el agua.\n";
    }

    public function volar() {
        echo "El pato vuela en el cielo.\n";
    }
}
