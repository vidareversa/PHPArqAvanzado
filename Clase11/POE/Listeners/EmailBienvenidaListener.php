<?php

class EmailBienvenidaListener
{
    public function handleUserCreation($userData)
    {
        // Lógica para enviar un correo electrónico de bienvenida
        echo "Enviando correo electrónico de bienvenida a {$userData['email']}\n";
    }
}
