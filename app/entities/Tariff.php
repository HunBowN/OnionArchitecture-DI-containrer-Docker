<?php

namespace App\Entities;

class Tariff {
    public function __construct(
        private int $id,
        private string $name,
        private float $price,
        private float $speed,
        private float $duration,
        private string $type
    ) {}
}

