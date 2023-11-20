<?php

#Metodos estaticos
class Matematicas {
    public static function sumar($a, $b) {
        return $a + $b;
    }

    public function restar($a, $b) {
        return $a - $b;
    }
}

$resultado = Matematicas::sumar(5, 3);
echo "La suma es: " . $resultado;