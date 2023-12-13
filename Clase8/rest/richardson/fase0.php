<?php
// Nivel 0: Servicios POX (Plain Old XML) 
/*
  En este nivel, la implementación podría ser una API basada en servicios 
  web tradicionales utilizando SOAP (Simple Object Access Protocol),
  donde las llamadas a los servicios se realizan a través de mensajes XML.
*/
if ($_GET['trigger'] == 2) {
    // Implementación básica con SOAP o XML-RPC
    // ...
    // ...
} else {
    echo json_encode(array("error" => "Disparador incorrecto"));
}