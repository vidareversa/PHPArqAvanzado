<?php

function validateUser($token) {
  $users = [
    [ 
      'username' => 'CosmeFulanito', 
      'pass' => '1234', 
      'token' => '$2y$10$9/LHustBe5p0VobJwE/MIO0mhWAhfmHUi4ntAY3yJxSKWod/I7/NK' 
    ]
  ];
  $isValid = false;

  foreach ($users as $user) {
    if($user['token'] == $token) {
      $isValid = true;
      break;
    }    
  }

  return $isValid;
}