<?php

class User {
    /**
     * @Assert\NotBlank(message="El nombre no puede estar en blanco")
     * @Assert\Length(min=3, minMessage="El nombre debe tener al menos 3 caracteres")
     */
    private $name;

    // ...
}