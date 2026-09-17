<?php

namespace App\Filament\Exports;

use App\Models\Order;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Str;

class OrderExporter extends Exporter
{
    protected static ?string $model = Order::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('order_id')
                ->label('Order #'),
            ExportColumn::make('customer.name')
                ->label('Customer'),
            ExportColumn::make('staff.name')
                ->label('Staff'),
            ExportColumn::make('order_type')
                ->label('Order type'),
            ExportColumn::make('status'),
            ExportColumn::make('total_amount')
                ->label('Total amount'),
            ExportColumn::make('created_at')
                ->label('Date'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your order export has completed and ' . Str::of('row')->counted($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Str::of('row')->counted($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}