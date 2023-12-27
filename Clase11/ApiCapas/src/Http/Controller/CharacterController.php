<?php

namespace App\Http\Controller;

use App\Service\CharacterService;

class CharacterController
{
    private $characterService;

    public function __construct()
    {
        $characterService = new CharacterService();
        $this->characterService = $characterService;
    }

    public function getAllCharacters()
    {
        $characterService = new CharacterService();
        $characters = $this->characterService->getAllCharacters();
        header('Content-Type: application/json');
        echo json_encode($characters);
    }

    public function getCharacterById($id)
    {
        $character = $this->characterService->getCharacterById($id);
        header('Content-Type: application/json');
        echo json_encode($characters);
    }
}