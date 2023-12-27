<?php

namespace App\Domain\Repository;

use App\Infrastructure\Database\PDOManager;
use App\Domain\Model\Episode;

class EpisodeRepository
{
    private $pdo;

    public function __construct()
    {
        $pdoManager = new PDOManager();
        $this->pdo = $pdoManager;
    }

    public function getAll()
    {
    }

    public function getById($id)
    {
    }

    public function getEpisodesByCharacterId($id)
    {
        //$query = " SELECT e.* FROM episodes e JOIN character_episode ce ON e.id = ce.episode_id WHERE ce.character_id = :character_id";
        $query = "SELECT e.*, GROUP_CONCAT(c.name) AS characters
                    FROM episodes e
                    JOIN character_episode ce ON e.id = ce.episode_id
                    JOIN characters c ON ce.character_id = c.id
                    WHERE ce.character_id = '" . $id . "'
                    GROUP BY e.id";
        $statement = $this->pdo->executeStatement($query);
        $statement->execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $this->mapToEpisodes($results);
    }

    private function mapToEpisodes($data)
    {
        $episodes = [];
        foreach ($data as $episodeData) {
            $episodes[] = $this->mapToEpisode($episodeData);
        }

        return $episodes;
    }

    private function mapToEpisode($data)
    {
        return new Episode($data['id'], $data['title'], $data['air_date']);
    }
}