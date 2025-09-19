<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Revenue30Days extends StatsOverviewWidget
{
    protected static ?int $sort = 3;
    protected function getStats(): array
    {


        return [
            // Stat::make(
            //     'Revenue Last 30 Days (USD)',
            //     number_format(Order::where('created_at', '>=', now()->subDays(30)->startOfDay())->sum('price') / 100, 2)
            // )
        ];
    }
}
