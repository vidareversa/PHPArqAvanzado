<?php

class Calculadora
{
    public function sumar(int $num1, int $num2): int
    {
        return $num1 + $num2;
    }
}

// Uso de la clase
$calculadora = new Calculadora();

// Llamada al método sumar con type-hints
$resultado = $calculadora->sumar(5, 10);

echo "La suma es: " . $resultado;  // Imprimirá "La suma es: 15"