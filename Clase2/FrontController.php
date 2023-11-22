<?php

class FrontController {
    public function dispatch($request) {
        // Obtener la ruta de la solicitud
        $uri = $request['uri'];

        // Ruta de ejemplo: /usuarios
        switch ($uri) {
            case '/':
                $response = $this->homeAction();
                break;
            case '/usuarios':
                $response = $this->usuariosAction();
                break;
            case '/productos':
                $response = $this->productosAction();
                break;
            default:
                $response = $this->notFoundAction();
                break;
        }

        // Imprimir la respuesta
        echo $response;
    }

    private function homeAction() {
        return "Página de inicio";
    }

    private function usuariosAction() {
        return "Listado de usuarios";
    }

    private function productosAction() {
        return "Listado de productos";
    }

    private function notFoundAction() {
        header("HTTP/1.1 404 Not Found");
        return "Página no encontrada";
    }
}

// Simulación de solicitud
$uri = $_SERVER['REQUEST_URI']; //$uri = '/usuarios'
$uri = basename(parse_url($uri, PHP_URL_PATH));
$request = ['uri' => '/'.$uri];

// Crear una instancia del FrontController y despachar la solicitud
$frontController = new FrontController();
$frontController->dispatch($request);