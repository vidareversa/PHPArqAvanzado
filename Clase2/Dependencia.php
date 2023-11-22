<?php

/* 
La dependencia indica que una clase depende de otra, pero no hay una relación fuerte. 
Puede existir una relación temporal o basada en una función específica.
*/

class Logger {

    /**
     * Logea un mensaje dinamicamente concatenandole la fecha y la hora
     */
    public function log($mensaje) {
        $archivoLog = 'logs/archivo.log';
        $marcaTiempo = date('d-m-Y H:i:s');
        $registro = "[$marcaTiempo] $mensaje" . PHP_EOL;
        file_put_contents($archivoLog, $registro, FILE_APPEND | LOCK_EX);
    }

    /**
     * Logea un mensaje con la intención de registrar las autenticaciones del sistema
     */
    public function logAuth($mensaje) {
        $archivoLog = 'logs/autenticaciones.log';
        $marcaTiempo = date('d-m-Y H:i:s');
        $registro = "[$marcaTiempo] $mensaje" . PHP_EOL;
        file_put_contents($archivoLog, $registro, FILE_APPEND | LOCK_EX);
    }
}

class UserAuth {
    private $logger;

    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }

    public function autenticar($accion) {
        
        try {
            //codigo para autenticar el usuario
            //..
            //..

        } catch (Exception $e) {
            $this->logger->log("Falló la authenticación del usuario: $accion");
        }
    }
}

// Dependencia: El servicio depende de un logger
$logger = new Logger();
$auth = new UserAuth($logger);
$auth->autenticar(" Se autenticó con exito");