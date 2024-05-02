<?php
namespace App\Infrastructure\db;

class DB
{
    public $connection;
    public function __construct(DBConfig $config)
    {
        try {
            $this->connection = new \PDO(
                "mysql:host={$config->host};
                port={$config->port};
                dbname={$config->database};
                user={$config->user};
                password={$config->password};
                charset={$config->charset}",
            );

            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
            $this->connection->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

        } catch (\PDOException $ex) {
            echo 'DB connection error: ' . $ex->getMessage();
        }
    }
}