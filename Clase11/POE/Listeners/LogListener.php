<?php

class LogListener
{
    private $logFilePath = 'logs/create.user.log';

    public function handleUserCreation($userData)
    {
        // Lógica para registrar actividad
        echo $logMessage = "Registrando actividad: Nuevo usuario creado - {$userData['username']}";
        $this->writeToLogFile($logMessage);
    }

    private function writeToLogFile($message)
    {
        $logEntry = date('Y-m-d H:i:s') . ' ' . $message . PHP_EOL;
        file_put_contents($this->logFilePath, $logEntry, FILE_APPEND);
    }
}