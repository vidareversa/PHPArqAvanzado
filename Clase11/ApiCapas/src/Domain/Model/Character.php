<?php

// src/Domain/Model/Character.php
namespace App\Domain\Model;

class Character
{
    public $id;
    public $name;
    public $age;
    public $occupation;
    public $episodes = [];
    
    public function __construct($id, $name, $age, $occupation)
    {
        $this->id   = $id;
        $this->name = $name;
        $this->age  = $age;
        $this->occupation = $occupation;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getOccupation()
    {
        return $this->occupation;
    }
        
}