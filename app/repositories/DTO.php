<?php
namespace App\Repositories;

class DTO
{
    public function toArray(): array {
        $array = [];
        foreach ((array) $this as $key => $value) {
            $key = str_replace($this::class, '', $key);
            $array[$key] = $value;
        }
        return $array;
    }

    public function getValues() {
        return array_values((array) $this);
    }
}