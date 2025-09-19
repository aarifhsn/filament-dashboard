<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class RevenueToday extends StatsOverviewWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        $totalRevenue = Order::whereDate('created_at', date('Y-m-d'))->sum('price') / 100;

        return [
            // Stat::make(
            //     'Revenue Today (USD)',
            //     number_format($totalRevenue, 2)
            // ),
        ];
    }
}
