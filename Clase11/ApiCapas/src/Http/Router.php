<?php

namespace App\Http;

use App\Http\Request;

class Router
{
    private $routes = [];

    public function add($method, $pattern, $callable)
    {
        array_push($this->routes, [
            'method' => strtoupper($method),
            'pattern' => $pattern,
            'callable' => $callable
        ]);
        return $this;
    }

    public function get($pattern, $callable) 
    { 
        $this->add("GET", $pattern, $callable);
        return $this;
    }

    public function post($pattern, $callable) 
    { 
        $this->add("POST", $pattern, $callable);
        return $this;
    }

    public function put($pattern, $callable) 
    { 
        $this->add("PUT", $pattern, $callable);
        return $this;
    }

    public function delete($pattern, $callable) 
    { 
        $this->add("DELETE", $pattern, $callable);
        return $this;
    }

    public function handle(Request $request)
    {
        //echo "<pre>";print_r($this->routes);print_r($request->uri());die;
        foreach ($this->routes as $route) {
            $pattern = '#' . preg_replace('/\{[^\}]+\}/', '([^/]+)', $route['pattern']) . '$#';
            if (preg_match($pattern, $request->uri(), $matches)) {
                array_shift($matches);
                return $this->callControllerMethod($route['callable'], $matches);
            }
        }
        return '404 Not Found';
    }

    private function callControllerMethod($controllerMethod, $params)
    {
        // $controllerName = 'CharacterController';
        // $methodName = 'deleteCharacter';
        list($controllerName, $methodName) = explode('@', $controllerMethod);
        $controllerClass = 'App\\Http\\Controller\\' . $controllerName;
        if (!class_exists($controllerClass)) {
            return http_response_code('404'); //no encontrado
        }
        $controller = new $controllerClass();
        if (!method_exists($controller, $methodName)) {
            return  http_response_code('404');
        }
        
        return call_user_func_array([$controller, $methodName], $params);
    }
}