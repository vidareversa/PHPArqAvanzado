<?php

namespace App\Infrastructure\Database;

class PDOManager
{
    private $host = 'localhost';
    private $dbname = 'simpsons_db';
    private $username = 'root';
    private $password = '';

    private $connection;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        try {
            $this->connection = new \PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function executeStatement($sql)
    {
        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (\PDOException $e) {
            die("Error executing statement: " . $e->getMessage());
        }
    }
}