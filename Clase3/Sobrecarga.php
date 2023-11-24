<?php

/**
 * En php el polimorfismo de sobrecarga no existe realmente, 
 * solo podemos emularlo con el metodo is_
 * 
 * (Verificar la verdadera implementacion en Sobrecarga.jar donde se ve el concepto en JAVA)
 */
class Calculadora {
    public function sumar($a, $b) {
        if (is_int($a) && is_int($b)) {
            return $a + $b;
        } elseif (is_float($a) && is_float($b)) {
            return $a + $b;
        } elseif (is_string($a) && is_string($b)) {
            return $a . $b;
        } else {
            // Tipo de datos no admitido
            return "Operación no soportada para estos tipos de datos.";
        }
    }
}

// Uso de la calculadora
$calculadora = new Calculadora();

echo $calculadora->sumar(5, 10) . "\n";             // Suma de enteros
echo $calculadora->sumar(3.5, 2.5) . "\n";          // Suma de flotantes
echo $calculadora->sumar("Hola", " Mundo") . "\n";  // Concatenación de cadenas
echo $calculadora->sumar(5, "Hola") . "\n";         // Operación no soportada