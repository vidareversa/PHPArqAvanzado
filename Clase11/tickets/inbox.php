<?php

// Datos de la cuenta de correo
$username = 'mimail@gmail.com';
$password = 'password'; //encript

// Conexión IMAP
$inbox = imap_open('{imap.gmail.com:993/ssl}', $username, $password) or die('Cannot connect to Gmail: ' . imap_last_error());

// Obtener información de la bandeja de entrada
$mailboxInfo = imap_mailboxmsginfo($inbox);
$numMessages = $mailboxInfo->Nmsgs;

if ($numMessages > 0) {
    processIncomingEmails($inbox, $numMessages);
}

// Cerrar la conexión IMAP
imap_close($inbox);

function processIncomingEmails($inbox, $numMessages)
{
    echo "Se encontraron $numMessages mensajes nuevos.\n";

    for ($i = 1; $i <= $numMessages; $i++) {
        $headers      = imap_headerinfo($inbox, $i);
        $emailContent = imap_body($inbox, $i);

        echo "Procesando mensaje $i:\n";
        echo "Asunto: {$headers->subject}\n";
        echo "Contenido:\n$emailContent\n";
        echo "----------------------------------------\n";

    }
}

function readMail($inbox)
{
    echo "Aca leo el mail para parsearlo y extraerle información \n";
    
}