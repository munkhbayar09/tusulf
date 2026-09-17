<?php

namespace App\Filament\Resources\OrderItemOptions\Pages;

use App\Filament\Resources\OrderItemOptions\OrderItemOptionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOrderItemOption extends EditRecord
{
    protected static string $resource = OrderItemOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
