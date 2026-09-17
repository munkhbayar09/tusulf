<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Payment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Нийт захиалга', Order::count())
                ->description('Бүх захиалгын тоо')
                ->color('warning'),

            Stat::make('Нийт харилцагч', Customer::count())
                ->description('Бүртгэлтэй харилцагч')
                ->color('success'),

            Stat::make('Нийт бүтээгдэхүүн', Product::count())
                ->description('Идэвхтэй бүтээгдэхүүн')
                ->color('info'),
                
            Stat::make('Нийт орлого', number_format(Payment::sum('amount')) . '₮')
                ->description('Бүх төлбөрийн нийлбэр')
                ->color('primary'),         
        ];
    }
}
