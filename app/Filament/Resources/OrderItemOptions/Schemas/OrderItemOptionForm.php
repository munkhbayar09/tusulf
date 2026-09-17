<?php

namespace App\Filament\Resources\OrderItemOptions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class OrderItemOptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('order_item_id')
                    ->relationship('orderItem', 'order_item_id')
                    ->getOptionLabelFromRecordUsing(fn ($record) => "Item #{$record->order_item_id}")
                    ->required()
                    ->searchable()
                    ->preload(),
                Select::make('option_id')
                    ->relationship('productOption', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
            ]);
    }
}