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

class AuthMiddleware {
    public function handle($request, $next) {
        if ($this->isAuthenticated()) {
            return $next($request);
        } else {
            header("Location: /login"); // Si no está autenticado, redirigir o devolver un error
            die();
        }
    }
    
    private function isAuthenticated() {
        // Lógica de autenticación (por ejemplo, verificar la sesión)
        return isset($_SESSION['user']);
    }
}

// Uso del middleware
$authMiddleware = new AuthMiddleware();
$request = (new Request())->fromGlobal();
$authMiddleware->handle($request, function($r) { //$r es el request (que estoy pasando dentro de la función handle)
    echo "Bienvenido al panel de control.";
});