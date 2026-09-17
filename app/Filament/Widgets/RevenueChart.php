<?php

namespace App\Filament\Widgets;

use App\Models\Payment;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class RevenueChart extends ChartWidget
{
    protected ?string $heading = 'Сарын орлого';

    protected function getData(): array
    {
        $data = Payment::query()
            ->select(
                DB::raw("DATE_FORMAT(payment_date, '%Y-%m') as month"),
                DB::raw('SUM(amount) as total')
            )
            ->where('status', 'paid')
            ->groupBy('month')
            ->orderBy('month')
            ->limit(12)
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Орлого (₮)',
                    'data' => $data->pluck('total'),
                    'borderColor' => '#f59e0b',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.2)',
                ],
            ],
            'labels' => $data->pluck('month'),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}