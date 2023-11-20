<?php

/* 
  OCP: La clase está abierta para la extensión 
  (nuevos tipos de impuestos) pero cerrada para la modificación.

  En este ejemplo, la clase Factura está abierta para la extensión,
  ya que puedes agregar nuevos tipos de impuestos sin modificar su código
*/

interface Impuesto {
    public function calcularImpuesto(float $monto): float;
}

class ImpuestoIVA implements Impuesto {
    public function calcularImpuesto(float $monto): float {
        return $monto * 0.16; // Impuesto del 16%
    }
}

class ImpuestoISR implements Impuesto {
    public function calcularImpuesto(float $monto): float {
        return $monto * 0.10; // Impuesto sobre la renta del 10%
    }
}

class ImpuestoPAIS implements Impuesto {
    public function calcularImpuesto(float $monto): float {
        return $monto * 0.08; // Impuesto sobre el importe PAIS 8%
    }
}

class Factura {
    private $monto;
    private $impuesto;

    public function __construct(float $monto, Impuesto $impuesto) {
        $this->monto = $monto;
        $this->impuesto = $impuesto;
    }

    public function calcularTotalConImpuesto(): float {
        $impuestoCalculado = $this->impuesto->calcularImpuesto($this->monto);
        return $this->monto + $impuestoCalculado;
    }
}

// Uso del sistema de facturación con diferentes tipos de impuestos.
$facturaIVA = new Factura(1000, new ImpuestoIVA());
$totalConIVA = $facturaIVA->calcularTotalConImpuesto();
echo "Total con IVA: $totalConIVA\n";

$facturaISR = new Factura(1000, new ImpuestoISR());
$totalConISR = $facturaISR->calcularTotalConImpuesto();
echo "Total con ISR: $totalConISR\n";

$facturaPAIS = new Factura(1000, new ImpuestoPais());
$totalConPAIS = $facturaPAIS->calcularTotalConImpuesto();
echo "Total con PAIS: $totalConPAIS\n";

//--------------------------------//
/*
 * Lo que NO seria OPEN/CLOSE (OCP)
 *
class ImpuestoGenerico {
    public function calcularImpuesto(float $monto, String $tipo): float {
        if ($tipo == 'IVA') {
            return $monto * 0.10; // Impuesto sobre la renta del 10%
        } else if ($tipo == 'ISR') {
            return $monto * 0.16; // Impuesto sobre la renta del 16%
        } else if ($tipo == 'PAIS') {
            return $monto * 0.08; // Impuesto sobre la renta del 8%
        }
    }
}
*/
// -------------------------------//
