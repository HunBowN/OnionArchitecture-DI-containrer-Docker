<?php 

namespace App\Infrastructure\db\mappers;
use App\Entities\Tariff;

class TariffMapper
{
    public static function toDomain (array $data): Tariff {
      return new Tariff($data['id'], $data['name'], $data['price'], $data['speed'], $data['duration'], $data['type']);  
    }
}