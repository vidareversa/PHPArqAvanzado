<?php

// src/SimpsonsApi/SimpsonsApiClient.php

namespace App\SimpsonsApi;

class SimpsonsApiClient
{

    private $characters = [
        ['id' => 1, 'name' => 'Homer Simpson'],
        ['id' => 2, 'name' => 'Marge Simpson']
    ];

    /**
     * Devolver datos ficticios de todos los personajes
     */
    public function getAllCharacters()
    {
        return $this->characters;
    }

    /**
     * Devolver datos ficticios de un personaje por su ID
     */
    public function getCharacterById($id)
    {
         return [
            'id' => $id,
            'name' => 'Personaje ' . $id,
        ];
    }

    public function getCharacterEpisodes($id)
    {
        return [
            ['id' => 1, 'title' => 'Episodio 1'],
            ['id' => 2, 'title' => 'Episodio 2'],
        ];
    }

    public function createCharacter($name)
    {
        $id = count($this->characters) + 1;
        $character = ['id' => $id, 'name' => $name];
        $this->characters[] = $character;
        return $character;
    }

    public function deleteCharacter($id)
    {
        foreach ($this->characters as $key => $character) {
            if ($character['id'] === $id) {
                unset($this->characters[$key]);
                return true;
            }
        }
        return false;
    }
}