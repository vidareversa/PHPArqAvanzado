<?php

// Clase base para los manejadores
abstract class Aprobador {
    protected $siguienteAprobador;

    public function setSiguienteAprobador(Aprobador $aprobador) {
        $this->siguienteAprobador = $aprobador;
    }

    abstract public function aprobarCompra($monto);
}

// Implementación concreta de aprobador
class AprobadorGerente extends Aprobador {
    public function aprobarCompra($monto) {
        if ($monto <= 1000) {
            return "Compra aprobada por el Gerente";
        } elseif ($this->siguienteAprobador != null) {
            return $this->siguienteAprobador->aprobarCompra($monto);
        } else {
            return "Compra rechazada. Ningún aprobador puede manejar la solicitud.";
        }
    }
}

// Otro aprobador con límite diferente
class AprobadorDirector extends Aprobador {
    public function aprobarCompra($monto) {
        if ($monto <= 5000) {
            return "Compra aprobada por el Director";
        } elseif ($this->siguienteAprobador != null) {
            return $this->siguienteAprobador->aprobarCompra($monto);
        } else {
            return "Compra rechazada. Ningún aprobador puede manejar la solicitud.";
        }
    }
}

// Otro aprobador con límite diferente
class AprobadorCEO extends Aprobador {
    public function aprobarCompra($monto) {
        if ($monto <= 10000) {
            return "Compra aprobada por el CEO";
        } elseif ($this->siguienteAprobador != null) {
            return $this->siguienteAprobador->aprobarCompra($monto);
        } else {
            return "Compra rechazada. Ningún aprobador puede manejar la solicitud.";
        }
    }
}

// Cliente que utiliza la cadena de responsabilidad
class ClienteAprobacion {
    public static function main() {
        // Configurar la jerarquía de la cadena
        $gerente  = new AprobadorGerente();
        $director = new AprobadorDirector();
        $ceo      = new AprobadorCEO();

        $gerente->setSiguienteAprobador($director);
        $director->setSiguienteAprobador($ceo);
        
        $compraARealizar = 1000000;
        // Simular solicitudes de compra
        $solicitud = $gerente->aprobarCompra($compraARealizar);

        echo 'La compra de ', $compraARealizar, ' tuvo el siguiente resultado: ', $solicitud, "\n";
    }
}

// Ejecutar el ejemplo
ClienteAprobacion::main();