<?php

class RouterMiddleware {
    private $routes;

    public function __construct() {
        // Definir las rutas directamente
        $this->routes = [
            'GET' => [
                '/inicio' => 'InicioPage::mostrar',
                '/catalogo' => 'CatalogoPage::mostrar',
                '/detalle' => 'DetallePage::mostrar',
            ],
            'POST' => [
                '/login' => 'AuthController::login',
                '/registro' => 'AuthController::registro',
            ],
        ];
    }

    /*
    El formato [ $controller, $method ] es una forma de representar un array de dos elementos, 
    donde el primer elemento es el nombre de la clase y el segundo elemento es el nombre del método. 
    Luego, call_user_func toma este array y llama al método de la clase indicada.
    */
    public function route($method, $uri) {
        $action = $this->routes[$method][$uri] ?? null; //Si no existe la ruta, es null
        if ($action) { //Si existe la ruta
            list($controller, $method) = explode('::', $action); //Obtener el controlador y el método desde la acción
            call_user_func([$controller, $method]); //Llamar al controlador y método asociados
        } else {
            header('HTTP/1.1 404 Not Found');
            die;
        }
    }
}

// Ejemplo de controlador
class AuthController {
    public static function login() {
        echo "Controlador de autenticación: Login";
    }

    public static function registro() {
        echo "Controlador de autenticación: Registro";
    }
}

class InicioPage {
    public static function mostrar() {
        echo "Página de inicio %%% <b>Estoy en negrita </b>";
    }
}

class CatalogoPage {
    public static function mostrar() {
        echo "Página de catálogo";
    }
}

class DetallePage {
    public static function mostrar() {
        echo "Página de detalle";
    }
}

// Uso del router
$router = new RouterMiddleware();
//$router->route('GET', '/inicio');
//$router->route('GET', '/catalogo');
//$router->route('POST', '/login');
$router->route('POST', '/registro');