<?php

// Clase base para los manejadores
abstract class Soporte {
    protected $siguienteSoporte;

    public function setSiguienteSoporte(Soporte $soporte) {
        $this->siguienteSoporte = $soporte;
    }
    
    abstract public function manejarSolicitud($nivel, $mensaje);
}

// Implementación concreta de manejador
class SoporteNivelBajo extends Soporte {
    public function manejarSolicitud($nivel, $mensaje) {
        if ($nivel == 1) {
            return "Soporte de nivel bajo (1) maneja la solicitud: " . $mensaje;
        } elseif ($this->siguienteSoporte != null) {
            return $this->siguienteSoporte->manejarSolicitud($nivel, $mensaje);
        } else {
            return "Nadie puede manejar la solicitud.";
        }
    }
}

// Otro manejador con límite diferente
class SoporteNivelMedio extends Soporte {
    public function manejarSolicitud($nivel, $mensaje) {
        if ($nivel == 2) {
            return "Soporte de nivel medio (2) maneja la solicitud: " . $mensaje;
        } elseif ($this->siguienteSoporte != null) {
            return $this->siguienteSoporte->manejarSolicitud($nivel, $mensaje);
        } else {
            return "Nadie puede manejar la solicitud.";
        }
    }
}

// Otro manejador con límite diferente
class SoporteNivelAlto extends Soporte {
    public function manejarSolicitud($nivel, $mensaje) {
        if ($nivel == 3) {
            return "Soporte de nivel alto (3) maneja la solicitud: " . $mensaje;
        } elseif ($this->siguienteSoporte != null) {
            return $this->siguienteSoporte->manejarSolicitud($nivel, $mensaje);
        } else {
            return "Nadie puede manejar la solicitud.";
        }
    }
}

// Cliente que utiliza la cadena de responsabilidad
class Cliente {
    public static function main() {
        // Configurar la jerarquía de la cadena
        $soporteBajo  = new SoporteNivelBajo();
        $soporteMedio = new SoporteNivelMedio();
        $soporteAlto  = new SoporteNivelAlto();
        
        $soporteBajo->setSiguienteSoporte($soporteMedio);
        $soporteMedio->setSiguienteSoporte($soporteAlto);

        // Simular solicitudes de soporte
        $solicitud1 = $soporteBajo->manejarSolicitud(3, "<b>Se prendió fuego el datacenter</b>");

        echo $solicitud1 . "\n";
    }
}

// Ejecutar el ejemplo
Cliente::main();