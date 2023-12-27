<?php
 
use GuzzleHttp\Client; //instalar con composer

$client = new Client();
$response = $client->request('GET', 'https://example.com');