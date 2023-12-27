<?php

/**
 * Suma dos números.
 *
 * Esta función toma dos números y devuelve la suma de ellos.
 *
 * @param int $a El primer número.
 * @param int $b El segundo número.
 * @return int La suma de $a y $b.
 * @throws InvalidArgumentException Si alguno de los argumentos no es un entero.
 * @author Facundo G <facundo.giardino@gmail.com>
 * @since 1.3.0  (desde que versión del Software está disponible esta funcion)
 */
function sum($a, $b) {

    // ... 
    // ...
    if (!is_int($a) || !is_int($b)) {
        throw new InvalidArgumentException('Ambos argumentos deben ser enteros.');
    }

    return $a + $b;
}
