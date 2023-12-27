<?php

namespace App\Domain\Model;

class Episode
{
    public $id;
    public $title;
    public $description;
    public $characters = []; // Array para almacenar los personajes asociados al episodio

    public function __construct($id, $title, $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->characters = [];
    }

    public function addCharacter(Character $character)
    {
        $this->characters[] = $character;
    }
    
}