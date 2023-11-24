<?php

class Request
{
    private $_uri;
    private $_method;
    private $_headers;
    private $_body;

    public function fromGlobal() {
        $this->_uri     = $_SERVER['REQUEST_URI'];
        $this->_method  = $_SERVER['REQUEST_METHOD'];
        $this->_headers = apache_request_headers();
        $this->_body    = file_get_contents('php://input');

        return $this;
    }
}

class TimeLogMiddleware {
    public function handle($request, $next) { //$next es un objeto (closure) que seria un callback o una función
        $startTime = microtime(true); //Comienza a registrar el tiempo
        $response = $next($request); //Ejecuto mi ACCIÓN
        $endTime = microtime(true); //Termina de registrar el tiempo
        $executionTime = $endTime - $startTime; //Calcular y registrar el tiempo de ejecución
        echo "Tiempo de ejecución: {$executionTime} segundos";
    }
}

$timeLogMiddleware = new TimeLogMiddleware();
$request = (new Request())->fromGlobal();
$timeLogMiddleware->handle($request, function($request) { //Callbacks o funciones anonimas
    //o puedo llamar a mi API
    //o puedo llamar a mi base de datos
    //o realizar la acción quiera
    return "hola manolo";
}  );