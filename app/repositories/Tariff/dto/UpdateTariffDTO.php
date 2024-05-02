<?php 

namespace App\Repositories\Tariff\dto;
use App\Repositories\DTO;
use App\Entities\TariffType;

class UpdateTariffDTO extends DTO
{
    public function __construct(
        public int $id,
        public string $name = 'Base',
        public float $price = 777.77,
        public float $speed = 100.00,
        public int $duration = 30,
        public string $type = TariffType::ACTUAL->value,
    ) {
        
    }
}