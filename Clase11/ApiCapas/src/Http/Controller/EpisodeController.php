<?php

namespace App\Http\Controller;
use App\Service\EpisodeService;

class EpisodeController
{
    private $episodeService;

    public function __construct()
    {
        $this->episodeService = new EpisodeService();
    }
    
    public function getEpisodesByCharacterId($id)
    {
        $episodes = $this->episodeService->getEpisodesByCharacterId($id);
        header('Content-Type: application/json');
        echo json_encode($episodes);
    }
}