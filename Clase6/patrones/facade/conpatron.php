<?php


class SubsistemaA {
    public function operacionA() {
        return "Operación A";
    }
}

class SubsistemaB {
    public function operacionB() {
        return "Operación B";
    }
}

class SubsistemaC {
    public function operacionC() {
        return "Operación C";
    }
}


/**
 * Tengo una sola interacción con facade que se encarga
 * de encapsular mucho comportamiento
 */
class Facade {
    private $subsystemA;
    private $subsystemB;
    private $subsystemC;

    public function __construct() {
        $this->subsystemA = new SubsistemaA();
        $this->subsystemB = new SubsistemaB();
        $this->subsystemC = new SubsistemaC();
    }

    //operacionCompleja = registrarUsuario()
    public function operacionCompleja() {
        $resultA = $this->subsystemA->operacionA();
        $resultB = $this->subsystemB->operacionB();
        $resultC = $this->subsystemC->operacionC();
        
        return "$resultA \n $resultB \n $resultC";
    }
}

// Cliente utilizando el patrón Facade
$facade = new Facade();
$result = $facade->operacionCompleja();

echo $result;