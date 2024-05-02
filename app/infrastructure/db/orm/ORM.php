<?php
namespace App\Infrastructure\db\orm;
use App\Infrastructure\db\DB;

class ORM {
    public function __construct(public DB $db) {
    }

    public function query(string $sql, array $params = [])
    {
        $sth = $this->db->connection->prepare($sql);
        $sth->execute($params);
        $result = $sth->fetch();
        return $result;
    }
    public function multipleQuery (string $sql, array $params = [])
    {
        $sth = $this->db->connection->prepare($sql);
        $sth->execute($params);
        $result = $sth->fetchAll();
        return $result;
    }
}