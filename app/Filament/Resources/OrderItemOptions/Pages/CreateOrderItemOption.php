<?php

namespace App\Filament\Resources\OrderItemOptions\Pages;

use App\Filament\Resources\OrderItemOptions\OrderItemOptionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderItemOption extends CreateRecord
{
    protected static string $resource = OrderItemOptionResource::class;
}
