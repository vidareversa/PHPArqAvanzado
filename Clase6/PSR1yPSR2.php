<?php

namespace MiEmpresa\MiPaquete;

use OtroPaquete\Algo;

/*
    -El código sigue el estándar de nombres de clases, interfaces y namespaces de PSR-1.
    -Se utilizan cuatro espacios para la indentación, según lo especificado en PSR-2.
    -Se utiliza el estilo de llaves en la misma línea para estructuras de control (if, else).
    -Se utilizan espacios alrededor de operadores, según lo especificado en PSR-2.
 */
class MiClase
{
    const MI_CONSTANTE = 'mi-valor';

    private $miPropiedad;

    public function __construct($miParametro)
    {
        $this->miPropiedad = $miParametro;
    }

    public function getMiPropiedad()
    {
        return $this->miPropiedad;
    }

    public function setMiPropiedad($nuevoValor)
    {
        $this->miPropiedad = $nuevoValor;
    }

    public function miMetodo()
    {
        if ($this->miPropiedad === self::MI_CONSTANTE) {
            return 'Es igual a la constante.';
        } else {
            return 'No es igual a la constante.';
        }
    }
}

// Ejemplo de uso
$instancia = new MiClase('valor-inicial');
echo $instancia->miMetodo();