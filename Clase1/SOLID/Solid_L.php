<?php

/*  
LSP: Las subclases deben poder sustituirse por sus clases 
base sin afectar el correcto funcionamiento del programa.
*/
class Bird {
    public function fly() {
        // Lógica para volar.
    }
}

class Paloma extends Bird {
    public function fly() {
        // Lógica para volar como paloma
    }
}

class Hornero extends Bird {
    public function fly() {
        // Lógica para volar como hornero
    }
}

class Penguin extends Bird {
    public function fly() {
        throw new \Exception("Los pingüinos no pueden volar.");
    }
}

// Se puede utilizar una instancia de Penguin donde se espera un Bird.
$hornero = new Hornero();
$pinguino = new Penguin();
function makeBirdFly($pinguino) {
    $pinguino->fly();
}