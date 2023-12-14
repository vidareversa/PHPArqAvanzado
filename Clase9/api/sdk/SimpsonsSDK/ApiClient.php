<?php

namespace SimpsonsSDK;

class ApiClient
{
    private $baseUrl = 'http://localhost/EducacionIt/Clase9/api/';

    public function getUsers()
    {
        return $this->makeRequest('/users', 'GET');
    }

    public function getEpisodes()
    {
        return $this->makeRequest('/episodes', 'GET');
    }

    private function makeRequest($endpoint, $method)
    {
        $url = $this->baseUrl . $endpoint;
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error en la solicitud cURL: ' . curl_error($ch);
        }

        curl_close($ch);
        return json_decode($response, true);
    }
}