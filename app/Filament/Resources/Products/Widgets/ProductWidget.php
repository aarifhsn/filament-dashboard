<?php

namespace App\Filament\Resources\Products\Widgets;

use Filament\Widgets\ChartWidget;

class ProductWidget extends ChartWidget
{
    protected ?string $heading = 'Product Widget';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
