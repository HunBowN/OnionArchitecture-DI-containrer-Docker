<?php 

namespace App\Repositories\Tariff\dto;
use App\Repositories\DTO;

class AddTariffDTO extends DTO
{
    public function __construct(
        private string $name,
        private float $price,
        private float $speed,
        private int $duration,
        private string $type
    ) {
        
    }
}