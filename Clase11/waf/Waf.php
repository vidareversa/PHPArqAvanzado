<?php

class Waf {
    private $appUrl;
    private $requestMethod;
    private $userInput;

    public function __construct($appUrl) {
        $this->appUrl = $appUrl;
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
        $this->getUserInput();
    }
    
    private function getUserInput() {
        switch ($this->requestMethod) {
            case 'GET':
                $this->userInput = $_GET;
                break;
            case 'POST':
                $this->userInput = $_POST;
                break;
            case 'PUT':
                parse_str(file_get_contents('php://input'), $putData);
                $this->userInput = $putData;
                break;
            default:
                die('Método no soportado');
        }
    }
    
    private function sanitizeInput($input) {
        if (is_array($input)) {
            return array_map([$this, 'sanitizeInput'], $input);
        } else {
            return filter_var($input, FILTER_SANITIZE_STRING);
        }
    }

    function preventDDoS() {
        $ip = $_SERVER['REMOTE_ADDR'];
        $limit = 10; // Número máximo de solicitudes permitidas
        $blockTime = 60; // Tiempo en segundos para bloquear la IP si excede el límite
    
        // Verifica si la IP está en la lista de bloqueadas
        $blockedFile = 'lists/blacklistips.txt';
        $blockedIPs = file($blockedFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
        if (in_array($ip, $blockedIPs)) {
            die('Tu dirección IP está bloqueada temporalmente.');
        }
    
        // Cuenta las solicitudes recientes de esta IP
        $logFile = 'lists/request_log.txt';
        $requests = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
        // Filtra las solicitudes antiguas y cuenta las recientes
        $currentTime = time();
        $recentRequests = array_filter($requests, function ($entry) use ($currentTime, $blockTime, $ip) {
            list($entryIp, $timestamp) = explode(' ', $entry);
            return ($ip === $entryIp && $currentTime - $timestamp < $blockTime);
        });
        
        // Si la IP ha excedido el límite permitido, bloquéala
        if (count($recentRequests) >= $limit) {
            file_put_contents($blockedFile, $ip . PHP_EOL, FILE_APPEND);
            die('Demasiadas solicitudes desde tu dirección IP. Estás bloqueado temporalmente.');
        }
    
        // Registra la solicitud actual junto con la IP
        file_put_contents($logFile, $ip . ' ' . $currentTime . PHP_EOL, FILE_APPEND);
    }
    
    public function applyWAF() {
        $filteredInput = $this->sanitizeInput($this->userInput);
        $this->preventDDoS();
        
        return $filteredInput;
    }
}