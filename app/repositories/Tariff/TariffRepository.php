<?php 
namespace App\Repositories\Tariff;
use App\Repositories\Tariff\dto\AddTariffDTO;
use App\Repositories\Tariff\dto\UpdateTariffDTO;
use App\Entities\Tariff;

interface TariffRepository
{
    
    public function add(AddTariffDTO $dto): void;
    public function getById(int $id): Tariff;
    public function getByName(string $name): Tariff;

    public function getAll(): array;

    public function remove(int $id): void;

    public function update(UpdateTariffDTO $dto): void;
}