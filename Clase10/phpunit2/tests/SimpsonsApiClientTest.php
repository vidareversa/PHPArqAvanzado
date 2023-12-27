<?php

// tests/SimpsonsApiTest.php

use PHPUnit\Framework\TestCase;
use App\SimpsonsApi\SimpsonsApiClient;

class SimpsonsApiClientTest extends TestCase
{
    public function testGetAllCharacters()
    {
        $apiClient = new SimpsonsApiClient();
        $characters = $apiClient->getAllCharacters();
        $this->assertNotNull($characters); // Verificar que se devuelva algo
        $this->assertNotEmpty($characters); // Verificar que la respuesta no esté vacía
    }

    public function testGetCharacterById()
    {
        $apiClient = new SimpsonsApiClient();
        $character = $apiClient->getCharacterById(1); //llamamos al personaje 1. Otra alternativa seria hacer un random de valores enteros positivos hasta el maximo de personajes que devuelva y asi traer al azar (si se sabe el maximo)
        $this->assertNotNull($character); // Verificar que se devuelva algo
        $this->assertArrayHasKey('name', $character); //Verificar que la respuesta tenga un nombre
    }

    public function testGetCharacterEpisodes()
    {
        $apiClient = new SimpsonsApiClient();
        $episodes = $apiClient->getCharacterEpisodes(1);
        $this->assertNotNull($episodes); // Verificar que se devuelva algo
        $this->assertNotEmpty($episodes); // Verificar que la respuesta no esté vacía
    }


    /* 
        Y si tengo que crear personajes nuevos, como los testeo?
        Opcion 1: Creo en una transacción  y hago rollback (si estuviera en una base de datos)
    
    public function testCreateCharacterWithTransaction()
    {
        $apiClient = new SimpsonsApiClient();

        // Inicia una transacción (simulado)
        $apiClient->startTransaction();

        try {
            $createdCharacter = $apiClient->createCharacter('Homer Simpson');
            $this->assertNotNull($createdCharacter['id']);  // Asegúrate de que se haya creado el personaje correctamente
            $this->assertEquals('Homer Simpson', $createdCharacter['name']);
            //$apiClient->rollbackTransaction(); // Restablece la transacción (simulado)
        } finally {
            $apiClient->rollbackTransaction();  // Garantiza que la transacción se haya revertido, incluso si hay una excepción
        }
    }

    /*
       Y si tengo que crear personajes nuevos, como los testeo?
       Opción 2: Creo y elimino
    */
    public function testCreateAndDeleteCharacter()
    {
        // Crea el personaje
        $apiClient = new SimpsonsApiClient();
        $createdCharacter = $apiClient->createCharacter('Maggie Simpson');

        //Se creó ok?
        $this->assertNotNull($createdCharacter['id']);
        $this->assertEquals('Maggie Simpson', $createdCharacter['name']);

        // Elimina el personaje
        $deleted = $apiClient->deleteCharacter($createdCharacter['id']);

        // Se elimino ok?
        $this->assertTrue($deleted);

        // Verificamos que el personaje ya no exista
        $characters = $apiClient->getAllCharacters();
        $this->assertNotContains($createdCharacter, $characters);
    }
    
}