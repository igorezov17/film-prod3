<?php

namespace Kernel\Database;

use PDO;
use Kernel\ConfigData\ConfigData;
use Kernel\ConfigData\ConfigDataInterface;
use PDOException;

class Database implements DatabaseInterface
{
    private $pdo;

    private ConfigDataInterface $config;

    public function __construct()
    {
        $this->config = new ConfigData();
        $this->connect();
    }

    public function insert(string $table, array $data): int|false
    {
        return false;
    }

    private function connect()
    {

        $driver   = $this->config->get('database.driver');
        $host     = $this->config->get('database.host');
        $charset  = $this->config->get('database.charset');
        $dbname   = $this->config->get('database.dbname');
        $username = $this->config->get('database.username');
        $password = $this->config->get('database.password');

        try {
            $this->pdo = new PDO("$driver:host=$host;dbname=$dbname;charset=$charset", 
                $username, 
                $password
            );
        } catch(\PDOException $e) {
            print_r("Default error: " . $e->getMessage());
        }
        
    }
}