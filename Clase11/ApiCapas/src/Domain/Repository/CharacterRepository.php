<?php

namespace App\Domain\Repository;

use App\Infrastructure\Database\PDOManager;
use App\Domain\Model\Character;

class CharacterRepository
{
    private $pdo;

    public function __construct()
    {
        $pdo = new PDOManager();
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $query = "SELECT * FROM characters";
        $statement = $this->pdo->executeStatement($query);
        $statement->execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $results;    
        //return $this->mapToCharacterObjects($results);    
    }

    public function getById($id)
    {
        $query = "SELECT * FROM characters WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    private function mapToCharacterObject($data)
    {
        if (!isset($data['id'], $data['name'], $data['occupation'])) {
            return null;
        }
        return new Character($data['id'], $data['name'], $data['age'], $data['occupation']);
    }

    private function mapToCharacterObjects($data)
    {
        $personajes = [];
        foreach ($data as $character) {
          $personajes[] = $this->mapToCharacterObject($character);
        }
        
        return $personajes;
        //return array_map([$this, 'mapToCharacterObject'], $data);
    }
}