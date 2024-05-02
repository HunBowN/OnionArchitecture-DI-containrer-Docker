<?php
namespace App\Services;

use App\Repositories\Tariff\TariffRepository;
use App\Entities\Tariff;
use App\Repositories\Tariff\dto\AddTariffDTO;
use App\Repositories\Tariff\dto\UpdateTariffDTO;

class TariffService
{

    public function __construct(public TariffRepository $tariffRepository)
    {
    }

    public function createTariff(AddTariffDTO $dto): void
    {
        $this->tariffRepository->add($dto);
    }

    public function getById(int $id): Tariff
    {
        return $this->tariffRepository->getById($id);
    }

    public function updateTariff(UpdateTariffDTO $dto): void {
        $this->tariffRepository->update($dto);
    }

    public function getAll(): array {
        return $this->tariffRepository->getAll();
    }


}