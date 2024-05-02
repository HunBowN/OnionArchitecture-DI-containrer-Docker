<?php 
namespace App\Infrastructure\db;

class DBConfig
{
    public function __construct(
        public string $host = 'db',
        public string $user = 'appuser',
        public string $password = 'appuser',
        public string $database = 'my_core',
        public string $port = '3306',
        public string $charset = 'utf8'
    ) {}
}

