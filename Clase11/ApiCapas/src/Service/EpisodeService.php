<?php

namespace App\Service;

use App\Domain\Repository\EpisodeRepository;

class EpisodeService
{
    private $episodeRepository;

    public function __construct()
    {
        $episodeRepository = new EpisodeRepository();
        $this->episodeRepository = $episodeRepository;
    }

    public function getAllEpisodes()
    {
        return $this->episodeRepository->getAll();
    }

    public function getEpisodesByCharacterId($id)
    {
        return $this->episodeRepository->getEpisodesByCharacterId($id);
    }
}