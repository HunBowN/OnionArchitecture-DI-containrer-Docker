<?php 
namespace App\Infrastructure\Controllers;
use App\Services\TariffService;
use App\Repositories\Tariff\dto\AddTariffDTO;
use App\Repositories\Tariff\dto\UpdateTariffDTO;
use App\Entities\TariffType;

class TariffController {
    public function __construct(readonly TariffService $tariffService) {
        
    }

    public function createTariff() {
        $this->tariffService->createTariff( new AddTariffDTO(name: 'new_tariff', price: 100, speed: 100, duration: 100, type: TariffType::ACTUAL->value) );
    }

    public function getById(int $id) {
        return $this->tariffService->getById($id);
    }

    public function getAll() {
        return $this->tariffService->getAll();
    }
    
    public function updateTariff() {
        $this->tariffService->updateTariff( new UpdateTariffDTO(id: 1, name: 'updated_tariff', price: 150, speed: 200, duration: 200, type: TariffType::ARCHIVE->value) );
    }
}