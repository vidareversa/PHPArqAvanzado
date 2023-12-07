<?php

require_once 'validation.php';

try {
  $headers = apache_request_headers();

  if(!isset($headers['authorization'])) {
    http_response_code(401);
    throw new Exception('Usuario no autorizado');
  }
  
  $authToken = explode(' ', $headers['authorization'])[1];
  
  if(!validateUser($authToken)) {
    throw new Exception('Usuario no autorizado');
  }

  echo 'Bienvenido!';

} catch(Exception $ex) {
  http_response_code(401);
  echo $ex->getMessage();
}



