<?php

namespace App\Entities;

enum TariffType: string
{
    case ACTUAL = 'actual';
    case ARCHIVE = 'archive';
    case SYSTEM = 'system';

}