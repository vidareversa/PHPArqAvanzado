<?php

// DIP: Las dependencias deben ser abstracciones, no detalles concretos.
// Abstracción (interfaz)
// La dependencia la inyecto en el constructor de la clase AppCorrecta

interface ServicioPago {
    public function procesarPago($monto);
}

// Implementaciones concretas
class PayPal implements ServicioPago {
    public function procesarPago($monto) {
        // Lógica para procesar el pago con PayPal.
    }
}

// Implementaciones concretas
class BitCoin implements ServicioPago {
    public function procesarPago($monto) {
        // Lógica para procesar el pago con PayPal.
    }
}

class TarjetaCredito implements ServicioPago {
    public function procesarPago($monto) {
        // Lógica para procesar el pago con tarjeta de crédito.
    }
}

class TarjetaDebito implements ServicioPago {
    public function procesarPago($monto) {
        // Lógica para procesar el pago con tarjeta de debito.

        //----- logica para pagar con tarjeta de debito ---
        //-----
        //-----
    }
}

class AppCarrito {
    private $servicioPago;

    public function __construct(ServicioPago $servicioPago) {
        $this->servicioPago = $servicioPago;
    }

    public function procesarCompra($monto) {
        // Lógica de la aplicación.
        $this->servicioPago->procesarPago($monto);
    }
}

// Uso correcto: La clase de aplicación depende de la abstracción ServicioPago con diferentes implementaciones posibles.
$paypal = new PayPal();
$appPayPal = new AppCarrito($paypal);
$appPayPal->procesarCompra(100);

$tarjetaCredito = new TarjetaCredito();
$appTarjeta = new AppCarrito($tarjetaCredito);
$appTarjeta->procesarCompra(150);

$tarjetaDebito = new TarjetaDebito();
$appTarjetaDebito = new AppCarrito($tarjetaDebito);
$appTarjetaDebito->procesarCompra(150);