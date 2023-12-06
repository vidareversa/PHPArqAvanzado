<?php

class SubsistemaA {
    public function operacionA() {
        return "Pregunta a un webservice si el usuario es veridico";
    }
}

class SubsistemaB {
    public function operacionB() {
        return "Registro de usuario";
    }
}

class SubsistemaC {
    public function operacionC() {
        return "llamada a una api";
    }
}

// Cliente utilizando los subsistemas directamente
$subsystemA = new SubsistemaA();
$subsystemB = new SubsistemaB();
$subsystemC = new SubsistemaC();

$resultA = $subsystemA->operacionA();
$resultB = $subsystemB->operacionB();
$resultC = $subsystemC->operacionC();

echo "$resultA\n$resultB\n$resultC";
