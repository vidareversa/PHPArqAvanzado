<?php

namespace App\Service;

use App\Domain\Repository\CharacterRepository;

class CharacterService
{
    private $characterRepository;

    public function __construct()
    {
        $characterRepository = new CharacterRepository();
        $this->characterRepository = $characterRepository;
    }

    public function getAllCharacters()
    {
        return $this->characterRepository->getAll();
    }

    public function getCharacterById($id)
    {
        return $this->characterRepository->getById($id);
    }

}
