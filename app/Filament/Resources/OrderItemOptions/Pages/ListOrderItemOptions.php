<?php

namespace App\Filament\Resources\OrderItemOptions\Pages;

use App\Filament\Resources\OrderItemOptions\OrderItemOptionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOrderItemOptions extends ListRecords
{
    protected static string $resource = OrderItemOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
