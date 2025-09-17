<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;
enum ProductStatusEnum: string implements HasLabel, HasColor
{
    case IN_STOCK = 'In Stock';
    case SOLD_OUT = 'Sold Out';
    case COMING_SOON = 'Coming Soon';

    public function getLabel(): ?string
    {
        return $this->value;
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::IN_STOCK => 'primary',
            self::SOLD_OUT => 'danger',
            self::COMING_SOON => 'info',
        };
    }
}
