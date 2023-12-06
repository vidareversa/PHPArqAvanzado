<?php

class ConfiguracionSingleton {
    private static $instancia;
    private $datos = [];

    private function __construct() {
        // Constructor privado para evitar instanciación directa
    }

    public static function obtenerInstancia() {
        if (self::$instancia === null) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }

    public function set($clave, $valor) {
        $this->datos[$clave] = $valor;
    }

    public function get($clave) {
        return $this->datos[$clave] ?? null;
    }
}

$configuracion = ConfiguracionSingleton::obtenerInstancia();
$configuracion->set('idioma', 'es');

$configuracion2 = ConfiguracionSingleton::obtenerInstancia();
echo $configuracion2->get('idioma'); // Salida: es