<?php

namespace App\Infrastructure\db\repository;

use App\Repositories\Tariff\TariffRepository;
use App\Repositories\Tariff\dto\AddTariffDTO;
use App\Repositories\Tariff\dto\UpdateTariffDTO;
use App\Infrastructure\db\mappers\TariffMapper;
use App\Infrastructure\db\orm\ORM;
use App\Entities\Tariff;

class SQLTariffReposiotory implements TariffRepository
{

    public function __construct(private ORM $orm)
    {
    }


    public function add(AddTariffDTO $dto): void
    {
        $this->orm->query(
            'INSERT INTO tariff (name, price, speed, duration, type) VALUES (?, ?, ?, ?, ?)',
            $dto->getValues()
        );
    }

    public function getById(int $id): Tariff
    {
        $tariffEntitry = $this->orm->query('SELECT * FROM tariff WHERE id = :id', ['id' => $id]);
        return TariffMapper::toDomain($tariffEntitry);

    }

    public function getByName(string $name): Tariff
    {
        $tariffEntitry = $this->orm->query('SELECT * FROM tariff WHERE name = :name', ['name' => $name]);
        return TariffMapper::toDomain($tariffEntitry);

    }

    public function update(UpdateTariffDTO $dto): void
    {
        $this->orm->query(
            'UPDATE tariff SET name = :name, price = :price, speed = :speed, duration = :duration, type = :type WHERE id = :id',
            $dto->toArray()
        );
    }

    public function getAll(): array
    {
        $tariffs = $this->orm->multipleQuery('SELECT * FROM tariff');
        return array_map(fn($tariff) => TariffMapper::toDomain($tariff), $tariffs);
    }

    public function remove(int $id): void
    {
        $this->orm->query('DELETE FROM tariff WHERE id = :id LIMIT 1', ['id' => $id]);
    }
}